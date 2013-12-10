DROP TABLE IF EXISTS arduino_config; 
CREATE TABLE arduino_config (
	id 						INT 		NOT NULL AUTO_INCREMENT ,
	daylight_threshold 	INT 		NOT NULL,
	moisture_threshold_empty 	INT 		NOT NULL,
	moisture_threshold_full 	INT 		NOT NULL,
	beer_cost 				DECIMAL(4,2) 	NOT NULL,
	PRIMARY KEY (id)
);
INSERT INTO arduino_config(daylight_threshold, moisture_threshold_empty,moisture_threshold_full,beer_cost) Values (300,50,500,3.80);

DROP TABLE IF EXISTS arduino_beer;
CREATE TABLE arduino_beer (
id INT NOT NULL AUTO_INCREMENT,
start_data_id	INT NOT NULL,
end_data_id	INT DEFAULT NULL,
bill_id INT DEFAULT NULL,
PRIMARY KEY (id)
);

DROP TABLE IF EXISTS arduino_data; 
CREATE TABLE arduino_data (
	id 			INT NOT NULL AUTO_INCREMENT,
	client_id 	INT NOT NULL,
	daylight 	INT,
	moisture 	INT,
	measuredate TIMESTAMP DEFAULT NOW(),
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS arduino_client; 
CREATE TABLE arduino_client (
	id 	INT 			NOT NULL AUTO_INCREMENT,
	name 	VARCHAR(64) NOT NULL,
	PRIMARY KEY (id)
);

DROP TABLE IF EXISTS arduino_bills; 
CREATE TABLE arduino_bills (
	id 				INT 		NOT NULL AUTO_INCREMENT,
	client_id 		INT 		NOT NULL,
	refills 			INT 		NOT NULL,
	beer_cost 				DECIMAL(4,2) 	NOT NULL,
	PRIMARY KEY (id)
);
