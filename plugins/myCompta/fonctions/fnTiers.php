<?php
function fnTiers_getListTiersMEF() {
    $monTiers = new Tiers;
    $baseTiersList = $monTiers->get_ObjetListFromBase();
    $listeTiersMEF = array();
    if ($baseTiersList) {
        foreach ($baseTiersList as $tiersLigne) {
            if($tiersLigne->get_Valeur('Banque')) {
                $listeTiersMEF[] = array('idTiers' => $tiersLigne->get_Valeur('idTiers'),
                'type' => 'Banque',
                'nom' => $tiersLigne->get_ValeurClasse('Banque','nom'));
            }
            if($tiersLigne->get_Valeur('Titulaire')) {
                $listeTiersMEF[] = array('idTiers' => $tiersLigne->get_Valeur('idTiers'),
                'type' => 'Titulaire',
                'nom' => $tiersLigne->get_ValeurClasse('Titulaire','nom') . ' ' . $tiersLigne->get_ValeurClasse('Titulaire','prenom'));
            }
            if($tiersLigne->get_Valeur('Societe')) {
                $listeTiersMEF[] = array('idTiers' => $tiersLigne->get_Valeur('idTiers'),
                'type' => 'Tiers',
                'nom' => $tiersLigne->get_ValeurClasse('Societe','nom'));
            }
            if($tiersLigne->get_Valeur('Personne')) {
                $listeTiersMEF[] = array('idTiers' => $tiersLigne->get_Valeur('idTiers'),
                'type' => 'Tiers',
                'nom' => $tiersLigne->get_ValeurClasse('Personne','nom') . ' ' . $tiersLigne->get_ValeurClasse('Personne','prenom'));
            }
        }
    }
    return $listeTiersMEF;
}
