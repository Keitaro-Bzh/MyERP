<?php
function fnClient_classeBaseDefinition() {
    return array(
    'nomTable' => "myecommerce_clients",
    'nomID' => "idClient",
    'suiviModification' => true,
    );
}

function fnClient_classeParametreDefinition($objet) {
    $listeParametreObjet['[_User_]'] =  array('baseClasseParent' => true,
        'baseClasseParentLienChamp' => 'idUser',
        'baseClasseParentRecopieChampParentTableCours' => false,
    );
    $listeParametreObjet['idClient'] =  array('baseNomChamp' => 'idClient',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null
    );
    return $listeParametreObjet;
}