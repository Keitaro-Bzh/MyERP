<?php
function fnConfigMyCompta_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_configMyCompta",
    'nomID' => "idConfigMyCompta",
    'suiviModification' => true,
    );
}

function fnConfigMyCompta_classeParametreDefinition($objet) {
    $listeParametreObjet['idConfigMyCompta'] =  array('baseNomChamp' => 'idConfigMyCompta',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['referentielGlobal'] =  array('baseNomChamp' => 'referentielGlobal',
    'baseTypeChamp' => 'int',
    'basePrimaryKey' => false,
    'baseAutoIncrement' => false,
    'baseNotNull' => false,
    'baseUnique' => false,
    'baseIndex' => false,
    'baseAncienNom' => null,
    'formLabel' => "Référentiel dédié",
    'formTypeChamp' => 'radio',
    'formOptionValues' => fnConfigMyCompta_FormSelectOptions('referentielGlobal'),
    'formNameChamp' => 'referentielGlobal',
    'formValeurChamp' => $objet->get_Valeur('referentielGlobal'),
);
    return $listeParametreObjet;
}

function fnConfigMyCompta_FormSelectOptions ($champ) {
    switch ($champ) {
        case 'referentielGlobal':
            $tableauRetour[] = array('value' => '0', 'valueAffiche' => 'Non');
            $tableauRetour[] = array('value' => '1', 'valueAffiche' => 'Oui');
        break;
    }
    return $tableauRetour;
}