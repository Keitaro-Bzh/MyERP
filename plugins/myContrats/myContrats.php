<?php
//On va définir le chemin d'accès de la page du tableau de bord avec l'extension
$tableauBordPlugin = '';

function myContratsGetMenuPersonnalisation() {
	$rubriques = array( 'titre' => 'CONTRATS',
		'icone' => 'fa fa-edit');
	return $rubriques;
}

/* La fonction ci-dessous va définir les différentes rubriques (ou pages) de notre plugin
* Ceci est à personnaliser à chaque besoin de rajouter une page
*/
function myContratsGetListeRubrique() {
	$rubriques[] = array( 'nom' => 'Contrat', 'page' => 'contrats');
	return $rubriques;
}

/* Fonction à renseigner pour la création d'un plugin
* On va identifier le développeur, la version et le nom
* mais également si des besoins relationnels avec d'autres plugins sont nécessaires
*/
function myContratsGetDefinitionPlugin() {
	return array (
		'nomPlugin' => 'myContrats',
		'version' => '1.0',
		'versionBase' => '20200416',
		'developpeurs' => 'Cédric DESMARES',
		'description' => "Le but de ce plugin est de gérer les contrats divers et variés",
		'relations' => "MyCompta (*) si l'on veut gérer les échéances dans le cadre d'abonnement par exemple"
		);
} 
