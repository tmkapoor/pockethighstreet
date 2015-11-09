<?php
	//yoursite.com is your webserver EXCLUDING 'http://' and 'www'
	define('SITE_ROOT' , 'phs');
	//Your app name
	define('APPNAME', "PocketHighStreet");


	/**DO NOT EDIT**/
	define('ROOT', dirname(dirname(__FILE__)));
	//define('DS', DIRECTORY_SEPARATOR);
	define('DS', "/");
	define('CONTROLLERS', "controllers");
	define('MODELS', "models");
	define('VIEWS', "views");
	define('LIBS', "libs");
	define('DRIVERS', "libs".DS."drivers");
	define('ASSETS', SITE_ROOT.DS."assets");
?>