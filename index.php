<?php
	require_once('config/webroots.php');
	//Start buffering page content, used for title replacement.
	ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descprition here">
    <meta name="author" content="Author's name">
    <title><!--TITLE--></title>
	
	<!-- Vendor CSS -->
	<link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	
    <?php
    	/*Adding static css stylesheets*/
    	$dir    = 'assets'.DS.'css'.DS.'_static';
		$fileList = scandir($dir);
		foreach ($fileList as $item) {
			if($item != "." && $item != ".."){
				if(substr($item, sizeof($item)-4) == "css"){
					print("<!--$item-->\r\n");
					print('<link href="'.SITE_ROOT.DS.$dir.DS.$item.'" rel="stylesheet" type="text/css" />'."\r\n");
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
    <div class="container">
		<div>
			<?php
				require_once(CONTROLLERS.DS."router.php");
			?>
		</div>
	</div>
		<!-- Le Javascript -->
		<!-- Vendors JS-->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript">
			if(typeof jQuery == 'undefined') {
				//<![CDATA[
				document.write("<script src='vendors/jquery/jquery.min.js' type='text/javascript'><\/script>");
				//]]>
			}
		</script>
		<script type="text/javascript" src="vendors/bootstrap/js/bootstrap.min.js"></script>

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
				//Do nothing
			}
		?>
	</body>
</html>