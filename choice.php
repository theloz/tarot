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
			<div class="large-12 columns center choice mainbody">
				<?php if(!isset($_SESSION['login'])):?>
				<?php echo $l['choice']['loginmsg']?>, <a href="subscribe.php"><?php echo $l['choice']['subscribe']?></a>
				<?php endif;?>
				<div class="large-12 columns center choice">
					<form id="choiceform" action="__setrequest.php">
					<div class="row">
						<div class="small-12 columns">
							<div data-alert class="alert-box alert radius" style="display:none;" id="msg1">
								<?php echo $l['choice']['error1']?>
								<a href="#" class="close">&times;</a>
							</div>
							<div data-alert class="alert-box alert radius" style="display:none;" id="msg2">
								<?php echo $l['choice']['error2']?>
								<a href="#" class="close">&times;</a>
							</div>
							<div data-alert class="alert-box alert radius" style="display:none;" id="msg3">
								<?php echo $l['choice']['error3']?>
								<a href="#" class="close">&times;</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="small-3 columns">
							<label class="txt-white right inline"><?php echo $l['choice']['slices']?></label>
						</div>
						<div class="small-1 columns">
								<select name="slice" id="slice">
								<?php for($i=1;$i<25;$i++): echo '<option value="'.$i.'">'.$i.'</option>'; endfor;?>
								</select>
						</div>
						<div class="small-2 columns">
							<label class="txt-white inline"><?php echo $l['choice']['fill']?></label>
						</div>
						<div class="small-2 columns">
							<input name="empties" type="radio" value="yes" checked="checked" /> <?php echo $l['comm']['yes']?>
							<input name="empties" type="radio" value="no" /> <?php echo $l['comm']['no']?>
						</div>
						<div class="small-5 columns"></div>
					</div>
					<div class="row">
						<div class="small-12 columns"><?php echo $l['choice']['tarots']?>, </div>
						<div class="small-12 columns"><button type="submit" class="button tiny tarotbutton"><?php echo $l['choice']['build']?></button></div>
						<div class="small-12 columns">
							<ul class="clearing-thumbs small-block-grid-6" data-clearing>
							<?php
							$db = new PDO('sqlite:db/wheeloftarots.sqlite', '', '', array(
								PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
							));
							$result = $db->query('SELECT * FROM tarots');
							//print_r($result);exit;
							foreach($result as $row){
								//echo '<img class="th thumb" src="img/'.$row['pict'].'" />';
								echo '<li><img class="th thumb" data-caption="img/'.$row['tname'].'" src="img/'.$row['pict'].'">'
								. '<input class="cchek" type="checkbox" name="tarot[]" value="'.$row['id'].'" />   '
								. ''.$row['sequence'].' '
								. ''.$row['tname'].''
								. '</li>';
							}
							$db = NULL;
							?>
							</ul>
						</div>
						<div class="small-12 columns"><button type="submit" class="button tiny tarotbutton"><?php echo $l['choice']['build']?></button></div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		//reset all checks
		$('.cchek').prop('checked',false);
		//switch border and checks
		$('.thumb').click(function(){
			//$(this).css('border','1px solid red');
			//alert($(this).next().name);
			if($(this).next().prop('checked') == false){
				$(this).addClass('blueborder');
				$(this).next().prop('checked',true);
			}
			else{
				$(this).removeClass('blueborder');
				$(this).next().prop('checked',false);
			}
		});
		$('.cchek').click(function(){
			if($(this).prop('checked') == false){
				$(this).prev().removeClass('blueborder');
				//$(this).next().prop('checked',true);
			}
			else{
				$(this).prev().addClass('blueborder');
				//$(this).next().prop('checked',false);
			}
		});
		//check form submit calculate tarots/slice ratio
		$('#choiceform').submit(function(){
			//count tarots
			var tarots = $('input:checkbox:checked').length;
			var slice = $( "#slice" ).val();
			//alert('form submitted. Checked: '+tarots+' slices: '+slice);
			//block the button
			//$('.tarotbutton').prop('disabled',true);
			if(tarots==0){
				$('#msg3').show();
				$(document).foundation('alert', 'reflow');
				$('#msg3').delay(2000).fadeOut(1500);
				return false;
			}
			if( tarots > slice){
				$('#msg1').show();
				$(document).foundation('alert', 'reflow');
				$('#msg1').delay(2000).fadeOut(1500);
				return false;
			}
			//alert(slice%tarots);
			var empty = $( "input:radio[name=empties]:checked" ).val();
			if((slice%tarots)!=0 && empty == 'no' ){
				$('#msg2').show();
				$(document).foundation('alert', 'reflow');
				$('#msg2').delay(2000).fadeOut(1500);
				return false;
			}
			return true;
		});
	</script>
  </body>
</html>

