CREATE DATABASE arduino_db;
USE arduino_db;

CREATE TABLE arduino_config (
	id 						INT 		NOT NULL AUTO_INCREMENT ,
	daylight_threshold 	INT 		NOT NULL,
	moisture_threshold 	INT 		NOT NULL,
	beer_cost 				DECIMAL 	NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO arduino_config(daylight_threshold, moisture_threshold,beer_cost) Values (300,50,3.80);

CREATE TABLE arduino_data (
	id 			INT NOT NULL AUTO_INCREMENT,
	client_id 	INT NOT NULL,
	daylight 	INT,
	moisture 	INT,
	PRIMARY KEY (id)
);
CREATE TABLE arduino_client (
	id 	INT 			NOT NULL AUTO_INCREMENT,
	name 	VARCHAR(64) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE arduino_bills (
	id 				INT 		NOT NULL AUTO_INCREMENT,
	client_id 		INT 		NOT NULL,
	data_start_id 	INT 		NOT NULL,
	data_end_id 	INT 		NOT NULL,
	refills 			INT 		NOT NULL,
	total 			DECIMAL 	NOT NULL,
	PRIMARY KEY (id)
);
