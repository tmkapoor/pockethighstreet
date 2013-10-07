<?php

	/**Intercept default PHP 'failed to load class' method
	override to look for the class in out "models" folder**/
	function __autoload($className)
	{
	    //Get where PHP is looking
	    list($filename , $suffix) = explode('_' , $className);
	    //Rewrite it to our own models folder
	    $file = MODELS.DS.strtolower($filename).'.php';

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

	$completeURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$isHTTPS = ($_SERVER['REQUEST_SCHEME'] == "https")?true:false;
	$request = $_SERVER['QUERY_STRING'];
	$request = substr($request, 4);
	$urlVars = explode(URLSEP, $request);

	//The page will always be the first lement inthe url after the website root
	if($urlVars[0] == "")
		$page = "index";
	else
		$page = $urlVars[0];

	/** TODO: remove last empty urlVars element created when tere is a trailing '/' **/

	$uri = $_SERVER['REQUEST_URI'];
	$joint = strpos($uri, '?');
	if($joint){
		$getString = substr($uri, $joint+1);
		$getParsed = explode('&' , $getString);

		//the rest of the array are get statements, parse them out.
		foreach ($getParsed as $argument){
		    list($variable , $value) = explode('=' , $argument);
		    $getVars[$variable] = $value;
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
	        //did we name our class correctly?
	        die('class does not exist!');
	    }
	}
	else
	{
	    //can't find the file in 'controllers'! 
	    die("$target does not exist!");
	}

	
	if(isset($urlVars[1]) && $urlVars[1] != ""){
		$controller->$urlVars[1]($urlVars, $getVars);
	}
	$controller->main($urlVars, $getVars);

?>