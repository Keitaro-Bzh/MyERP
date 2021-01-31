<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/classFonctions/fnClasse_Personne.php';

class Personne extends MyERP {
	protected $idPersonne;
	protected $civilite;
	protected $nom;
	protected $nomJF;
	protected $prenom;
	protected $telephone;
	protected $mobile;
	protected $email;
	protected $dateNaissance;
}