CREATE USER 'util1'@'%' IDENTIFIED BY '1234';
CREATE USER 'util2'@'%' IDENTIFIED BY '1234';
CREATE USER 'util3'@'%' IDENTIFIED BY '1234';

GRANT ALL PRIVILEGES ON papyrus.* to 'util1'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;

GRANT SELECT ON papyrus.* TO 'util2'@'%';
FLUSH PRIVILEGES;

GRANT SELECT ON papyrus.fournis TO 'util3'@'%';
FLUSH PRIVILEGES;