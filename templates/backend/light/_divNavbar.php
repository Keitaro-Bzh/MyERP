<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Bienvenue sur MyERP<?php //echo (isset($titrePlugin) ? $titrePlugin : 'Bienvenue sur MyERP'); ?></h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="mdi mdi-magnify button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<?php if (isset($_SESSION['id'])) { ?>
			<a href="index.php?module=logout" class="ico-item mdi mdi-logout js__logout"></a>
		<?php } else { ?>
			<a href="#" class="ico-item mdi mdi-login" alt="Connexion"></a>
		<?php } ?>
	</div>
	<!-- /.pull-right -->
</div>