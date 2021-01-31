
<?php
/* Définitions générales du plugin et de la rubrique
 * -----------------------------------------------------
 */
$nomClasse = 'Compte'; 
$chargeListe = true;

/* Définitions générales sur l'affichage de la rubrique
 * -> Le tableau de bord peut être 'null' et affiche une page pré-définie
 * -> il faut renseigner l'extension php au nom de la page
 * -> Le chemin est obligatoire dans le dossier views du plugins
 * ----------------------------------------------------
 */
$tableauBordClasse = 'viewHome_Comptes.php';
$titrePage = 'GESTION DES COMPTES';
$sousTitrePage = null;
$champsRecherche = false;
$afficheOption = false; 

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetDetail = 'viewAffiche_Compte.php';
$titrePageDetailObjet = null;

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetFormulaire = null;
$titrePageFormObjet = null;