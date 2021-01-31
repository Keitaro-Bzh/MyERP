<?php
/* On va récupérer nos listes d'objets pour les afficher dans les tableaux correspondants
*/
$monPret = new Pret();
$listePret = $monPret->getListeObjet(array('filtre' => 'date'));

if ($listePret)  {
	foreach ($listePret as $pret) {
		$monEcheance =new Echeance();
		$echeanceTrouve = false;
		foreach ($pret->getValeur('PretEcheancier') as $pretEcheance) {
			if (!$echeanceTrouve) {
				if ($pretEcheance->getValeur('dateEcheance') >= date('Y-m-d')) {
					$echeanceTrouve = true;
					$monEcheance->setValeur('typeMouvement','Pret');
					$monEcheance->setValeur('description',$pret->getValeur('libelle'));
					$monEcheance->setValeur('dateDebut',$pretEcheance->getValeur('dateEcheance'));
					$monEcheance->setValeur('montant',$pretEcheance->getValeur('montantEcheance'));
				}
			}
		}
		$tabEcheancePret[] = $monEcheance;
	}
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/_plugins/myFichiers/class/Contrat.php';
$monContrat = new Contrat();
$listeContrat = $monContrat->getListeObjet();

if ($listeContrat) {
	foreach ($listeContrat as $contrat) {
		$monEcheance =new Echeance();
		$echeanceTrouve = false;
		foreach ($pret->getValeur('PretEcheancier') as $pretEcheance) {
			if (!$echeanceTrouve) {
				if ($pretEcheance->getValeur('dateEcheance') >= date('Y-m-d')) {
					$echeanceTrouve = true;
					//$monEcheance->setValeur('typeMouvement','Pret');
					//$monEcheance->setValeur('description',$pret->getValeur('libelle'));
					//$monEcheance->setValeur('dateDebut',$pretEcheance->getValeur('dateEcheance'));
					//$monEcheance->setValeur('montant',$pretEcheance->getValeur('montantEcheance'));
				}
			}
		}
		$tabEcheanceContrat[] = $monEcheance;
	}
}
else {
	$tabEcheanceContrat = null;
}


/* Définitions générales du plugin et de la rubrique
 * -----------------------------------------------------
 */
$nomPlugin = 'myCompta';
$chargeListe = true;
$nomClasse = 'Echeance';


/* Définitions générales sur l'affichage de la rubrique
 * -> Les pages peuvent être 'null' et affiche une page pré-défini
 * -> il ne faut pas renseigner l'extension php au nom de la page
 * ----------------------------------------------------
 */
$nomPageTableauBord = 'echeancesTableauBord';
$nomPageAffiche = 'echeancesFormulaire';
$nomPageFormulaire = 'echeancesFormulaire';
$menuGauche = null;

// Définition des variables pour le tableau
$titrePage = 'Gestion des prêts bancaires';

/* Définitions générales sur l'affichage des options
 * ----------------------------------------------------
 */
$champsRecherche = true;
$afficheOption = true;


/* On va vérifier en permanence que les droits attribués sont correct
 * ---------------------------------------------------
 */
if ($_SESSION[$nomPlugin] >= 1) {
	// On fait appel à la page générique du framework qui va gérer l'affichage et l'enregistrement des objets (Peut être une page spécifique)
	include_once $_SERVER['DOCUMENT_ROOT'] . '/_frameworks/myFramework/viewModels/myERP.php';
}
else {
	// Pas de droit donc suspicion de tentative de hack
	include_once $_SERVER['DOCUMENT_ROOT'] . '/_templates/' . $_SESSION['template'] . '/views/viewPage_Interdit.php';
}
