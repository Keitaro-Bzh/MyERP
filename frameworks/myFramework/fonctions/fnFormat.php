<?php 
function supprimeCarSpec ($valeurSource) {
	$caracteresSpeciaux = array('Œ' => ' ', 'œ' => ' ',	'$' => ' ', '-' => ' ', '_' => ' ', '@' => ' ', '€' => ' ', 'µ' => ' ', '\'' => ' ');
	$valeurSource = strtr(strtolower($valeurSource), $caracteresSpeciaux);
	return $valeurSource;
}
function supprimeAccent ($valeurSource) {
	$accents = array('à' => 'a', 'á' => 'a', 'â' => 'a', 'ä' => 'a',
			'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
			'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
			'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'ö' => 'o',
			'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u');
	$valeurSource = strtr(strtolower($valeurSource), $accents);
	return $valeurSource;
}