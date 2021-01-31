<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main//class/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myECommerce/class/Client.php';

$monClient = new Client();

if (isset($_POST['enreg'])) {
	$MyPDO = new MyPDO();
	$requeteSQL = "SELECT idUser FROM my_users WHERE username = '" . htmlSpecialChars($_POST['username']) . "' AND password = '" . md5(htmlspecialchars($_POST['password'])) . "'";
	$retourRequete = $MyPDO->myQuery($requeteSQL);

	if ($retourRequete) {
		// On se connecte à la base pour récupérer les informations de l'objet
		require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/User.php';
		$monUser = new User();
		$monUser->get_ObjetFromBase(array('idObjet' => $retourRequete['idUser']));

		$erreurLogin = null;

		// Notre connexion est valide, on va donc renseigner nos variables de session
		if ($monUser->get_Valeur('onArchive') === null) {
			if ($monUser->get_Valeur('acces') > 0) {
				$_SESSION['connexionValid'] = true;
				$_SESSION['id'] = $monUser->get_Valeur('idUser');
				$_SESSION['template'] = $monUser->get_Valeur('template');
				$_SESSION['user'] = $monUser->get_Valeur('username');
				$_SESSION['avatar'] = $monUser->get_AvatarChemin(); 
				
				$_SESSION['niveauAccesGeneral'] = (int)$monUser->get_Valeur('acces');

				// On va définir les niveau d'accès pour chaque plugin
				require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/fonctions/fn_myERP.php';
				$listePlugin = listeDossiers(array('dossier' => 'plugins'));
			}
			else {
				$_SESSION['connexionValid'] = false;
				$erreurLogin = "Vous n'êtes pas autorisé à accéder au site";
			}
		}
		else {
			$_SESSION['connexionValid'] = false;
			$erreurLogin = "Votre compte est désactivé";
		}		
	}
	else {
		$_SESSION['connexionValid'] = false;
		$erreurLogin = "Utilisateur/Mot de passe erroné";
	}
}

if (!isset($_SESSION['connexionValid']) || (isset($_SESSION['connexionValid']) && !($_SESSION['connexionValid']))) {
	$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewForm_Login.php';
}
else {
	$corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/tableauBord.php';
}