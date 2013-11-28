<?php
class Config {
	// Database Config
	public static $DB_HOST	= "localhost";
	public static $DB_USER	= "root";
	public static $DB_PW	= "";
	public static $DB_NAME	= "arduino_db";
	
	// Arduino Interface Config
	public static $ARDUINO_USE_HTTP_POST 	= false;

	public static $ARDUINO_CONFIG_KEY		= "key";
	public static $ARDUINO_CONFIG_DAYLIGHT 	= "daylight";
	public static $ARDUINO_CONFIG_MOISTURE 	= "moisture";
	public static $ARDUINO_CONFIG_COST	 	= "cost";
	
	public static $ARDUINO_CLIENT_ID_KEY		= "client";
	public static $ARDUINO_DATA_DAYLIGHT_KEY 	= "daylight";
	public static $ARDUINO_DATA_MOISTURE_KEY 	= "moisture";
	

	public static $ARDUINO_WRITE_DATA_OK		= 1;
	public static $ARDUINO_WRITE_DATA_ERROR		= -1;
}