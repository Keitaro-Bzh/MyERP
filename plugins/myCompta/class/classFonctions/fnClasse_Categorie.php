<?php
function fnCategorie_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_categories",
    'nomID' => "idCategorie",
    'suiviModification' => true
    );
}

function fnCategorie_classeParametreDefinition($objet) {
    $listeParametreObjet['idCategorie'] =  array('baseNomChamp' => 'idCategorie',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['__Famille__'] =  array('baseClasseParent' => true,
        'baseClasseParentLienChamp' => 'idFamille',
        'baseClasseParentRecopieChampParentTableCours' => false,
        'formLabel' => "Famille",
        'formTypeChamp' => 'select',
        'formDivChamp' => 'Famille',
        'formNameChamp' => 'Famille',
        'formValeurChamp' => $objet->get_Valeur('Famille') ? (is_object($objet->get_Valeur('Famille')) ? $objet->get_ValeurClasse('Famille','idFamille') : $objet->get_Valeur('Famille')) : null,
    );
    $listeParametreObjet['nomCategorie'] =  array('baseNomChamp' => 'nomCategorie',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Libellé Catégorie",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'nomCategorie',
        'formValeurChamp' => $objet->get_Valeur('nomCategorie'),
        'formControl' => null,
        'tableAfficheOn' => true,
        'tableEnTete' => 'Libellé',
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
