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

		$name = strtolower($pName);
		$name = ucfirst($name);
		$controller = file_get_contents("templates/c.php");
		$controller = str_replace("__PAGE_NAME_REPLACEMENT__", $name, $controller);
		if(file_put_contents(CONTROLLERS.DS.$pName.".php" , $controller)){
			print("<h5>Sucessfully created controller(".CONTROLLERS.DS.$pName.".php".").</h5>");
		}
		else{
			die("Failed to create controller.");
		}


		$model = file_get_contents("templates/m.php");
		$model = str_replace("__PAGE_NAME_REPLACEMENT__", $name, $model);
		if(file_put_contents(MODELS.DS.$pName.".php" , $model)){
			print("<h5>Sucessfully created model(".MODELS.DS.$pName.".php".").</h5>");
		}
		else{
			die("Failed to create model.");
		}

		$view = file_get_contents("templates/v.php");
		$view = str_replace("__PAGE_NAME_REPLACEMENT__", $name, $view);
		if(file_put_contents(VIEWS.DS.$pName.".php" , $view)){
			print("<h5>Sucessfully created view(".VIEWS.DS.$pName.".php".").</h5>");
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