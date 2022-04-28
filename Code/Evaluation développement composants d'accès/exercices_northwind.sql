
-- Afin d'éviter des conflits avec les mots réservés, la table 'order details' a été renommée 'order_details' (cf. requête northwind_MySQL.sql)



-- 1) Requêtes d'interrogations sur la base NorthWind
/*1*/

SELECT CompanyName, ContactName, ContactTitle, Phone FROM customers
WHERE Country = "France";


/*2*/

SELECT ProductName, UnitPrice FROM products
JOIN suppliers ON products.SupplierID = suppliers.SupplierID
WHERE CompanyName = "Exotic Liquids";

/*3*/

SELECT CompanyName, COUNT(ProductID) FROM suppliers
JOIN products ON products.SupplierID = suppliers.SupplierID
WHERE Country = 'France'
GROUP BY CompanyName
ORDER BY COUNT(ProductID) DESC;

/*4*/

SELECT CompanyName, COUNT(OrderID) FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
WHERE Country = 'France'
GROUP BY CompanyName
HAVING COUNT(OrderID) > 10;

/*5*/

SELECT CompanyName, SUM(UnitPrice * Quantity - Discount) FROM order_details
JOIN orders ON orders.OrderID = order_details.OrderID
JOIN customers ON customers.CustomerID = orders.CustomerID
GROUP BY orders.CustomerID
HAVING SUM(UnitPrice * Quantity - Discount) > 30000
ORDER BY SUM(UnitPrice * Quantity - Discount) DESC;

/*6*/

SELECT customers.Country FROM customers
JOIN orders ON customers.CustomerID = orders.CustomerID
JOIN order_details ON order_details.OrderID = orders.OrderID
JOIN products ON products.ProductID = order_details.ProductID
JOIN suppliers ON suppliers.SupplierID = products.SupplierID
WHERE suppliers.CompanyName = "Exotic Liquids"
GROUP BY customers.Country;

/*7*/

SELECT SUM(UnitPrice * Quantity - Discount) AS montant_97 FROM order_details
JOIN orders ON orders.OrderID = order_details.OrderID
WHERE YEAR(OrderDate) = 1997;


/*8*/

SELECT MONTH(OrderDate) AS mois, SUM(UnitPrice * Quantity - Discount) AS montant_97 FROM order_details
JOIN orders ON orders.OrderID = order_details.OrderID
WHERE YEAR(OrderDate) = 1997
GROUP BY MONTH(OrderDate);


/*9*/

SELECT MAX(OrderDate) FROM orders
JOIN customers ON customers.CustomerID = orders.CustomerID
WHERE CompanyName = 'Du monde entier';

/*10*/

SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) FROM orders;



-- 2) Procédures Stockées

/*Procédure requête 9*/

DELIMITER |

CREATE PROCEDURE derniere_livraison(IN clients VARCHAR(40))
BEGIN
    SELECT MAX(OrderDate) FROM orders
    JOIN customers ON customers.CustomerID = orders.CustomerID
    WHERE CompanyName = clients;
END |

DELIMITER ;

/*Procédure requête 10*/

DELIMITER |

CREATE PROCEDURE estimation_livraison()
BEGIN
    SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) FROM orders;
END |

DELIMITER ;


-- 3) Mise en place d'une règle de gestion

-- Le déclencheur sera utilisé afin d'éviter un non-respect de cette règle

DELIMITER |

CREATE TRIGGER country_conflict AFTER INSERT ON order_details
    FOR EACH ROW
    BEGIN
        DECLARE id_order INT;
        DECLARE id_product INT;
        DECLARE country_supplier VARCHAR(40);
        DECLARE country_customer VARCHAR(40);
        SET id_order = NEW.OrderID;
        SET id_product = NEW.ProductID;
        SET country_supplier = (
            SELECT Country FROM suppliers 
            JOIN products ON suppliers.SupplierID = products.SupplierID
            WHERE ProductID = id_product
        );
        SET country_customer = (
            SELECT Country FROM customers
            JOIN orders ON customers.CustomerID = orders.CustomerID
            WHERE OrderID = id_order
        );
        IF country_supplier <> country_customer THEN
            SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = "Commande impossible, vous commandez dans un pays qui n'est pas le vôtre";
        END IF;
END |

DELIMITER ;

-- Tests effectués :

INSERT INTO order_details (OrderID, ProductID, Quantity) VALUES (10248,1,1); -- country_supplier = UK ; country_customer = France  -> Renvoie une erreur #1644
INSERT INTO order_details (OrderID, ProductID, Quantity) VALUES (10248,1,39); -- country_supplier = France ; country_customer = France  -> Valide l'insertion.


