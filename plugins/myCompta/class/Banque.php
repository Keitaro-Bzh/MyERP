<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/Societe.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_Banque.php';

class Banque extends Societe
{
	protected $idBanque;
	protected $codeBanque;
	protected $codeGuichet;
	protected $onArchive;

	/* Fonctions issues de la class MyERP surchargées */
	public function set_ObjetToBase() {	
		$idBanque = parent::set_ObjetToBase();

		// On va définir la banque comme un tiers également afin de pouvoir l'utiliser dans les différents modules du plugin
		$myTiers = new Tiers();
		$myTiers->set_Valeur('Banque',$idBanque);
		$myTiers->set_ObjetToBase();
		
		return $idBanque;
	}
}