/*Besoins d'affichage*/

/*1*/
SELECT numcom FROM entcom
WHERE numfou = 9120;

/*2*/
SELECT DISTINCT numfou FROM entcom;

/*3*/
SELECT COUNT(numcom), COUNT(DISTINCT numfou) FROM entcom;

/*4*/
SELECT * FROM produit
WHERE stkphy <= stkale AND qteann < 1000;

/*5*/
SELECT SUBSTRING(posfou,1,2), nomfou FROM fournis
WHERE SUBSTRING(posfou,1,2) IN (75,78,92,77)
ORDER BY SUBSTRING(posfou,1,2) DESC, nomfou;

/*6*/
SELECT numcom, datcom FROM entcom
WHERE datcom BETWEEN '2018-03-01' AND '2018-04-30';

/*7*/
SELECT numcom, datcom FROM entcom
WHERE obscom <> '';

/*8*/
SELECT numcom, SUM(qtecde*priuni) AS 'tot' FROM ligcom
GROUP BY numcom
ORDER BY tot DESC;

/*9*/
SELECT numcom, SUM(qtecde*priuni),FROM ligcom
GROUP BY numcom
HAVING SUM(qtecde*priuni) > 10000 AND SUM(qtecde) <1000;

/*10*/
SELECT nomfou, numcom, datcom FROM entcom
JOIN fournis
ON entcom.numfou = fournis.numfou
ORDER BY nomfou;

/*11*/
SELECT ligcom.numcom, nomfou, libart,qtecde*priuni AS 'subtot' FROM ligcom
JOIN entcom
ON ligcom.numcom = entcom.numcom
JOIN produit
ON ligcom.codart = produit.codart
JOIN fournis
ON entcom.numfou = fournis.numfou
WHERE obscom LIKE '%urgent%';

/*12*/
/*Méthode 1*/
SELECT nomfou FROM fournis
JOIN entcom
ON fournis.numfou = entcom.numfou
JOIN ligcom
ON entcom.numcom = ligcom.numcom
GROUP BY nomfou
HAVING SUM(qteliv) > 0;

/*Méthode 2*/
SELECT nomfou FROM ligcom
JOIN entcom
ON ligcom.numcom = entcom.numcom
JOIN fournis
ON entcom.numfou = fournis.numfou
WHERE qteliv > 0
GROUP BY nomfou;

/*13*/
SELECT t2.numcom, t2.datcom
FROM entcom t1
JOIN entcom t2 ON t1.numfou = t2.numfou
WHERE t2.numcom=70210;

SELECT numcom, datcom FROM entcom WHERE numfou IN (
    SELECT numfou FROM entcom WHERE numcom=70210
);

/*14*/
SELECT libart, prix1 FROM produit
JOIN vente
ON vente.codart = produit.codart
WHERE prix1 < (
	SELECT MIN(prix1) FROM vente
	WHERE codart LIKE 'r%'
	);

/*15*/
SELECT libart, nomfou FROM produit
RIGHT JOIN vente
ON produit.codart = vente.codart
JOIN fournis
ON vente.numfou = fournis.numfou
WHERE stkphy <= stkale *1.5
ORDER BY libart, nomfou;

/*16*/
SELECT nomfou, libart FROM produit
RIGHT JOIN vente
ON produit.codart = vente.codart
JOIN fournis
ON vente.numfou = fournis.numfou
WHERE stkphy <= stkale *1.5 AND delliv <=30
ORDER BY nomfou, libart;

/*17*/
SELECT nomfou, libart,stkphy FROM produit
RIGHT JOIN vente
ON produit.codart = vente.codart
JOIN fournis
ON vente.numfou = fournis.numfou
WHERE stkphy <= stkale *1.5 AND delliv <=30
ORDER BY stkphy desc,nomfou, libart;

/*18*/
SELECT libart, SUM(qtecde) FROM ligcom
JOIN produit
ON ligcom.codart = produit.codart
GROUP BY produit.codart
HAVING qteann*0.9<SUM(qtecde);

/*19*/
SELECT nomfou, sum(qtecde*priuni*1.2) FROM ligcom
JOIN entcom
ON ligcom.numcom = entcom.numcom
right JOIN fournis
ON entcom.numfou = fournis.numfou
GROUP BY nomfou;