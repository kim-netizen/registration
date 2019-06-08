CREATE DATABASE registration;

USE registration;

CREATE TABLE users(
			id INT(11) NOT NULL AUTO_INCREMENT,
			firstname VARCHAR(50) NOT NULL,
        		lastname VARCHAR(50) NOT NULL,
			email VARCHAR(50) NOT NULL,
			username VARCHAR(50) NOT NULL,
			password text(50) NOT NULL,
        		gender VARCHAR(10) NOT NULL,
			birthday DATE NOT NULL,
			created_date DATETIME NOT NULL,
			PRIMARY KEY(id)
				);
