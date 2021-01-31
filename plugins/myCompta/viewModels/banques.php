<?php
/* Définitions générales du plugin et de la rubrique
 * -----------------------------------------------------
 */
$nomClasse = 'Banque'; 
$chargeListe = false;

/* Définitions générales sur l'affichage de la rubrique
 * -> Le tableau de bord peut être 'null' et affiche une page pré-définie
 * -> il faut renseigner l'extension php au nom de la page
 * -> Le chemin est obligatoire dans le dossier views du plugins
 * ----------------------------------------------------
 */
$tableauBordClasse = 'viewForm_Banque.php';
$titrePage = 'GESTION DES ACTIONS';
$sousTitrePage = null;
$champsRecherche = false;
$afficheOption = false; 

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetDetail = 'viewForm_Banque.php';
$titrePageDetailObjet = null;

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetFormulaire = 'viewForm_Banque.php';
$titrePageFormObjet = null;
