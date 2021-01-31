<?php
/* Définitions générales du plugin et de la rubrique
 * -----------------------------------------------------
 */
$nomPlugin = 'myCompta';
$chargeListe = true;
$nomClasse = 'Pret';


/* Définitions générales sur l'affichage de la rubrique
 * -> Les pages peuvent être 'null' et affiche une page pré-défini
 * -> il ne faut pas renseigner l'extension php au nom de la page
 * ----------------------------------------------------
 */
$nomPageTableauBord = null;
$nomPageAffiche = 'pretAffiche';
$nomPageFormulaire = 'pretFormulaire';
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
