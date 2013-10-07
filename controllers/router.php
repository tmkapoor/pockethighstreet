<?php
	//fetch the passed request

	define('URLSEP', '/');
	$urlVars = array();
	$getVars = array();

	$completeURL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$isHTTPS = ($_SERVER['REQUEST_SCHEME'] == "https")?true:false;
	$request = $_SERVER['QUERY_STRING'];
	$request = substr($request, 4);
	$urlVars = explode(URLSEP, $request);

	//the page is the first element
	if($urlVars[0] == "")
		$page = "index";
	else
		$page = $urlVars[0];

	/** TODO: remove last empty urlVars element created when tere is a trailing '/' **/

	$uri = $_SERVER['REQUEST_URI'];
	$joint = strpos($uri, '?');
	if($joint){
		$getString = substr($uri, $joint+1);
		print($getString);
		$getParsed = explode('&' , $getString);

		//the rest of the array are get statements, parse them out.
		foreach ($getParsed as $argument){
		    list($variable , $value) = explode('=' , $argument);
		    $getVars[$variable] = $value;
		}
	}
	//compute the path to the file
	$target = CONTROLLERS.DS.$page.'.php';

	//get target
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

	//once we have the controller instantiated, execute the default function
	//pass any GET varaibles to the main method
	if(isset($urlVars[1]) && $urlVars[1] != ""){
		$controller->$urlVars[1]($urlVars, $getVars);
	}
	$controller->main($urlVars, $getVars);

?>