<?php
//On va définir le chemin d'accès de la page du tableau de bord avec l'extension
$tableauBordPlugin = '';
$titrePlugin = "MyCompta - Gestion simplifié de vos comptes bancaires";

/* La fonction ci-dessous va permettre de personnaliser l'affichage
dans la sidebar */
function myComptaGetMenuPersonnalisation() {
	$rubriques = array( 'titre' => 'FINANCES',
		'icone' => 'fa fa-euro');
	return $rubriques;
}

/* La fonction ci-dessous va définir les différentes rubriques (ou pages) de notre plugin
* Ceci est à personnaliser à chaque besoin de rajouter une page
*/
function myComptaGetListeRubrique() {
	$rubriques[] = array( 'nom' => 'Banque', 'page' => 'banques', 'masqueMenu' => true);
	$rubriques[] = array( 'nom' => 'Famille', 'page' => 'familles', 'masqueMenu' => true);
	$rubriques[] = array( 'nom' => 'Categorie', 'page' => 'categories', 'masqueMenu' => true);
	$rubriques[] = array( 'nom' => 'Compte', 'page' => 'comptes');
	$rubriques[] = array( 'nom' => 'Titulaire', 'page' => 'titulaire', 'masqueMenu' => true);
	$rubriques[] = array( 'nom' => 'Operation', 'page' => 'operation', 'masqueMenu' => true);
	$rubriques[] = array( 'nom' => 'Echeancier', 'page' => 'echeances');
	$rubriques[] = array( 'nom' => 'Prets', 'page' => 'prets');
	$rubriques[] = array( 'nom' => 'Virement', 'page' => 'virement', 'masqueMenu' => true);
	$rubriques[] = array( 'nom' => 'CompteAction', 'page' => 'actions', 'masqueMenu' => true);
	$rubriques[] = '__separateur__';
	$rubriques[] = array( 'nom' => 'Referentiels', 'page' => 'referentiel');
	$rubriques[] = array( 'nom' => 'Parametres', 'page' => 'parametres', 'masqueMenu' => true) ;
	return $rubriques;
}

/* Fonction à renseigner pour la création d'un plugin
* On va identifier le développeur, la version et le nom
* mais également si des besoins relationnels avec d'autres plugins sont nécessaires
*/
function myComptaGetDefinitionPlugin() {
	return array (
		'nomPlugin' => 'myCompta',
		'version' => '1.0',
		'versionBase' => '20200422',
		'developpeurs' => 'Cédric DESMARES',
		'description' => "Ce plugin a pour but de gérer vos comptes bancaires au quotidien et ainsi prévoir votre budget en fonction de vos crédits et échéances à venir",
		'relations' => null,
		);
} 
