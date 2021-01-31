<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/_myComptaScript.php'); ?>

<script>
	function chargeScriptPerso() {
		// Chargement de l'onglet par défaut au chargement de la page
		tabTiers();

		// $('#divContenuPopupGenerique').load('frameworks/myFramework/scripts/PHP_MyERP_AJAX.php',{
		// 			source : 'AJAX',
		// 			cible: 'AJAX_afficheFormObjet',
		// 			plugin: 'myCompta',
		// 			classe: 'Banque',
		// 			idObjet: null,
		// 		});

		// On va écouter les actions possibles sur notre page
		$('.myEventJS').click(function() {
			var id = $(this).attr("id");
			switch (id) {
				case 'tabTiers' :
					tabTiers();
					break;
				case 'tabCategorie' :
					tabCategorie();
					break;
				case 'tabCompte' :
					tabCompte();
					break;
			}
		});
	}

	// function routagePage(args) {
	// 	switch (args) {
	// 		case 'formCompte':
	// 			$('#divContenuPopupGenerique').load('frameworks/myFramework/scripts/PHP_MyERP_AJAX.php',{
	// 				source : 'AJAX',
	// 				cible: 'AJAX_afficheFormObjet',
	// 				plugin: 'myCompta',
	// 				classe: 'Compte',
	// 				idObjet: null,
	// 			});
	// 			break;
	// 		case 'formBanque':
	// 			$('#divContenuPopupGenerique').load('frameworks/myFramework/scripts/PHP_MyERP_AJAX.php',{
	// 				source : 'AJAX',
	// 				cible: 'AJAX_afficheFormObjet',
	// 				plugin: 'myCompta',
	// 				classe: 'Banque',
	// 				idObjet: null,
	// 			});
	// 			break;
	// 		// case 'btnFamilleNew':
	// 		// 	$('#mydialog').load('frameworks/myFramework/scripts/PHP_AJAX.php',{
	// 		// 		source : 'AJAX',
	// 		// 		fonction: 'getObjet',
	// 		// 		plugin: 'myCompta',
	// 		// 		classe: 'Famille',
	// 		// 		idObjet: null,
	// 		// 	});
	// 		// 	$dialog.showModal();
	// 		// 	tabCategorie();
	// 		// 	break;
	// 		// case 'btnCategorieNew':
	// 		// 	$('#mydialog').load('frameworks/myFramework/scripts/PHP_AJAX.php',{
	// 		// 		source : 'AJAX',
	// 		// 		fonction: 'getObjet',
	// 		// 		plugin: 'myCompta',
	// 		// 		classe: 'Categorie',
	// 		// 		idObjet: null,
	// 		// 	});
	// 		// 	$dialog.showModal();
	// 		// 	tabCategorie();
	// 		// 	break;
	// 	}
	// }

	function tabCompte() {
		$('#divCompte').load('plugins/MyCompta/scripts/AJAX_myCompta.php',{
			source : 'AJAX',
			action: 'AJAX_afficheListeCoordonneesBancaires'
		});
	}

	function tabCategorie() {
		$('#divCategorie').load('plugins/MyCompta/scripts/AJAX_myCompta.php',{
			source : 'AJAX',
			action: 'AJAX_afficheListeCategories'
		});
	}

	function tabTiers() {
		$('#divTiers').load('plugins/MyCompta/scripts/AJAX_myCompta.php',{
			source : 'AJAX',
			action: 'AJAX_afficheListeTiers'
		});
	}
</script>

