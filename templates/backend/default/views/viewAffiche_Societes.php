<?php if ($_SESSION[$nomPlugin] >= 1) {?>
<div class="page-title">
	<div class="title_left">
	<h3>EDITION D'UNE SOCIÉTÉ</h3>
	</div>
</div>
<div class="clearfix"></div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/_plugins/' . $plugin. '/views/_formSociete.php'; ?>
<a href='index.php?module=myContacts&rubrique=Societe'><button type=submit name="retour" class="btn btn-info pull-right">Retour</button></a>
<?php } else 
	include '_templates/' . $_SESSION['template'] . '/views/viewPage_Interdit.php';
?>

<script>
$(function() {
	function choixSiteCollaborateur() {
		$('#idSite').change(function() {
			rSiteID = $('#idSite').val();
			
			$('#tableauCollaborateur').html('<div class="center"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>');
			$('#tableauCollaborateur').load('_default/fonctions/referentiel/collaborateurs.php',
				{	fonction: 'createTableau',
					idSociete: '',		
					idSite: rSiteID
				});
			// On modifie le lien d'ajout du collaborateur pour charger le site en cours
			$("a#newCollaborateur").attr('href','index.php?module=referentiel&option=collaborateurs&action=nouveau&id=' + rSiteID);
		});
	};

	//Fonction générique pour afficher le tableau en fonction des filtres sur cette page
	function afficheTableauSite() {
		$('#tableauSite').html('<div class="center"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>');
		$('#tableauSite').load('_default/ViewModels/sites.php',
				{	fonction: 'createTableau',
					idSociete: ''		
				});
	};


	//Fonction générique pour afficher le tableau en fonction des filtres sur cette page
	function afficheTableauCollaborateur(rSiteID,rSocieteID) {
		$('#tableauCollaborateur').html('<div class="center"><img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>');
		$('#tableauCollaborateur').load('_default/ViewModels/collaborateurs.php',
			{	fonction: 'createTableau',
				idSociete: rSocieteID,		
				idSite: rSiteID
			},choixSiteCollaborateur);
	};

	// Fonction pour activer le champ ville si un code postal est saisi
    $('#codePostal').blur(function() {
    	getVilleSelect('ville','select','idVille','codePostal',$(this).val(),'libelleVille');
    });	
});
</script>