<?php
function fnBanque_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_banques",
    'nomID' => "idBanque",
    'suiviModification' => true,
    );
}

function fnBanque_classeParametreDefinition($objet) {
    $listeParametreObjet['idBanque'] =  array('baseNomChamp' => 'idBanque',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'formLabel' => null,
        'formTypeChamp' => 'hidden',
        'formNameChamp' => 'idBanque',
        'formValeurChamp' => $objet->get_Valeur('idBanque'),
        'formControl' => 'entier',
    );
    $listeParametreObjet['[_Societe_]'] =  array('baseClasseParent' => true,
        'baseClasseParentRecopieChampParentTableCours' => true,
    );
    $listeParametreObjet['codeBanque'] =  array('baseNomChamp' => 'codeBanque',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Code Banque",
        'formTypeChamp' => 'entier',
        'formNameChamp' => 'codeBanque',
        'formValeurChamp' => $objet->get_Valeur('codeBanque'),
        'formControl' => null,
    );
    $listeParametreObjet['codeGuichet'] =  array('baseNomChamp' => 'codeGuichet',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Code Guichet",
        'formTypeChamp' => 'entier',
        'formNameChamp' => 'codeGuichet',
        'formValeurChamp' => $objet->get_Valeur('codeGuichet'),
        'formControl' => null,
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