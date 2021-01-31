<?php
/* Définitions générales du plugin et de la rubrique
 * -----------------------------------------------------
 */
$nomClasse = 'Personne'; // Doit être identique à la rubrique sinon erreur 
$chargeListe = true; // Charger ou pas la liste des résultats à l'affiche de la homepage

/* Définitions générales sur l'affichage de la rubrique
 * -> Le tableau de bord peut être 'null' et affiche une page pré-définie
 * -> il faut renseigner l'extension php au nom de la page
 * -> Le chemin est obligatoire dans le dossier views du plugins
 * ----------------------------------------------------
 */
$tableauBordClasse = null;
$titrePage = 'GESTION DES PERSONNES';
$sousTitrePage = null;
$champsRecherche = true;  // Affiche ou pas la possibilité de faire une recherche dans le tableau
$afficheOption = false;  // Affiche les options d'affichage

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetDetail = null;
$titrePageDetailObjet = null;

/* Partie à paramétrer pour la gestion de l'affichage */
$nomObjetFormulaire = null; //'personneFormulaire.php';
$titrePageFormObjet = null;





