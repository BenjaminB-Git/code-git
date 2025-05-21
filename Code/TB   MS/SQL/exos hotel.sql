/*La table client a été renommée client_hotel*/

/*Lot 1*/

/*1*/
SELECT hot_nom, hot_ville FROM hotel

/*2*/
SELECT cli_nom, cli_prenom, cli_adresse,cli_ville FROM client_hotel

/*3*/

SELECT sta_nom, sta_altitude FROM station
WHERE sta_altitude < 1000

/*4*/

SELECT cha_id, cha_capacite FROM chambre
WHERE cha_capacite > 1

/*5*/
SELECT cli_nom, cli_prenom, cli_ville FROM client_hotel
WHERE NOT (cli_ville = 'Londre')

/*6*/
SELECT hot_nom, hot_ville, hot_categorie FROM hotel
WHERE hot_ville = 'Bretou'
AND hot_categorie > 3

/* Lot 2*/

/*7*/
SELECT sta_nom,hot_nom, hot_categorie, hot_ville FROM hotel
JOIN station
ON hot_sta_id = sta_id

/*8*/
SELECT hot_nom, hot_categorie, hot_ville, cha_numero FROM chambre
JOIN hotel
ON cha_hot_id = hot_id

/*9*/
SELECT hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite FROM chambre
JOIN hotel
ON cha_hot_id = hot_id
WHERE hot_ville = 'Bretou' AND cha_capacite > 1

/*10*/
SELECT cli_nom, hot_nom, res_date FROM client_hotel
JOIN reservation
ON res_cli_id = cli_id
JOIN chambre
ON res_cha_id = cha_id
JOIN hotel
ON cha_hot_id = hot_id

/*11*/
SELECT sta_nom, hot_nom, hot_categorie, hot_ville, cha_numero, cha_capacite FROM chambre
JOIN hotel
ON cha_hot_id = hot_id
JOIN station
ON hot_sta_id = sta_id

/*12*/
SELECT cli_nom, hot_nom, res_date_debut, DATEDIFF (res_date_fin,res_date_debut) FROM client_hotel
JOIN reservation
ON res_cli_id = cli_id
JOIN chambre
ON res_cha_id = cha_id
JOIN hotel
ON cha_hot_id = hot_id

/*Lot 3*/

/*13 : bonus nom des stations*/
SELECT sta_nom, COUNT(hot_id) FROM hotel
JOIN station
ON hot_sta_id = sta_id
GROUP BY hot_sta_id

/*14*/
SELECT sta_nom, COUNT(cha_id) FROM chambre
JOIN hotel
ON cha_hot_id = hot_id
JOIN station
ON hot_sta_id = sta_id
GROUP BY sta_id

/*15*/
SELECT sta_nom, COUNT(cha_id) FROM chambre
JOIN hotel
ON cha_hot_id = hot_id
JOIN station
ON hot_sta_id = sta_id
WHERE cha_capacite > 1
GROUP BY sta_id

/*16*/
SELECT hot_nom FROM hotel
JOIN chambre
ON hot_id = cha_hot_id
JOIN reservation
ON cha_id = res_cha_id
JOIN client_hotel
ON res_cli_id = cli_id
WHERE cli_nom = 'squire'

/*17*/
SELECT sta_nom, AVG(DATEDIFF(res_date_fin, res_date_debut)) FROM reservation
JOIN chambre
ON res_cha_id = cha_id
JOIN hotel
ON cha_hot_id = hot_id
JOIN station
ON hot_sta_id = sta_id
GROUP BY sta_id
