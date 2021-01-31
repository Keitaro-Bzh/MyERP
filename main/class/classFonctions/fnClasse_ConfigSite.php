<?php
function fnConfigSite_classeBaseDefinition() {
    return array(
    'nomTable' => "my_configSite",
    'nomID' => "id",
    'suiviModification' => false,
    );
}

function fnConfigSite_classeParametreDefinition($objet) {
    $listeParametreObjet['id'] =  array('baseNomChamp' => 'id',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'formLabel' => null,
        'formTypeChamp' => 'hidden',
        'formNameChamp' => 'id',
        'formValeurChamp' => $objet->get_Valeur('id'),
        'formControl' => 'entier',
    );
    $listeParametreObjet['onFrontend'] =  array('baseNomChamp' => 'onFrontend',
        'baseTypeChamp' => 'varchar(5)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Activer Front-end',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnConfigSite_FormSelectOptions('onFrontend'),
        'formNameChamp' => 'onFrontend',
        'formValeurChamp' => $objet->get_Valeur('onFrontend'),
        'formControl' => null,
    );
    $listeParametreObjet['onDebug'] =  array('baseNomChamp' => 'onDebug',
        'baseTypeChamp' => 'varchar(5)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Activer DEBUG',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnConfigSite_FormSelectOptions('onDebug'),
        'formNameChamp' => 'onDebug',
        'formValeurChamp' => $objet->get_Valeur('onDebug'),
        'formControl' => null,
    );
    $listeParametreObjet['onRefresh'] =  array('baseNomChamp' => 'onRefresh',
        'baseTypeChamp' => 'varchar(5)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Activer Refresh (F5)',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnConfigSite_FormSelectOptions('onRefresh'),
        'formNameChamp' => 'onRefresh',
        'formValeurChamp' => $objet->get_Valeur('onRefresh'),
        'formControl' => null,
    );
    return $listeParametreObjet;
}

function fnConfigSite_FormSelectOptions ($champ) {
    $tableauRetour = null;
    switch ($champ) {
        case 'onFrontend':
        case 'onDebug':
        case 'onRefresh':
            $tableauRetour[] = array('value' => '1', 'valueAffiche' => 'Oui');
            $tableauRetour[] = array('value' => 'NULL', 'valueAffiche' => 'Non', 'valueDefault' => true);
        break;
    }
    return $tableauRetour;
}