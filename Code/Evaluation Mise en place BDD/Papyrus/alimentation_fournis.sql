USE papyrus;

LOAD DATA LOCAL INFILE '/home/benjamin/Bureau/Git/Code/Evaluation Mise en place BDD/fournis.csv'
INTO TABLE fournis
FIELDS TERMINATED BY ',' 
LINES TERMINATED BY '\n'
IGNORE 1 LINES
(numfou,nomfou,ruefou,posfou,vilfou,confou,satisf);