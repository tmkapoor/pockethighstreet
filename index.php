<?php
	require_once('config/webroots.php');
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>snapMVC | <?=APPNAME;?></title>
		<meta charset="windows-1252">
	<!--
		<meta name="Keywords" content="__Keywords_go_here___">
		<meta name="Description" content="__Website_description_goes_here__">
		<link rel="shortcut icon" href="__path_to_favicon_image_goes_here__" type="image/x-icon">
	    <meta name="author" content="__author's_name_goes_here__">
	-->
	    <link href="assets/css/main.css" type="text/css" rel="stylesheet" />
	    <link href="assets/css/bootstrap.css" rel="stylesheet">
	    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
	</head>
	<body>
		<div id="content">
			<?php
				require_once(CONTROLLERS.DS."router.php");
			?>
		</div>
	</body>
</html>