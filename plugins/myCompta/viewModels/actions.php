
<?php
/* Définitions générales du plugin et de la rubrique
 * -----------------------------------------------------
 */
$nomClasse = 'ActionMouvement'; 
$chargeListe = false;

/* Définitions générales sur l'affichage de la rubrique
 * -> Le tableau de bord peut être 'null' et affiche une page pré-définie
 * -> il faut renseigner l'extension php au nom de la page
 * -> Le chemin est obligatoire dans le dossier views du plugins
 * ----------------------------------------------------
 */
$tableauBordClasse = 'viewHome_Actions.php';
$titrePage = 'GESTION DES ACTIONS';
$sousTitrePage = null;
$champsRecherche = false;
$afficheOption = false; 

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetDetail = 'viewAffiche_Action.php';
$titrePageDetailObjet = null;

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetFormulaire = 'viewForm_Action.php';
$titrePageFormObjet = null;


/* Script spécifique VM */
if (isset($_GET['action']) && (strcmp($_GET['rubrique'],'Action') === 0 && strcmp($_GET['action'],'simulation') === 0)) {
    $bypassRoutage = true;
    $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/views/viewForm_ActionSimulation.php';
}
if (isset($_GET['action']) && (strcmp($_GET['rubrique'],'Action') === 0 && strcmp($_GET['action'],'afficheCompte') === 0)) {
    $bypassRoutage = true;
    $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/views/viewAffiche_ActionCompteDetails.php';
}