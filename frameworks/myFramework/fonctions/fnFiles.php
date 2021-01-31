<?php

/* Fonction qui va lister les dossiers
 * 
 */
function listeDossiers($args){
	switch ($args['dossier']) {
		case 'templates':
			$listeBrute = scandir($_SERVER['DOCUMENT_ROOT'] . '/templates/');
			$listeDossiers = filtreDossier($listeBrute);
			break;
		case 'plugins':
			$listeBrute = scandir($_SERVER['DOCUMENT_ROOT'] . '/plugins/');
			$listeDossiers = filtreDossier($listeBrute);
			break;
		case 'classe':
			$listeBrute = scandir($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $args['plugin'] . '/class/');
			$listeDossiers = filtreDossier($listeBrute);
			break;
		default:
			break;
	}
	return $listeDossiers;
}


function filtreDossier($listeBrute) {
	// boucler tant que quelque chose est trouve
	$listeFiltre = array(); 
	foreach ($listeBrute as $entree) { 
		// affiche le nom et le type si ce n'est pas un element du systeme
		if( $entree != '.' && $entree != '..' && $entree != '__exemple__') {
			$listeFiltre[] = $entree;
		}
	}
	return $listeFiltre;
}