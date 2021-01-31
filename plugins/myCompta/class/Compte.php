<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_Compte.php';

class Compte extends MyERP
{
	// Définition des variables correspondant à notre table dans la base
	protected $idCompte;
	protected $libelleCompte;
	protected $typeCompte;
	protected $soldeInitial;
	protected $numeroCompte;
	protected $onArchive; 
	protected $Titulaire;
	protected $Banque;
	
	// public function getInputDefinition($args) {
	// 	switch ($args['champClasse']) {
	// 		case 'date': 
	// 			return array(
	// 				'label' => 'Date',
	// 				'typeChamp' => 'date',
	// 				'nameChamp' => isset($args['nameChamp']) ? $args['nameChamp'] : $args['champClasse'],
	// 				'valeurChamp' => $this->getValeur($args['champClasse']),
	// 			);
	// 		break;
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
	// /* ****************************************************
	//  * 		FONCTIONS SURCHARGEES
	//  * ****************************************************/
	 
	// /* ****************************************************
	//  * 		FONCTIONS SPECIFIQUES A LA CLASSE EN COURS
	//  * ****************************************************/
	// public function getEcheances($args = null) {
	// 	require_once $_SERVER['DOCUMENT_ROOT'] . '/_plugins/myCompta/class/Pret.php';
	// 	$soldeEcheance = 0;
	// 	$echeances = array();
	// 	$date = new DateTime();
		
	// 	// On va récupérer nos échéances à venir
	// 	$monPret = new Pret();
	// 	$listePret = $monPret->getListeObjet(array(
	// 		'filtre' => 'compte',
	// 		'valeur' => $this->idCompte
	// 	));
	// 	if ($listePret){	
	// 		foreach ($listePret as $pret){
	// 			foreach ($pret->getValeur('PretEcheancier') as $echeance) {
	// 				if ($echeance->getValeur('dateEcheance') >= $date->format('Y-m-01') && $echeance->getValeur('dateEcheance') <= $date->format('Y-m-t')) {
	// 					$myEcheance = array(
	// 						'objet' => $pret->getValeur('libelle'),
	// 						'dateEcheance' => $echeance->getValeur('dateEcheance'),
	// 						'type' => 'debit',
	// 						'montant' => $echeance->getValeur('montantEcheance')
	// 					);
	// 					$echeances[] = array_push($echeances, $echeance);
	// 					$soldeEcheance= $soldeEcheance - $echeance->getValeur('montantEcheance');
	// 				}
	// 			}
	// 		}
	// 	}
	// 	return array(
	// 		'solde' => $soldeEcheance,
	// 		'releves' => $echeances
	// 	);
	// }
	
	// // Nous allons créer une fonction pour récupérer le solde en cours d'un compte
	// public function getSolde() {
	// 	/* Nous allons commencer par récupérer le montant du solde
	// 	 * en ne tenant compte que des opérations rapprochés
	// 	 */
	// 	$requete = "SELECT montant,
	// 			type
	// 		FROM mycompta_operations
	// 		WHERE
	// 			onArchive = '1'
	// 		AND
	// 			idCompte = '" . $this->idCompte . "'
	// 		GROUP BY type";
	// 	$this->soldeCours = $this->soldeInitial;
	// 	$montantOperationCours = $this->myQuery($requete);
	// 	foreach ($montantOperationCours as $sommeOperation) {
	// 		switch ($sommeOperation['type']) {
	// 			case 'C':
	// 				$this->soldeCours = $this->soldeCours + $sommeOperation['montant'];
	// 				break;
	// 			case 'D':
	// 				$this->soldeCours = $this->soldeCours - $sommeOperation['montant'];
	// 				break;
	// 			default:
	// 				$this->soldeCours = $this->soldeCours;
	// 				break;
	// 		}
	// 	}
		
	// 	/* Nous allons ensuite récupérer le montant des opérations
	// 	 * non rapprochées
	// 	 */
	// 	$requete1 = "SELECT montant,
	// 			type,onArchive
	// 		FROM mycompta_operations
	// 		WHERE
	// 			onArchive is null
	// 		AND
	// 			idCompte = '" . $this->idCompte . "'
	// 		GROUP BY type";
	// 	$this->soldeNonRapproche = 0;
	// 	$montantOperationNR = $this->myQuery($requete1);
	// 	if ($montantOperationNR) {
	// 		foreach ($montantOperationNR as $sommeOperation) {
	// 			switch ($sommeOperation['type']) {
	// 				case 'C':
	// 					$this->soldeNonRapproche = $this->soldeNonRapproche + $sommeOperation['montant'];
	// 					break;
	// 				case 'D':
	// 					$this->soldeNonRapproche = $this->soldeNonRapproche - $sommeOperation['montant'];
	// 					break;
	// 				default:
	// 					$this->soldeNonRapproche = $this->soldeNonRapproche;
	// 					break;
	// 			}
	// 		}
	// 	}

	// 	// On va récupérer notre échéancier
	// 	$echeances = $this->getEcheances();
		
	// 	/* nous allons ensuite récupérer la liste des échéances à intégrer pour
	// 	 * ce compte
	// 	 */
	// 	return array(
	// 		'soldeRapproche' => number_format($this->soldeCours, 2),
	// 		'soldeReel' =>number_format((float)$this->soldeCours + (float)$this->soldeNonRapproche,2),
	// 		'soldeNonRapproche' => number_format($this->soldeNonRapproche, 2),
	// 		'soldeEcheance' => number_format($echeances['solde'], 2)
	// 	);
	// }

}

