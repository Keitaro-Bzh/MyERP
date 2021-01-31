<?php
// Déclaration de nos classes
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/User.php';


switch ($_GET['module']) {
	case 'profil':;
		$monObjet = new User();
		if (isset($_POST['enreg']) && strcmp($_POST['class'],'User' === 0) && (int)$_POST['idUser'] === (int)$_SESSION['id'] ) {
			$monObjet->get_ObjetFromBase(array('idObjet' => $_POST['idUser']));
			$idObjet = $monObjet->set_ObjetToBase();
			// On recharge l'objet avec les nouvelles valeurs sinon le logo ne se met pas à jour
			$monObjet->get_ObjetFromBase(array('idObjet' => $idObjet));
			// On met les informations de notre session à jour
			$_SESSION['template'] = $monObjet->get_Valeur('template');
			$_SESSION['avatar'] = $monObjet->get_AvatarChemin();
		}
		else {
			$monObjet->get_ObjetFromBase(array('idObjet' => $_SESSION['id']));
		}
		$popupActif = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewDialog_profil.php';
		$corpsPage =  $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Profil.php';
		break;
	default:
		$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Interdit.php';
		break;
}

// On déclare notre script JS/PHP qui correspond à notre page
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/main/scripts/JS_profil.php';
$scriptPersoJSOnLoad = true;
$pagePopup = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPopup_profil.php';