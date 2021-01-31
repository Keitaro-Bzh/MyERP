<?php
/* Définitions générales du plugin et de la rubrique
 * -----------------------------------------------------
 */
$nomClasse = 'Categorie'; 
$chargeListe = false;

/* Définitions générales sur l'affichage de la rubrique
 * -> Le tableau de bord peut être 'null' et affiche une page pré-définie
 * -> il faut renseigner l'extension php au nom de la page
 * -> Le chemin est obligatoire dans le dossier views du plugins
 * ----------------------------------------------------
 */
$tableauBordClasse = 'viewForm_Categorie.php';
$titrePage = 'GESTION DES SOUS-CATEGORIES';
$sousTitrePage = null;
$champsRecherche = false;
$afficheOption = false; 

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetDetail = 'viewForm_Categorie.php';
$titrePageDetailObjet = null;

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetFormulaire = 'viewForm_Categorie.php';
$titrePageFormObjet = null;
