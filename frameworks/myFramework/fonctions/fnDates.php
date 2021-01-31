<?php 
function comparaisonDate($dateDebut,$dateFin,$format) {
	$dateDebut= DateTime::createFromFormat($format,$dateDebut);
	$dateFin= DateTime::createFromFormat($format,$dateFin);
	
	$interval = $dateDebut->diff($dateFin);

	/* On va analyser nos dates pour en renvoyer des informations
	 * pouvant être utiliser de manière différente.
	 * Le retour se fera sous forme de tableau:
	 * array(
	 *    'ordreChrono' => 'val' (1/0/-1 ou cela représente date 1 < date 2 ; 0 les dates sont identiques; -1  date 1 > date 2),
	 *    'nbJourEcart' => '',
	 *    'nbMoisEcart' => '',
	 *    'nbAnneeEcart' => '',
	 *    'nbHeureEcart' => '',
	 *    'nbMinuteEcart' => '',
	 *    'nbSecondeEcart' => '',
	 * )
	 */
	// On va comparer nos deux dates pour déterminer
	if ($dateDebut === $dateFin) {
		$date['ordreChrono'] = 0;
		$date['nbJourEcart'] = 0;
		$date['nbMoisEcart'] = 0;
		$date['nbAnneeEcart'] = 0;
		$date['nbHeureEcart'] = 0;
		$date['nbMinuteEcart'] = 0;
		$date['nbSecondeEcart'] = 0;
	}
	else {
		if ($dateDebut < $dateFin) { $date['ordreChrono'] = 1; }
		if ($dateDebut > $dateFin) { $date['ordreChrono'] = -1; }
		
		$date['nbJourEcart'] = $interval->format('%d');
		
		// On va calculer l'ecart en mois de manière approximative
		if ($interval->format('%d') < '30') {
			$date['nbMoisEcart'] = 0;
		}
		elseif ($interval->format('%d') < '32') {
			$date['nbMoisEcart'] = 1;
		}
		elseif ($interval->format('%d') < '63') {
			$date['nbMoisEcart'] = 2;
		}
		elseif ($interval->format('%d') < '94') {
			$date['nbMoisEcart'] = 3;
		}
	}

	return $date;
}

function baseToFormDate($valeur = null) {
	if ($valeur) {
		return date("d-m-Y", strtotime($valeur));
	}
	else {
		return null;
	}
}