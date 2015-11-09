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
					print('<link href="/'.SITE_ROOT.DS.$dir.DS.$item.'" rel="stylesheet" type="text/css" />'."\r\n");
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
    	<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">PocketHighStreet</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
		        <li><a href="#">Blog</a></li>
		      </ul>
		      <form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
		      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		          </ul>
		        </li>

		        <li><a href="#">Link</a></li>

		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
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
				print('<script src="/'.SITE_ROOT.DS."assets".DS."js".DS.$page.".js".'" type="text/javascript"></script>'."\r\n");
			}
			else{
				//Do nothing
			}
		?>
	</body>
</html>