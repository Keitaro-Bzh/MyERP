<?php
// On va définir notre classe
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Famille.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_Categorie.php';
class Categorie extends Famille
{
	// Définition des variables correspondant à notre table dans la base
	protected $idCategorie;
	protected $Famille;
	protected $nomCategorie;
	protected $onArchive;

}
