<?php
function fnSociete_classeBaseDefinition() {
    return array(
        'nomTable' => "my_societes",
        'nomID' => "idSociete",
        'suiviModification' => true,
        );
}

function fnSociete_classeParametreDefinition($objet) {
    $listeParametreObjet['idSociete'] =  array('baseNomChamp' => 'idSociete',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'baseRecopieEnfant' => false,
    );
    $listeParametreObjet['statut'] =  array('baseNomChamp' => 'statut',
        'baseTypeChamp' => 'varchar(5)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Statut',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnSociete_FormSelectOptions('statut'),
        'formDivChamp' => null,
        'formNameChamp' => 'statut',
        'formValeurChamp' => $objet->get_Valeur('statut'),
        'formControl' => null,
        'formRequired' => false,
    );
    $listeParametreObjet['nom'] =  array('baseNomChamp' => 'nom',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'formLabel' => 'Nom',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'nom',
        'formValeurChamp' => $objet->get_Valeur('nom'),
        'formControl' => 'null',
        'formRequired' => true,
        'tableAfficheOn' => true,
        'tableEnTete' => "Nom Société",
        'tableValeur' => $objet->get_Valeur('nom'),
    );
    $listeParametreObjet['enseigne'] =  array('baseNomChamp' => 'enseigne',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Enseigne/Groupe',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'enseigne',
        'formValeurChamp' => $objet->get_Valeur('enseigne'),
        'formControl' => null,
        'formRequired' => false,
        'tableAfficheOn' => true,
        'tableEnTete' => "Enseigne/Groupe",
        'tableValeur' => $objet->get_Valeur('enseigne'),
    );
    $listeParametreObjet['url'] =  array('baseNomChamp' => 'url',
        'baseTypeChamp' => 'varchar(255)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Site Internet',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'url',
        'formValeurChamp' => $objet->get_Valeur('url'),
        'formControl' => 'url',
        'formRequired' => false,
    );
    $listeParametreObjet['telephone'] =  array('baseNomChamp' => 'telephone',
        'baseTypeChamp' => 'varchar(10)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Téléphone',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'telephone',
        'formValeurChamp' => $objet->get_Valeur('telephone'),
        'formControl' => 'tel',
        'formRequired' => false,
    );
    $listeParametreObjet['fax'] =  array('baseNomChamp' => 'fax',
        'baseTypeChamp' => 'varchar(10)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Fax',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'fax',
        'formValeurChamp' => $objet->get_Valeur('fax'),
        'formControl' => 'tel',
        'formRequired' => false,
    );
    $listeParametreObjet['email'] =  array('baseNomChamp' => 'email',
        'baseTypeChamp' => 'varchar(255)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Email',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'email',
        'formValeurChamp' => $objet->get_Valeur('email'),
        'formControl' => 'email',
        'formRequired' => false,
    );
    return $listeParametreObjet;
}

function fnSociete_FormSelectOptions ($champ) {
    switch ($champ) {
        case 'statut':
            $tableauRetour[] = array('value' => 'EI', 'valueAffiche' => 'EI');
            $tableauRetour[] = array('value' => 'EURL', 'valueAffiche' => 'EURL');
            $tableauRetour[] = array('value' => 'SARL', 'valueAffiche' => 'SARL');
            $tableauRetour[] = array('value' => 'SASU', 'valueAffiche' => 'SASU');
            $tableauRetour[] = array('value' => 'SAS', 'valueAffiche' => 'SAS');
            $tableauRetour[] = array('value' => 'SA', 'valueAffiche' => 'SA');
        break;
    }

    return $tableauRetour;
}
