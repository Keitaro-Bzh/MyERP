<?php
function fnFamille_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_familles",
    'nomID' => "idFamille",
    'suiviModification' => true,
    );
}

function fnFamille_classeParametreDefinition($objet) {
    $listeParametreObjet['idFamille'] =  array('baseNomChamp' => 'idFamille',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'formLabel' => null,
        'formTypeChamp' => 'hidden',
        'formNameChamp' => 'idFamille',
        'formValeurChamp' => $objet->get_Valeur('idFamille'),
        'formControl' => 'entier',
    );
    $listeParametreObjet['nomFamille'] =  array('baseNomChamp' => 'nomFamille',
        'baseTypeChamp' => 'varchar(255)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Libellé Catégorie",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'nomFamille',
        'formValeurChamp' => $objet->get_Valeur('nomFamille'),
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