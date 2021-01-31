<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/Personne.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_Titulaire.php';

class Titulaire extends Personne
{
	protected $idTitulaire;
	protected $onArchive;

	/* Fonctions issues de la class MyERP surchargées */
	public function set_ObjetToBase() {	
		$idTitulaire = parent::set_ObjetToBase();

		// On va définir titulaire comme un tiers également afin de pouvoir l'utiliser dans les différents modules du plugin
		$myTiers = new Tiers();
		$myTiers->set_Valeur('Titulaire',$idTitulaire);
		$myTiers->set_ObjetToBase();
		
		return $idTitulaire;
	}
}