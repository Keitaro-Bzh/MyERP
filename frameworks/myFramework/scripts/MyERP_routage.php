<?php
// On va charger les fichiers qui seront utiles pour l'intégralité du site
require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyPDO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/fonctions/fn_myERP.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_template_Include.php';

/* On va charger la liste des plugins possible sur le site */	
$listPlugins = listeDossiers(array('dossier' => 'plugins'));

// On parcourt les plugins pour affiche le bon
foreach ($listPlugins as $plugin) {
	$modulePlugin = false;
	if (isset($_GET['module']) && $_GET['module'] === $plugin) {
		$nomPlugin = $_GET['module'];
		$modulePlugin = true;
		break;
	}
}


/* Toutes les pages qui ne seront pas trouvés par notre routine
de routage seront routées directement vers la page 404 */
$corpsPage= $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_404.php';

if (isset($_GET) && isset($_GET['module'])){
	// Aucun rapprochement avec les plugins existants
	// On est donc dans le routage de base du site
	if (!$modulePlugin) {
		// On va rediriger notre site en fonction du module chargé
		// pour nos différents composants de base du site
		switch ($_GET['module']) {
			case 'logout':
				session_destroy();
				header("Location:index.php");
				break;
			case 'login':
				include ($_SERVER['DOCUMENT_ROOT'] . '/main/viewModels/VM_login.php');
				break;
			case 'register':
				include ($_SERVER['DOCUMENT_ROOT'] . '/plugins/myECommerce/viewModels/VM_register.php');
				break;
			case 'calendrier':
				$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Calendrier.php';
				break;
			case 'demo':
				$demoLogin = true;
				include ($_SERVER['DOCUMENT_ROOT'] . '/main/viewModels/login.php');
				break;
			case 'doc':
					if (isset($_GET['rubrique'])) {
						switch ($_GET['rubrique']) {
							case 'routage':
								$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_docRoute.php';
								break;
							case 'plugins':
								$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_docPlugins.php';
								break;
							case 'class':
								$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_docClass.php';
								break;
							default:
								$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/404.php';
								break;
						}
					}
					break;
			case 'parametre':
				include ($_SERVER['DOCUMENT_ROOT'] . '/main/viewModels/VM_parametres.php');
				break;
			case 'profil':
				include ($_SERVER['DOCUMENT_ROOT'] . '/main/viewModels/VM_profil.php');
				break;
			case 'apropos':
				$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/apropos.php';
				break;
			case 'construction':
				$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/construction.php';
				break;
			case 'debug':
				if ($_SESSION['niveauAccesGeneral'] === 9) {
					$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/debug.php';
				} else {
					$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Interdit.php';
				}
				break;
			default:
				// Aucune correspondance donc tentative de modification de l'URL (inclue les routages plugins erronés)
				$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Interdit.php';
				break;
		}
	}
	else {
		// On va définir le routage de nos plugins de manière automatique
		// On va commencer par charger les fichiers de paramétrage du plugin
		include_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $nomPlugin . '/' . $nomPlugin . '.php');

		// On va vérifier si un lien existe entre nos plugins afin de charger les fichiers de classes associés
		$nomFonction = $plugin . 'GetDefinitionPlugin';
		$infoPlugin = $nomFonction();
		if ($infoPlugin['relations']) {
			foreach($infoPlugin['relations'] as $relationPlugin) {
				include_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $relationPlugin . '/scripts/_' . $relationPlugin . 'Include.php');
			}
		}
		include_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $nomPlugin . '/scripts/_' . $nomPlugin . 'Include.php');


		// On va vérifier si l'on est dans un sous-menu de notre plugin
		if (isset($_GET['rubrique'])) {
			//On va consdérer toutes les demandes comme du hacking
			$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Interdit.php';

			// On va recharger notre liste de plugin
			$nomFonction = $nomPlugin . 'GetListeRubrique';
			$listeRubrique = $nomFonction();
			foreach ($listeRubrique as $rubrique) {
				//On vérifie que notre rubrique est bien sous forme de tableau (pour éviter le séparateur)
				if (is_array($rubrique)) {
					if ($_GET['rubrique'] === $rubrique['nom']) {
						include($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $nomPlugin. '/viewModels/' . $rubrique['page'] . '.php');
						include_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/scripts/MyERP_PluginConstitutionPage.php';
						break;
					}
					if ($_GET['rubrique'] === 'infoPlugin') {
						$nomFonction = $plugin . 'GetDefinitionPlugin';
						$infoPlugin = $nomFonction();
						$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template']. '/views/viewPage_infoPlugins.php';
					}
				}
			}
		}
		else {
			if ($tableauBordPlugin) {
				$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $nomPlugin . '/views/' . $tableauBordPlugin . '.php';
			}
			else {
				$corpsPage= $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_404.php';
			}
		}
	}
}
else {
	if (isset($_SESSION['id'])) {
		$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/tableauBord.php';
	}
	else {
		$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/tableauBordInvite.php';
	}
}