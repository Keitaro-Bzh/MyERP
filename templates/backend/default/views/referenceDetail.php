<div class="page-title">
	<div class="title_left">
	    <h3><?php echo (isset($titrePageDetailObjet) && ($titrePageDetailObjet) ? $titrePageDetailObjet : ""); ?></h3>
	</div>
</div>
<div class="clearfix"></div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $_GET['module']. '/views/viewAffiche_' . $_GET['rubrique'] . '.php'; ?>
<a href='index.php?module=<?php echo $_GET['module']; ?>&rubrique=<?php echo $_GET['rubrique']; ?>'><button type=submit name="retour" class="btn btn-info pull-right">Retour</button></a>