<?php

/* ---------------------------------------------------------------------------------------------------------------------
 * ---------------------------------------------------------------------------------------------------------------------
 *		FONCTIONS SPECIFIQUES A L'ECHANGE DE DONNEES AVEC LA BASE DE DONNEES
 * ---------------------------------------------------------------------------------------------------------------------
 * --------------------------------------------------------------------------------------------------------------------- */

function fnBDD_setObjetToBaseFromPOST ($monObjet,$POST,$FILE = null) {
	$monObjet->set_FormPostToObjet($POST,isset($FILE) ? $FILE : null);
    return $monObjet->set_ObjetToBase();
}

// Manupilation des checkbox
function fnBDD_formToBaseCheckBox($valeur = null) {
	if (($valeur) AND ($valeur === 'on'))
		return 1;
		else
			return null;
}
// Manupilation des Int
function fnBDD_formToBaseInt($valeur = null) {
	if (($valeur) AND ($valeur != ''))
		return $valeur;
	else
	return null;
}
// On met un . pour les doubles
function fnBDD_formToBaseDouble($valeur = null) {
	if ($valeur){
		return number_format($valeur, 2,'.','');
	}
	else {
		return null;
	}
}