<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/classFonctions/fnClasse_Societe.php';

class Societe extends MyERP{
	protected $idSociete;
	protected $statut;
	protected $nom;
	protected $enseigne;
	protected $url;
	protected $telephone;
	protected $fax;
	protected $email;
	
	protected $Logo;

	public function get_LogoChemin() {
		$cheminDefault = 'templates\default\images\avatar.png';
		if(isset($this->Logo)) {
			$cheminDefault = $this->Logo->get_Valeur('chemin').$this->Logo->get_Valeur('nom');
		}
		return $cheminDefault;
	}
}