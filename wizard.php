<?php 
	if(isset($_GET['failed'])){
		$page = $_GET['failed'];
		$error = "<h4>Page($page) does not exist, use this form to generate the model, view and controller for it.</h4>";
	}
	else{
		$page = "";
		$error = "";
	}
?>


<html>

<body>
<h3>**NOTE: Remove this file(wizard.php), before making your webapp public !</h3>

<h3>Create a new page</h3>

 <?=$error;?>

<form name="input" action="" method="post">
<legend>Page Name:</legend> <input type="text" name="pName" value="<?=$page;?>"> 
<input type="submit" value="Submit">
</form>
<hr>



<?php

	require_once('config/webroots.php');
	if(isset($_POST['pName']) && trim($_POST['pName']) != "") {

		$pName = $_POST['pName'];
		$pName = str_replace(".php", "", $pName);
		$pName = str_replace(".html", "", $pName);

		$pathController = CONTROLLERS.DS.$pName.".php";
		$pathModel = MODELS.DS.$pName.".php";
		$pathView = VIEWS.DS.$pName.".php";

		if(file_exists($pathController)){
			die("A controller already exists at $pathController, please resolve this by either manually deleting the controller or using a new page name.");
		}

		if(file_exists($pathModel)){
			die("A controller already exists at $pathModel, please resolve this by either manually deleting the controller or using a new page name.");
		}

		if(file_exists($pathView)){
			die("A controller already exists at $pathView, please resolve this by either manually deleting the controller or using a new page name.");
		}

		$name = strtolower($pName);
		$name = ucfirst($name);
		$controller = file_get_contents("templates/c.php");
		$controller = str_replace("__PAGE_NAME_REPLACEMENT__", $name, $controller);
		if(file_put_contents($pathController , $controller)){
			print("<h5>Sucessfully created controller(".$pathController.").</h5>");
		}
		else{
			die("Failed to create controller.");
		}


		$model = file_get_contents("templates/m.php");
		$model = str_replace("__PAGE_NAME_REPLACEMENT__", $name, $model);
		if(file_put_contents($pathModel , $model)){
			print("<h5>Sucessfully created model(".$pathModel.").</h5>");
		}
		else{
			die("Failed to create model.");
		}

		$view = file_get_contents("templates/v.php");
		$view = str_replace("__PAGE_NAME_REPLACEMENT__", $name, $view);
		if(file_put_contents($pathView , $view)){
			print("<h5>Sucessfully created view(".$pathView.").</h5>");
		}
		else{
			die("Failed to create view.");
		}
		$newURL = $_SERVER['SCRIPT_NAME'];
		$newURL = str_replace("wizard.php", $pName, $newURL);
		$newURL = "http://".$_SERVER['SERVER_NAME'].$newURL;
		print("<h5>Your new page is now accessible at <a href='$newURL'>$newURL</a>");
	}
?>


</body>
</html>