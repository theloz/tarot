<?php
include 'classes/langs.php';
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wheel of Tarots | inspired by the work of Camoin, Jodorowski</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/vendor/modernizr.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700,700italic' rel='stylesheet' type='text/css'>
  </head>
  <body>
	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation/foundation.js"></script>
	<script src="js/foundation/foundation.topbar.js"></script>
	<!-- Other JS plugins can be included here -->

	<script>
		$(document).foundation();
	</script>
	<div class="container" style="margin:0;">
		<div class="row">
			<?php include 'menu.php'?>
		</div>
	</div>
	<div class="container">
		<div class="row mainbody">
			<div class="large-12 columns center home-center ">
				<h1 class="">Wheel of Tarots</h1>
				--- based on Camoin & Jodorowski's work ---
				<br /><br /><br />
				<a href="/choice.php" class="button small"><?php echo $l['home']['button']?></a>
			</div>
			
		</div>
	</div>
  </body>
</html>