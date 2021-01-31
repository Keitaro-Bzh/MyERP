<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/classFonctions/fnClasse_ConfigAffichage.php';

// On va définir notre classe
class ConfigAffichage extends MyERP
{
	// Définition des variables correspondant à notre table dans la base
	protected $id;
	protected $titre;
	protected $sousTitre;
	protected $telContact;
	protected $mailContact;
	protected $footer;
	protected $onFrontend;
	protected $onDebug;
	protected $onRefresh;
}