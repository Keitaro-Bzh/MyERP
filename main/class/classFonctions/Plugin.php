<?php

//require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyERP.php';

// On va définir notre classe
class Plugin extends MyERP
{
	// Définition des variables correspondant à notre table dans la base
	protected $idPlugin;
	protected $nomPlugin;
	protected $version;
	protected $typeBase;
	protected $versionBase;
	protected $developpeurs;
	protected $description;
	protected $relations;
	protected $active;
	
	/* On va surcharger la fonction de construction de l'objet
	 * afin de mettre à jour la base automatiquement
	 */
	public function __construct($args = null) {
		$this->getClasseDefinition();
		//$this->majDefinitionObjetTable();
		parent::__construct($args);
	}
	
	public function getClasseDefinition() {
		$this->nomTable = "_plugins";
		$this->nomID = "idPlugin";
		$this->suiviModification = false;
	}
	
	public function getBaseDefinition() {
		/* Le tableau d'en-tete sera construit de la même façon pour toutes les classes
		 * $nomChamp => nom du champ dans la table,
		 * $typeChamp => le type de champ dans la table,
		 * $lienBase => booleen pour savoir si le champ est dans la table,
		 * $afficheTableau => booleen pour savoir si on affiche dans le tableau,
		 * $nomAffiche => nom du label dans un tableau
		 */
		$baseDefinition = array(
				'idPlugin' =>  $this->baseDefinition('int',true,true,true,true),
				'nomplugin' => $this->baseDefinition('varchar(30)',false,false,false,false),
				'version' =>  $this->baseDefinition('varchar(30)',false,false,false,false),
				'typeBase' =>  $this->baseDefinition('varchar(30)',false,false,false,false),
				'versionBase' =>  $this->baseDefinition('varchar(30)',false,false,false,false),
				'developpeurs' =>  $this->baseDefinition('text',false,false,false,false),
				'description' =>  $this->baseDefinition('text',false,false,false,false),
				'relations' =>  $this->baseDefinition('text',false,false,false,false),
				'active' =>  $this->baseDefinition('tinyint',false,false,false,false),
		);
		return  $baseDefinition;
	}

}

