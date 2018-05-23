DROP DATABASE IF EXISTS contact_manager;
CREATE DATABASE contact_manager;
USE contact_manager;
DROP TABLE IF EXISTS contact_list;
CREATE TABLE contact_list
(
    contact_id    INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name   TEXT,
    last_name  TEXT,
    primary_num   TEXT,
    email  TEXT,
    occupation  TEXT,
    home_address  TEXT,
    zip   TEXT,
    city TEXT,
    state  TEXT,
    comment  TEXT
	
);
INSERT INTO contact_list(first_name, last_name, primary_num,email, occupation, home_address,
zip, city, state, comment) 
VALUES('Ivan','Fonseca','708-123-4567','ivan@gmail.com','Student','1234 w 1st st','60453','Oak Lawn','IL','Goes to Lewis');

INSERT INTO contact_list(first_name, last_name, primary_num,email, occupation, home_address,
zip, city, state, comment) 
VALUES('Spongebob','Squarepants','708-673-5667','spongebob@gmail.com','Cook','1234 w 1st st','12345','Bikini Bottom','Atlantic Ocean','Works at Krusty Krab');

INSERT INTO contact_list(first_name, last_name, primary_num,email, occupation, home_address,
zip, city, state, comment) 
VALUES('Eva','Fonseca','773-474-5343','124@gmail.com','Cook','2345 w 81st st','12345','Hickory Hills','IL','Mother');