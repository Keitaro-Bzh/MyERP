<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/Personne.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/classFonctions/fnClasse_User.php';

class User extends Personne
{
	protected $idUser;
	protected $username;
	protected $password;
	protected $acces;
	protected $template;
	protected $onArchive;
	
	protected $Avatar;

	/* Fonctions spécifiques à la classe en cours */
	public function get_AvatarChemin() {
		$cheminDefault = 'templates\backend\default\images\avatar.png';
		// On ne charge l'information que si l'objet Avatar est défini et s'il s'agit bien d'un objet (cas d'un enregistrement ou la valeur sera un string)
		if(isset($this->Avatar) && is_object($this->Avatar)) {
			$cheminDefault = $this->Avatar->get_Valeur('chemin').$this->Avatar->get_Valeur('nomFichier');
		}
		return $cheminDefault;
	}

	/* Fonctions issues de la class MyERP surchargées */
	public function set_ObjetToBase() {
		// Lors de l'enregistrement, on va vérifier qu'il existe des valeurs par défaut pour le template
		if (!$this->template) {
			$this->template = 'backend/default';
		}
		// Il faut aussi gérer le cryptage du mot de passe
		if (isset($_POST['formulaire'])) {
			// On est dans le cas d'une page de configuration de l'utilisateur avec le champ password
			if (isset($_POST['password'])) {
				$chiffrePassword = false;
				if (strcmp($this->password,$_POST['password']) !== 0) {
					$chiffrePassword = true;
				}
				$this->set_FormPostToObjet();
				if ($chiffrePassword) {
					$this->password = md5($this->password);
				}
			}
			// On  provient de la page profil, donc on procède à une exception pour le formulaire
			else {
				$pwd = $this->password;
				$this->set_FormPostToObjet();
				$this->password = $pwd;
			}


			// On va vérifier qu'il y a eu une modification du mot de passe

			unset($_POST);
		}
		
		parent::set_ObjetToBase();
	}
}