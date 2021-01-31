<?php
function fnMyClassLiens_classeBaseDefinition() {
    return array(
    'nomTable' => "my_classLiens",
    'nomID' => "idClassLiens",
    'suiviModification' => true,
    );
}

function fnMyClassLiens_classeParametreDefinition() {		
    $listeParametreObjet['idClassLiens'] =  array('baseNomChamp' => 'idClassLiens',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['classLienType'] =  array('baseNomChamp' => 'classLienType',
        'baseTypeChamp' => 'varchar(10)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['classLienSourceObjet'] =  array('baseNomChamp' => 'classLienSourceObjet',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['classLienSourceID'] =  array('baseNomChamp' => 'classLienSourceID',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['classLienDestObjet'] =  array('baseNomChamp' => 'classLienDestObjet',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['classLienDestID'] =  array('baseNomChamp' => 'classLienDestID',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['classLienUnique'] =  array('baseNomChamp' => 'classLienUnique',
        'baseTypeChamp' => 'varchar(1)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => 'classLienMandatory',
    );
    return $listeParametreObjet;
}