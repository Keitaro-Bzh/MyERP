
<?php
/* Définitions générales du plugin et de la rubrique
 * -----------------------------------------------------
 */
$nomClasse = 'Operation'; 
$chargeListe = true;

/* Définitions générales sur l'affichage de la rubrique
 * -> Le tableau de bord peut être 'null' et affiche une page pré-définie
 * -> il faut renseigner l'extension php au nom de la page
 * -> Le chemin est obligatoire dans le dossier views du plugins
 * ----------------------------------------------------
 */
$tableauBordClasse = 'viewForm_Operation.php';
$titrePage = 'GESTION DES OPERATIONS';
$sousTitrePage = null;
$champsRecherche = false;
$afficheOption = false; 

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetDetail = null;
$titrePageDetailObjet = null;

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetFormulaire = null;
$titrePageFormObjet = null;