<?php
function fnFichier_classeBaseDefinition() {
    return array(
    'nomTable' => "my_fichiers",
    'nomID' => "idFichier",
    'suiviModification' => true,
    );
}

function fnFichier_classeParametreDefinition($objet) {
    $listeParametreObjet['idFichier'] =  array('baseNomChamp' => 'idFichier',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['date'] =  array('baseNomChamp' => 'date',
        'baseTypeChamp' => 'date',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['type'] =  array('baseNomChamp' => 'type',
        'baseTypeChamp' => 'varchar(30)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['nomFichier'] =  array('baseNomChamp' => 'nomFichier',
        'baseTypeChamp' => 'varchar(255)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['chemin'] =  array('baseNomChamp' => 'chemin',
        'baseTypeChamp' => 'varchar(255)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
    );
    return $listeParametreObjet;
}