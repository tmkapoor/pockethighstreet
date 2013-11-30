<?php

	/**Intercept default PHP 'failed to load class' method
	override to look for the class in out "models" folder**/

	function setPageTitle($title){
		$pageContents = ob_get_contents();
		if($pageContents){
			ob_end_clean ();
			echo str_replace('<!--TITLE-->', $title." | ".APPNAME, $pageContents);
		}
	}

	function __autoload($className)
	{
	    //Get where PHP is looking
	    list($filename , $suffix) = explode('_' , $className);

		//select the folder where class should be located based on suffix
	    switch (strtolower($suffix))
	    {    
	        case 'model':
	            $folder = MODELS;
	     		break;
	    
	        case 'library':
	            $folder = LIBS;
	        	break;
	    
	        case 'driver':
	            $folder = DRIVERS;
	        	break;

	        default:
	        	die("No such class found. $filename was not found in the models, libraries or drivers.");
	    }

	    //compose file name
	    $file = $folder.DS.strtolower($filename).'.php';

	    //fetch file
	    if (file_exists($file))
	    {
	        //get file
	        include_once($file);        
	    }
	    else
	    {
	        //file does not exist!
	        die("File '$filename' containing class '$className' not found.");    
	    }
	}
 
	function superStripSlashes($value) {
	    $value = is_array($value) ? array_map('superStripSlashes', $value) : stripslashes($value);
	    return $value;
	}

	//Fetching url elements
	define('URLSEP', '/');
	$urlVars = array();
	$getVars = array();
	$page = "";

	$completeURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$isHTTPS = ($_SERVER['REQUEST_SCHEME'] == "https")?true:false;
	$request = $_SERVER['QUERY_STRING'];
	$request = rtrim($request, "/");
	$request = substr($request, 4);
	$urlVars = explode(URLSEP, $request);

	//The page will always be the first lement inthe url after the website root
	if($urlVars[0] == "")
		$page = "index";
	else
		$page = $urlVars[0];


	//$pageContents = ob_get_contents();
	//ob_end_clean ();
	//echo str_replace('<!--TITLE-->', ucfirst($page)." | ".APPNAME, $pageContents);

	$uri = $_SERVER['REQUEST_URI'];

	$joint = strpos($uri, '?');
	if($joint){
		$getString = substr($uri, $joint+1);
		$getParsed = explode('&' , $getString);

		//the rest of the array are get statements, parse them out.
		foreach ($getParsed as $argument){
		    list($variable , $value) = explode('=' , $argument);
		    $getVars[$variable] = urldecode($value);
		}
	}
	//Define path of controller
	$target = CONTROLLERS.DS.$page.'.php';

	//Get target
	if (file_exists($target))
	{
	    include_once($target);

	    //modify page to fit naming convention
	    $class = ucfirst($page) . '_Controller';

	    //instantiate the appropriate class
	    if (class_exists($class))
	    {
	        $controller = new $class;
	    }
	    else
	    {
	        die('ERROR: Class does not exist!');
	    }
	}
	else
	{
	    //No such controller exists
	    if(file_exists("wizard.php")){
	    	header("Location: wizard.php?failed=$page");
	    }
	    else{
	    	die("$target does not exist!");
	    }
	}

	for($i=1 ; isset($urlVars[$i]) ; $i++){
		if($urlVars[$i] != "" && function_exists($urlVars[$i])){
			$controller->$urlVars[$i]($urlVars, $getVars);
		}
	}
	
	$controller->main($urlVars, $getVars);
	setPageTitle(ucfirst($page)." | ".APPNAME);
?>