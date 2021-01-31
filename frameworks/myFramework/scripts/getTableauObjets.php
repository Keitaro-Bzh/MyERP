<?php
/* ---------------------------------------------------------------------------------
 * ---------------------------------------------------------------------------------
 	Objectif:
 	---------
 	Le but de ce fichier est de traiter toutes les fonctions qui seront potentiellement
 	accessible depuis notre site. Chaque fonction sera présenté dans le descriptif ci-dessous
 	avec la procédure pour l'utiliser
 	Il est possible de rajouter une fonction spécifique, mais il faut le faire directement
 	dans un fichier à mettre dans le dossier fonctions du plugin.
 	Les fichiers annexes seront inclus dans ce fichier qui sera le seul a être déclaré
 	dans notre index.php afin d'en faciliter la gestion et des scinder les fonctions
 	par type. Pour chaque fichier joint, une liste de fonctions présentes dans ce fichier
 	sera faite.
 	
 
 */

// Préparation de nos variables en fonction de la source de la demande
if (isset($_POST['source']) AND $_POST['source'] === 'AJAX'){
	session_start();
	
	include_once ($_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/fonctions/_myERP.php');
	
	$nomPlugin = $_POST['plugin'];
	$nomClasse = $_POST['classe'];
	
	// Nous sommes dans une requète ajax, donc on charge toujours le tableau d'objets
	$chargeListe = true;
	$afficheOption = isset($_POST['afficheOption']) ? true : false;
}

$lienPlugin = ($nomPlugin !== null ? $nomPlugin : 'parametres');
$cheminPlugin = $nomPlugin ? '/plugins/' . $nomPlugin: '/main';
$niveauAcces =  $nomPlugin? $_SESSION[$nomPlugin]: $_SESSION['niveauAccesGeneral'];
$nbObjetAffiche = (isset($_POST['nbObjetAffiche']) ? $_POST['nbObjetAffiche'] : '100');

// On va construire notre URL d'ajout si celle-ci n'est pas passé en paramètre

if (isset($urlBase)) {
	$monLien = $urlBase;
	$urlAjout = $urlBase . '&action=ajout';
}
else {
	$monLien = 'index.php?module=' . $lienPlugin. '&rubrique=' . $nomClasse;
	$urlAjout = 'index.php?module=' . $lienPlugin . '&rubrique=' . $nomClasse . '&action=ajout';
}


// On va préparer notre classe
require_once $_SERVER['DOCUMENT_ROOT']. $cheminPlugin . '/class/' . $nomClasse. '.php';
$monObjet = new $nomClasse;


// Récupération de notre liste d'objets
$argsListeObjet = array(
		'classe' => $nomClasse,
		'nomTable' => $monObjet->getValeur('nomTable'),
		'nomID' => $monObjet->getValeur('nomID'),
		'afficheArchive' => (isset($_POST['afficheArchive']) && $_POST['afficheArchive']? $_POST['afficheArchive'] : '1'),
		'nbObjetAffiche' => $nbObjetAffiche,
		'pageAffiche' => (isset($_POST['pageAffiche']) ? $_POST['pageAffiche'] : '1'),
		'valeurRecherche' => (isset($_POST['valeurRecherche']) && $_POST['valeurRecherche'] !== "" ? $_POST['valeurRecherche'] : null),
		'cleRecherche' => (isset($_POST['cleRecherche']) ? $_POST['cleRecherche'] : null),
		'champTri' => (isset($_POST['champTri']) ? $_POST['champTri'] : null),
		'ordreTri' => (isset($_POST['ordreTri']) ? $_POST['ordreTri'] : null),
		'specifiqueClasse' => (isset($specifiqueClasse) ? $specifiqueClasse : null)
);

// On va récupérer notre liste d'objets
if (isset($chargeListe) && $chargeListe) {
	$listeObjets = $monObjet->getListeObjet($argsListeObjet);

	// On va calculer le nombre de page à afficher en fonction du résultat
	if ($listeObjets) {
		$nbPage = getNombrePage($monObjet->getNombreObjet($argsListeObjet), $argsListeObjet['nbObjetAffiche']);
	}
	else {
		$nbPage = 0;
	}
}
else {
	$listeObjets = null;
	$nbPage = 0;
}

// On complète le tableau des arguments pour l'obtention de la liste des objets pour l'affiche du nombre de page
$argsListeObjet['nbPageListeStop'] = $nbPage;

// On va trier le tableau si une rupture existe

// Nous allons constituer notre tableau de variables
$argsTableau = array(
		'niveauAcces' => $niveauAcces,
		'enTete' => $monObjet->getTableEnTeteDefinition(),
		'donnees' => (isset($tableauRupture) ? triRupture($tableauRupture,$champTri,$listeObjets) : $listeObjets),
		'options' => (!$afficheOption ? null : array (
				'idObjet' => $monObjet->getValeur('nomID'),
				'type' => $monObjet->getDroits($nomPlugin),
				'lien' => $monLien
		)),
		'nbPage' => ($listeObjets? getNombrePage($monObjet->getNombreObjet($argsListeObjet), $nbObjetAffiche) : '0'),
		'niveauDroitAjout' => getNiveauDroit($monObjet->getDroits($nomPlugin)['droits'],'ajout'),
		'urlAjout' => $urlAjout,
		'optionFiltre' => $argsListeObjet,
		'rupture' => (isset($tableauRupture) ? $tableauRupture : null)
);

// On ne demande la construction du tableau que s'il s'agit d'une requète AJAX
// Sinon, la demande de construction se fait dans le fichier views/_defaultHomeListe.php 
if (isset($_POST['source']) AND $_POST['source'] === 'AJAX'){
	creationTableau($argsTableau);
}
