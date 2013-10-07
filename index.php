<?php
	define('APPNAME', "mvc2");
	define('ROOT', dirname(dirname(__FILE__)));
	define('DS', DIRECTORY_SEPARATOR);
	define('CONTROLLERS', "controllers");
	define('MODELS', "models");
	define('VIEWS', "views");

	//yoursite.com is your webserver EXCLUDING 'http://' and 'www'
	define('SITE_ROOT' , 'tkapoor7-w7/mvc');


	function getController($cName){
		$path = CONTROLLERS.DS.$cName;
		return $path;
	}
	/**
	 * WEB_ROOT_FOLDER is the name of the parent folder you created these 
	 * documents in.
	 */



	/*TEMP*
	$completeURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

	print("<pre>");
	print_r($_SERVER);
	print("</pre>");
	/*ENDTEMP*/

	/**
	 * Fetch the router
	 */
	require_once(getController("router.php"));

?>