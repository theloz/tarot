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
	<script src="js/foundation/foundation.alert.js"></script>
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
			<div class="row" style="margin-top: 20px;">
				<div class="small-4 small-offset-4 columns">
				<form action="__setsubscribe.php">
					<div class="small-12 columns">
						<label class="txt-white"><?php echo $l['comm']['email']?> *
							<input name="email" type="email" placeholder="tarotplayer@null.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="required" />
						</label>
					</div>
					<div class="small-12 columns">
						<label class="txt-white"><?php echo $l['comm']['password']?> *
							<input name="pwd" type="password" placeholder="" pattern=".{6,8}" title="<?php echo $l['subs']['empattern']?>" required="required" />
						</label>
					</div>
					<div class="small-12 columns">
						<label class="txt-white"><?php echo $l['comm']['password']?> (<?php echo $l['comm']['again']?>) *
							<input name="pwd2" type="password" placeholder="" pattern=".{6,8}" title="<?php echo $l['subs']['empattern']?>" required="required" />
						</label>
					</div>
					<div class="small-12 columns">
						<label class="txt-white"><?php echo $l['comm']['nick']?> (<?php echo $l['comm']['opt']?>)
							<input name="nick" type="text" placeholder="" pattern="[A-Za-z0-9]{4,10}" title="<?php echo $l['subs']['nickpattern']?>" />
						</label>
					</div>
					<div class="small-8 small-offset-6 columns"><button type="submit" class="button small tarotbutton"><?php echo $l['comm']['send']?></button></div>
				</form>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
