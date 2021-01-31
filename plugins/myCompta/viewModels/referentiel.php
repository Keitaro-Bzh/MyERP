<?php
// Paramétrage général
$nomClasse = null;

// Paramétrage Tableau de bord 
$tableauBordClasse = 'viewHome_Referentiel.php';
$titrePage = 'Paramétrage des référentiels';
$sousTitrePage = null;
$champsRecherche = false;
$afficheOption = false;
$chargeListe = false;

// Paramétrage de la page d'affichage de l'Objet
$nomObjetDetail = null;
$titrePageDetailObjet = null;

// Paramétrage de la page de formulaire de l'Objet
$nomObjetFormulaire = null;
$titrePageFormObjet = null;

// Gestion des scripts dans la page
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_referentiel.php';
$scriptPersoJSOnLoad = true;
//$pagePopup = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPopup_Generique.php';