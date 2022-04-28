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

