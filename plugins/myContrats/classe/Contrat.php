<?php
class Contrat extends MyERP
{
	protected $idContrat;
	protected $Fournisseur;
	protected $libelle;
	protected $typeContrat;
	protected $dateSignature;
	protected $dateResiliation;
	protected $codeClient;
	protected $referenceFournisseur;
	protected $referenceInterne;
	protected $duree;
	protected $description;
	protected $Fichier;
	protected $onArchive;
	
	protected function getClasseDefinition() {
		$this->nomTable = "mycontrats_contrats";
		$this->nomID = "idContrat";
		$this->suiviModification = true;
		$this->champTriDefaut = array('libelle');
		$this->ordreTriDefaut = 'ASC';
	}
	
	public function __construct($args = null) {
		$args = array(
				'idObjet' => ((isset($args) AND (int)$args['idObjet'] > 0) ? (int)$args['idObjet']: null),
				'classeLiens' => array(
					array(
							'plugin' => 'myContacts',
							'classeLien' => 'Societe',
							'nomLienID' => 'idSociete',
							'typeLien' => 'x<->1',
							'classeObjet' => 'Fournisseur',
							'nomObjetID' => 'idFournisseur'
					),
					array(
							'plugin' => null,
							'classeLien' => 'Fichier',
							'nomLienID' => 'sourceID',
							'typeLien' => '1<->x',
							'nomObjetID' => 'idContrat',
					),
				)
		);
		parent::__construct($args);
	}
	
	public function getBaseDefinition() {
		$baseDefinition = array(
				'idContrat' => $this->baseDefinition('int',true,true,true,true),
				'idFournisseur' => $this->baseDefinition('int',false,false,true,false),
				'libelle' => $this->baseDefinition('varchar(100)',false,false,false,false),
				'typeContrat' => $this->baseDefinition('varchar(100)',false,false,false,false),
				'codeClient' => $this->baseDefinition('varchar(100)',false,false,false,false),
				'referenceFournisseur' => $this->baseDefinition('varchar(100)',false,false,false,false),
				'referenceInterne' => $this->baseDefinition('varchar(100)',false,false,false,false),
				'typeContrat' => $this->baseDefinition('varchar(100)',false,false,false,false),
				'dateSignature' => $this->baseDefinition('date',false,false,false,false),
				'duree' => $this->baseDefinition('int',false,false,false,false),
				'description' => $this->baseDefinition('text',false,false,false,false),
				'onArchive' => $this->baseDefinition('tinyint',false,false,false,false)
		);
		return  $baseDefinition;
	}
	
	public function getTableEnTeteDefinition() {
		$baseDefinition = $this->getBaseDefinition();
		return array(
				'idContrat' => setTableLigneDefinition('id',true,$baseDefinition['idContrat']['typeChamp']),
				'libelle' => setTableLigneDefinition("Libellé",true,$baseDefinition['libelle']['typeChamp']),
				'dateSignature' => setTableLigneDefinition("Date signature",true,$baseDefinition['dateSignature']['typeChamp']),
				'duree' => setTableLigneDefinition("Durée (en mois)",true,$baseDefinition['duree']['typeChamp'])
		);
	}
	
	// On va surcharger la fonction qui va uploader le ficher après la création due l'entrée base
	function setObjet($args = null) {
		$idContrat = parent::setObjet();

		if (isset($_FILES) && $_FILES['Contrat']['error'] !== 4){
			require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/Fichier.php';
			$monFichier = new Fichier();

			$monFichier->setValeur('sourcePlugin',($args ? $args['plugin'] : 'MyContrat'));
			$monFichier->setValeur('sourceObjet',($args ? $args['Objet'] : 'Contrat'));
			$monFichier->setValeur('sourceID',$idContrat);
			
			$monFichier->setObjet(array('fournisseur' => 'SFR', 'reference' => '123'));
		}
	}
		
	/* ****************************************************
	 * 		FONCTIONS SPECIFIQUES A LA CLASSE EN COURS
	 * ****************************************************/
}

