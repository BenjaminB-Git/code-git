LOAD DATA LOCAL INFILE 'ligcom.csv'
INTO TABLE ligcom
FIELDS TERMINATED BY ';'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(numcom,numlig,codart,qtecde,priuni,qteliv,derliv)
