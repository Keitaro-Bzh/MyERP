<?php
function fnTitulaire_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_titulaires",
    'nomID' => "idTitulaire",
    'suiviModification' => true,
    );
}

function fnTitulaire_classeParametreDefinition($objet) {
    $listeParametreObjet['idTitulaire'] =  array('baseNomChamp' => 'idTitulaire',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['[_Personne_]'] =  array('baseClasseParent' => true,
        'baseClasseParentRecopieChampParentTableCours' => false,
    );
    $listeParametreObjet['onArchive'] =  array('baseNomChamp' => 'onArchive',
        'baseTypeChamp' => 'tinyint',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Archivé',
        'formTypeChamp' => 'checkbox',
        'formNameChamp' => 'onArchive',
        'formValeurChamp' => $objet->get_Valeur('onArchive'),
        'formControl' => null,
    );
    return $listeParametreObjet;
}