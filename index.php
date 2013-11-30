<?php
	require_once('config/webroots.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descprition here">
    <meta name="author" content="Author's name">
    <title><!--TITLE--></title>
    <?php
    	/*Adding static css stylesheets*/
    	$dir    = 'assets'.DS.'css'.DS.'_static';
		$fileList = scandir($dir);
		foreach ($fileList as $item) {
			if($item != "." && $item != ".."){
				if(substr($item, sizeof($item)-4) == "css"){
					print("<!--$item-->\r\n");
					print('<link href="'.SITE_ROOT.DS.$dir.DS.$item.'" rel="stylesheet" type="text/css">'."\r\n");
				}
			}
		}
	?>
    <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-ie7.min.css">
    <![endif]-->
      <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="assets/css/coming-soon-ie-lt-9.css">
    <![endif]-->
  </head>
  <body>
    <div>
      <div>
				<?php
					require_once(CONTROLLERS.DS."router.php");
				?>
			</div>
		</div>
	</body>
</html>
<!-- Le Javascript -->
<?php
	/*Adding static js script files*/
	$dir    = 'assets'.DS.'js'.DS.'_static';
	$fileList = scandir($dir);
	foreach ($fileList as $item) {
		if($item != "." && $item != ".."){
			if(substr($item, sizeof($item)-3) == "js"){
				print("<!--$item-->\r\n");
				print('<script src="'.$dir.DS.$item.'" type="text/javascript"></script>'."\r\n");
			}
		}
	}

	if(file_exists("assets".DS."js".DS.$page.".js")){
		print('<script src="'.SITE_ROOT.DS."assets".DS."js".DS.$page.".js".'" type="text/javascript"></script>'."\r\n");
	}
	else{
		print("<!-- No javascript file(assets".DS."js".DS.$page.".js) was found for this page-->");
	}
?>