<?php
function fnUser_classeBaseDefinition() {
    return array(
    'nomTable' => "my_users",
    'nomID' => "idUser",
    'suiviModification' => true,
    );
}

function fnUser_classeParametreDefinition($objet) {
    $listeParametreObjet['idUser'] =  array('baseNomChamp' => 'idUser',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'formLabel' => null,
        'formTypeChamp' => 'hidden',
        'formNameChamp' => 'idUser',
        'formValeurChamp' => $objet->get_Valeur('idUser'),
        'formControl' => 'entier',
        'tableAfficheOn' => false,
        'tableEnTete' => 'idUser',
        'tableValeur' => $objet->get_Valeur('idUser'),
    );
    $listeParametreObjet['[_Personne_]'] =  array('baseClasseParentRecopieChampParentTableCours' => true,
    );
    $listeParametreObjet['username'] =  array('baseNomChamp' => 'username',
        'baseTypeChamp' => 'varchar(150)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'formLabel' => "Nom d'utilisateur",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'username',
        'formValeurChamp' => $objet->get_Valeur('username'),
        'formControl' => 'user',
        'tableAfficheOn' => true,
        'tableEnTete' => "Nom d'utilisateur",
        'tableValeur' => $objet->get_Valeur('username'),
    );
    $listeParametreObjet['password'] =  array('baseNomChamp' => 'password',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Mot de passe",
        'formTypeChamp' => 'password',
        'formNameChamp' => 'password',
        'formValeurChamp' => $objet->get_Valeur('password'),
        'formControl' => 'password',
        'tableAfficheOn' => false,
        'tableEnTete' => null,
        'tableValeur' => null,
    );
    $listeParametreObjet['__Avatar__'] =  array('baseClasseLien' => true,
        'baseClasseLienCorrespondance' => '1<>1',
        'baseClasseLienSourceObjet' => 'Avatar',
        'baseClasseLienSourceObjetNomChamp' => 'Avatar',
        'baseClasseLienDestObjet' => 'Fichier',
        'baseClasseLienDestObjetID' => 'idFichier',
        'formLabel' => "Avatar",
        'formTypeChamp' => 'imagePreview',
        'formNameChamp' => 'Avatar',
        'formValeurChamp' => $objet->get_AvatarChemin(),
        'formControl' => null
    );
    $listeParametreObjet['acces'] =  array('baseNomChamp' => 'acces',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Type d'accès",
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnUser_FormSelectOptions('acces'),
        'formDivChamp' => null,
        'formNameChamp' => "acces",
        'formValeurChamp' => $objet->get_Valeur('acces'),
        'formControl' => 'acces',
        'tableAfficheOn' => false,
        'tableEnTete' => null,
        'tableValeur' => null,
    );
    $listeParametreObjet['template'] =  array('baseNomChamp' => 'template',
        'baseTypeChamp' => 'varchar(30)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Template",
        'formTypeChamp' => 'select',
        'formOptionValues' => null,
        'formDivChamp' => 'Template',
        'formNameChamp' => 'template',
        'formValeurChamp' => $objet->get_Valeur('template'),
        'formControl' => null,
        'tableAfficheOn' => false,
        'tableEnTete' => null,
        'tableValeur' => null,
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
        'tableAfficheOn' => false,
        'tableEnTete' => null,
        'tableValeur' => null,
    );
    return $listeParametreObjet;
}

function fnUser_FormSelectOptions ($champ) {
    switch ($champ) {
        case 'acces':
            $tableauRetour[] = array('value' => '9', 'valueAffiche' => 'Administrateur global');
            $tableauRetour[] = array('value' => '1', 'valueAffiche' => 'Utilisateur standard');
        break;
        case 'template':
            $tableauRetour[] = array('value' => '9', 'valueAffiche' => 'Administrateur global');
            $tableauRetour[] = array('value' => '1', 'valueAffiche' => 'Utilisateur standard');
        break;
    }

    return $tableauRetour;
}