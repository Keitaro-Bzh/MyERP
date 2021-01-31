<div class="page-title">
	<div class="title_left">
	<h3><?php echo (isset($titrePageDetailObjet) && ($titrePageDetailObjet) ? $titrePageDetailObjet : ""); ?></h3>
	</div>
</div>
<div class="clearfix"></div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $_GET['module'] . '/views/viewForm_' . $_GET['rubrique'] . '.php'; ?>
