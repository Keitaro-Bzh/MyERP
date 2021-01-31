<?php

function fnAction_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_actions",
    'nomID' => "idAction",
    'suiviModification' => true,
    );
}

function fnAction_classeParametreDefinition($objet) {		
    $listeParametreObjet['idAction'] =  array('baseNomChamp' => 'idAction',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['__Compte__'] =  array('baseClasseLien' => true,
        'baseClasseLienUnique' => '1<>1',
        'baseClasseLienSourceObjet' => get_class($this),
        'baseClasseLienSourceObjetNomChamp' => 'idAction',
        'baseClasseLienDestObjet' => 'Compte',
        'baseClasseLienDestObjetID' => 'idCompte',
        'formLabel' => "Compte",
        'formTypeChamp' => 'select',
        'formDivChamp' => 'Compte',
        'formNameChamp' => 'Compte',
        'formValeurChamp' => $objet->get_Valeur('Compte') ? (is_object($objet->get_Valeur('Compte')) ? $objet->get_ValeurClasse('Titulaire','idTitulaire') : $objet->get_Valeur('Titulaire')) : null,
        'formControl' => 'user',
    );
    $listeParametreObjet['valeur'] =  array('baseNomChamp' => 'valeur',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => true,
        'formLabel' => 'Action',
        'formTypeChamp' => 'text',
        'formNameChamp' => 'valeur',
        'formValeurChamp' => $objet->get_Valeur('valeur'),
        'formControl' => '',
    );
    return $listeParametreObjet;
}