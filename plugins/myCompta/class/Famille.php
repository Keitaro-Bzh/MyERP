<?php
// On va définir notre classe
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_Famille.php';
class Famille extends MyERP
{
	// Définition des variables correspondant à notre table dans la base
	protected $idFamille;
	protected $nomFamille;
	protected $onArchive;
	
}

