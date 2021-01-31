<?php
//On va définir le chemin d'accès de la page du tableau de bord avec l'extension
$tableauBordPlugin = '';

function myECommerceGetMenuPersonnalisation() {
	$rubriques = array( 'titre' => 'eCOMMERCE',
		'icone' => 'fa fa-dollar');
	return $rubriques;
}

/* La fonction ci-dessous va définir les différentes rubriques (ou pages) de notre plugin
* Ceci est à personnaliser à chaque besoin de rajouter une page
*/
function myECommerceGetListeRubrique() {
    $rubriques[] = array( 'nom' => 'Mes articles', 'page' => 'contrats');
    $rubriques[] = array( 'nom' => 'Mes clients', 'page' => 'contrats');
    $rubriques[] = array( 'nom' => 'Mes commandes', 'page' => 'contrats');
    $rubriques[] = '__separateur__';
    $rubriques[] = array( 'nom' => 'Mon profil', 'page' => 'contrats');
    $rubriques[] = '__separateur__';
    $rubriques[] = array( 'nom' => 'Fournisseurs', 'page' => 'contrats');
    $rubriques[] = array( 'nom' => 'Référentiel', 'page' => 'contrats');
	return $rubriques;
}

/* Fonction à renseigner pour la création d'un plugin
* On va identifier le développeur, la version et le nom
* mais également si des besoins relationnels avec d'autres plugins sont nécessaires
*/
function myECommerceGetDefinitionPlugin() {
	return array (
		'nomPlugin' => 'myECommerce',
		'version' => '1.0',
		'versionBase' => '20200519',
		'developpeurs' => 'Cédric DESMARES',
		'description' => "Le but de ce plugin est de transformer notre applicance en eshop",
		'relations' => array('myContacts','myCompta')
		);
} 
