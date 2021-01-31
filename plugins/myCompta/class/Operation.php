<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_Operation.php';

class Operation extends MyERP
{
	protected $idOperation;
	protected $date;
	protected $typeMouvement;
	protected $modePaiement;
	protected $numCheque;
	protected $description;
	protected $montant;
	protected $onArchive;

	
	protected $Categorie;
	protected $Compte;
	protected $Tiers;
	
//	public function getBaseDefinition() {
//		$baseDefinition = array(
//			'idOperation' => $this->baseDefinition('int',true,true,true,true),
//			'date' => $this->baseDefinition('date',false,false,false,false),
//			'idCompte' => $this->baseDefinition('int',false,false,false,false),
//			'type' => $this->baseDefinition('varchar(1)',false,false,false,false),
//			'mode' => $this->baseDefinition('varchar(3)',false,false,false,false),
//			'numCheque' => $this->baseDefinition('int',false,false,false,false),
//			'idCategorie' => $this->baseDefinition('int',false,false,false,false),
//			'typeTiers' => $this->baseDefinition('varchar(1)',false,false,false,false),
//			'beneficiaire' => $this->baseDefinition('varchar(255)',false,false,false,false),
//			'idTiers' => $this->baseDefinition('int',false,false,false,false),
//			'description' => $this->baseDefinition('varchar(200)',false,false,false,false),
//			'montant' => $this->baseDefinition('float',false,false,false,false),
//			'idVirement' => $this->baseDefinition('int',false,false,false,false),
//			'idEcheance' => $this->baseDefinition('int',false,false,false,false),
//			'estVentile' => $this->baseDefinition('tinyint',false,false,false,false),
//			'onArchive' => $this->baseDefinition('tinyint',false,false,false,false,'estRapproche')
//		);
//		return  $baseDefinition;
//	}

	// public function getInputDefinition($args) {
	// 	switch ($args['champClasse']) {
	// 		case 'montant': 
	// 			return array(
	// 				'label' => 'Montant',
	// 				'typeChamp' => 'montant',
	// 				'nameChamp' => isset($args['nameChamp']) ? $args['nameChamp'] : $args['champClasse'],
	// 				'valeurChamp' => $this->getValeur($args['champClasse']),
	// 				'controle' => 'float',
	// 			);
	// 			break;
	// 		case 'date': 
	// 			return array(
	// 				'label' => 'Date',
	// 				'typeChamp' => 'date',
	// 				'nameChamp' => isset($args['nameChamp']) ? $args['nameChamp'] : $args['champClasse'],
	// 				'valeurChamp' => $this->getValeur($args['champClasse']),
	// 			);
	// 			break;
	// 		case 'estRapproche': 
	// 			return array(
	// 				'label' => 'Pointé',
	// 				'typeChamp' => 'checkbox',
	// 				'nameChamp' => isset($args['nameChamp']) ? $args['nameChamp'] : $args['champClasse'],
	// 				'valeurChamp' => $this->getValeur($args['champClasse']),
	// 			);
	// 			break;
	// 		default:
	// 			return null;
	// 			break;
	// 	}
	// }

	// public function fnForm_Input($args) {
	// 	return fnOperation_FormDefinition(array('objet' => $this, 'champClasse' => $args['champClasse']));
	// }

	// public function getListeObjet($args = null) {
	// 	$maConnexion = $this->getConnexion();

	// 	$requete = "SELECT idOperation
	// 	FROM " . $this->nomTable . "
	// 	WHERE
	// 		idCompte = '" . $args['idCompte'] ."'";

	// 	switch ($args['filtreAffiche']) {
	// 		case 'rapprochees':
	// 			$requete = $requete  . " AND onArchive = '1'";
	// 			break;
	// 		case 'nonRapprochees':
	// 			$requete = $requete . " AND onArchive is null";
	// 			break;
	// 		default:
	// 			$requete = $requete;
	// 			break;
	// 	}

	// 	$requete = $requete . " ORDER BY date DESC";

	// 	$requete = $maConnexion->query($requete);
	// 	$tableID = $requete->fetchAll();
	// 	$tableObjet = null;
	// 	foreach ($tableID as $id) {
	// 		$tableObjet[] = new Operation(array('idObjet'=>$id['idOperation']));
	// 	}
	// 	return $tableObjet;
	// }
}

