<div class="contain-to-grid">
	<nav class="top-bar" data-topbar role="navigation">
		<ul class="title-area">
		  <li class="name">
		    <h1><a href="index.php">Wheel of Tarots</a></h1>
		  </li>
		   <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		  <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>

		<section class="top-bar-section">
		  <!-- Right Nav Section -->
			<ul class="right">
				<li class="has-dropdown">
					<a href="#"><?php echo $l['menu']['choice']?></a>
					<ul class="dropdown">
						<li<?php echo ($lang=='en') ? ' class="active"' : ''?>><a href="#en"><?php echo $l['menu']['lang1']?></a></li>
						<li<?php echo ($lang=='it') ? ' class="active"' : ''?>><a href="#it"><?php echo $l['menu']['lang2']?></a></li>
					</ul>
				</li>
			</ul>
			<ul class="right">
				<!--li class="active"><a href="#">Right Button Active</a></li-->
				<li class="has-dropdown">
					<a href="#"><?php echo $l['menu']['users']?></a>
					<ul class="dropdown">
						<li><a href="saved.php"><?php echo $l['menu']['saved']?></a></li>
						<li class="active"><a href="login.php"><?php echo $l['menu']['login']?></a></li>
					</ul>
				</li>
			</ul>

			<!-- Left Nav Section -->
			<ul class="left">
				<!--li><a href="#">Entra</a></li-->
			</ul>
		</section>
	</nav>
</div>
