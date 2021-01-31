<?php
function fnTiers_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_tiers",
    'nomID' => "idTiers",
    'suiviModification' => true,
    );
}

function fnTiers_classeParametreDefinition($objet) {
    $listeParametreObjet['idTiers'] =  array('baseNomChamp' => 'idTiers',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['__Banque__'] =  array('baseClasseLien' => true,
        'baseClasseLienCorrespondance' => '1<>1',
        'baseClasseLienSourceObjet' => 'Banque',
        'baseClasseLienSourceObjetNomChamp' => 'Banque',
        'baseClasseLienDestObjet' => 'Banque',
        'baseClasseLienDestObjetID' => 'Banque',
    );
    $listeParametreObjet['__Titulaire__'] =  array('baseClasseLien' => true,
        'baseClasseLienCorrespondance' => '1<>1',
        'baseClasseLienSourceObjet' => 'Titulaire',
        'baseClasseLienSourceObjetNomChamp' => 'Titulaire',
        'baseClasseLienDestObjet' => 'Titulaire',
        'baseClasseLienDestObjetID' => 'Titulaire',
    );
    $listeParametreObjet['__Personne__'] =  array('baseClasseLien' => true,
        'baseClasseLienCorrespondance' => '1<>1',
        'baseClasseLienSourceObjet' => 'Personne',
        'baseClasseLienSourceObjetNomChamp' => 'Personne',
        'baseClasseLienDestObjet' => 'Personne',
        'baseClasseLienDestObjetID' => 'Personne',
    );
    $listeParametreObjet['__Societe__'] =  array('baseClasseLien' => true,
        'baseClasseLienCorrespondance' => '1<>1',
        'baseClasseLienSourceObjet' => 'Societe',
        'baseClasseLienSourceObjetNomChamp' => 'Societe',
        'baseClasseLienDestObjet' => 'Societe',
        'baseClasseLienDestObjetID' => 'Societe',
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