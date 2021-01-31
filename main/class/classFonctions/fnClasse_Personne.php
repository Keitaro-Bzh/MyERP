<?php
function fnPersonne_classeBaseDefinition() {
    return array(
        'nomTable' => "my_personnes",
        'nomID' => "idPersonne",
        'suiviModification' => true,
    );
}

function fnPersonne_classeParametreDefinition($objet) {
    $listeParametreObjet['idPersonne'] =  array('baseNomChamp' => 'idPersonne',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'baseRecopieEnfant' => false,
    );
    $listeParametreObjet['civilite'] =  array('baseNomChamp' => 'civilite',
        'baseTypeChamp' => 'varchar(3)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Civilité',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnPersonne_FormSelectOptions('civilite'),
        'formDivChamp' => null,
        'formNameChamp' => 'civilite',
        'formValeurChamp' => $objet->get_Valeur('civilite'),
        'formControl' => null,
        'formRequired' => true,
        'tableAfficheOn' => false,
        'tableEnTete' => false,
        'tableValeur' => false,
    );
    $listeParametreObjet['nom'] =  array('baseNomChamp' => 'nom',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
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
        'tableEnTete' => "Nom",
        'tableValeur' => $objet->get_Valeur('nom'),
    );
    $listeParametreObjet['nomJF'] =  array('baseNomChamp' => 'nomJF',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Nom naissance',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'nomJF',
        'formValeurChamp' => $objet->get_Valeur('nomJF'),
        'formControl' => 'nom',
        'formRequired' => false,
        'tableAfficheOn' => false,
        'tableEnTete' => null,
        'tableValeur' => null,
    );
    $listeParametreObjet['prenom'] =  array('baseNomChamp' => 'prenom',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Prénom',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'prenom',
        'formValeurChamp' => $objet->get_Valeur('prenom'),
        'formControl' => 'prenom',
        'formRequired' => false,
        'tableAfficheOn' => true,
        'tableEnTete' => "Prénom",
        'tableValeur' => $objet->get_Valeur('prenom'),
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
    $listeParametreObjet['mobile'] =  array('baseNomChamp' => 'mobile',
        'baseTypeChamp' => 'varchar(10)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Mobile',
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'mobile',
        'formValeurChamp' => $objet->get_Valeur('mobile'),
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
        'tableAfficheOn' => true,
        'tableEnTete' => "Email",
        'tableValeur' => $objet->get_Valeur('email'),
    );
    $listeParametreObjet['dateNaissance'] =  array('baseNomChamp' => 'dateNaissance',
        'baseTypeChamp' => 'date',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => 'Date de naissance',
        'formTypeChamp' => 'date',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'dateNaissance',
        'formValeurChamp' => $objet->get_Valeur('dateNaissance'),
        'formControl' => 'date',
        'formRequired' => false,
    );
    return $listeParametreObjet;
}

function fnPersonne_FormSelectOptions ($champ) {
    switch ($champ) {
        case 'civilite':
            $tableauRetour[] = array('value' => 'M', 'valueAffiche' => 'Monsieur');
            $tableauRetour[] = array('value' => 'MME', 'valueAffiche' => 'Madame');
        break;
    }

    return $tableauRetour;
}
