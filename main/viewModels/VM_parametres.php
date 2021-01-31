<?php
if ($_SESSION['niveauAccesGeneral'] === 9) {
	switch ($_GET['rubrique']) {
		case 'Affichage':
			$configAffichage = new ConfigAffichage();
			if (isset($_POST['formulaire']) && isset($_POST['enreg'])) {
				$configAffichage->set_FormPostToObjet($_POST);
				$idGEneral = $configAffichage->set_ObjetToBase();
			}
			else {
				$configAffichage->get_ObjetFromBase(array('idObjet' => '1'));	
			}
			$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewForm_parametreAffichage.php';
		break;
		case 'Users' :
			// On va charger les utilisateurs
			require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/User.php';
			$user = new User();
			if (isset($_POST['enreg'])) {
				if ((int)$_POST['idUser'] > 0) {
					$user->get_ObjetFromBase(array('idObjet' => $_POST['idUser']));
				}
				$idObjet = $user->set_ObjetToBase();
			}
			if (isset($_GET['action'])) {
				switch ($_GET['action']){
					case 'ajout':
						$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewForm_User.php';
						break;
					case 'modif':
						$user->get_ObjetFromBase(array('idObjet' => $_GET['id']));
						$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewForm_User.php';
						break;
					case 'supprime':
						$user->del_ObjetFromBase(array('idObjet' => $_GET['id']));
						$tableauUsers = $user->get_ObjetPrepareListTableau();
						$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_parametreUsers.php';
				}
			}
			else {
				$tableauUsers = $user->get_ObjetPrepareListTableau();
				$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_parametreUsers.php';
			}
		break;
		case 'Configuration' :
			// On va charger les utilisateurs
			require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/ConfigSite.php';
			
			if (isset($_POST['formulaire']) && isset($_POST['enreg'])) {
				$myConfigSite->set_FormPostToObjet($_POST);
				$idConfig = $myConfigSite->set_ObjetToBase();
			}

			$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewForm_parametreSite.php';
		break;
		default:
			$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Interdit.php';
			break;

	}
}
else {
	$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Interdit.php';
}
