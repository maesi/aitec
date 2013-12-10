<?php
class Config {
	
	// Arduino Interface Config
	public static $ARDUINO_USE_HTTP_POST 		= false;

	public static $ARDUINO_CONFIG_KEY			= "key";
	public static $ARDUINO_CONFIG_DAYLIGHT 		= "daylight";
	public static $ARDUINO_CONFIG_MOISTURE_EMPTY= "moisture";
	public static $ARDUINO_CONFIG_MOISTURE_FULL	= "moisture_full";
	public static $ARDUINO_CONFIG_COST	 		= "cost";
	
	public static $ARDUINO_CLIENT_ID_KEY		= "client";
	public static $ARDUINO_DATA_DAYLIGHT_KEY 	= "daylight";
	public static $ARDUINO_DATA_MOISTURE_KEY 	= "moisture";

	public static $ARDUINO_WRITE_DATA_OK		= 1;
	public static $ARDUINO_WRITE_DATA_ERROR		= -1;
	
	// Ajax Config
	public static $AJAX_CLIENT_ID_KEY			= "client";
	
	public static $DATA_SEPARATOR				= "|";
	public static $LINE_SEPARATOR				= "#";
	
	public static $PAGE_KEY						= "p";
	public static $PAGE_HOME					= "clientdata";
	public static $PAGE_CONFIG					= "conf";
	public static $PAGE_FUNCTIONS				= "func";
}