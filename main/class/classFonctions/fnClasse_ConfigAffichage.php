<?php
function fnConfigAffichage_classeBaseDefinition() {
    return array(
    'nomTable' => "my_configAffichage",
    'nomID' => "id",
    'suiviModification' => false,
    );
}

function fnConfigAffichage_classeParametreDefinition($objet) {
    $listeParametreObjet['id'] =  array('baseNomChamp' => 'id',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
        'formLabel' => null,
        'formTypeChamp' => 'hidden',
        'formNameChamp' => 'id',
        'formValeurChamp' => $objet->get_Valeur('id'),
        'formControl' => 'entier',
    );
    $listeParametreObjet['titre'] =  array('baseNomChamp' => 'titre',
        'baseTypeChamp' => 'varchar(30)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Titre",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'titre',
        'formValeurChamp' => $objet->get_Valeur('titre'),
        'formControl' => null,
        'formRequired' => 'true',
    );
    $listeParametreObjet['sousTitre'] =  array('baseNomChamp' => 'sousTitre',
        'baseTypeChamp' => 'varchar(150)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Sous-titre",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'sousTitre',
        'formValeurChamp' => $objet->get_Valeur('sousTitre'),
        'formControl' => null,
        'formRequired' => 'true',
    );
    $listeParametreObjet['telContact'] =  array('baseNomChamp' => 'telContact',
        'baseTypeChamp' => 'varchar(10)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Téléphone contact",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'telContact',
        'formValeurChamp' => $objet->get_Valeur('telContact'),
        'formControl' => 'tel',
        'formRequired' => 'true',
    );
    $listeParametreObjet['mailContact'] =  array('baseNomChamp' => 'mailContact',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => 'email',
        'formLabel' => "Email contact",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'mailContact',
        'formValeurChamp' => $objet->get_Valeur('mailContact'),
        'formControl' => 'email',
        'formRequired' => 'true',
    );
    $listeParametreObjet['footer'] =  array('baseNomChamp' => 'footer',
        'baseTypeChamp' => 'varchar(255)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Libellé footer",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'footer',
        'formValeurChamp' => $objet->get_Valeur('footer'),
        'formControl' => null,
        'formRequired' => 'true',
    );
    $listeParametreObjet['onFrontend'] =  array('baseNomChamp' => 'onFrontend',
        'baseTypeChamp' => 'varchar(5)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Activer Front-end',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnConfigAffichage_FormSelectOptions('onFrontend'),
        'formNameChamp' => 'onFrontend',
        'formValeurChamp' => $objet->get_Valeur('onFrontend'),
        'formControl' => null,
    );
    $listeParametreObjet['onDebug'] =  array('baseNomChamp' => 'onDebug',
        'baseTypeChamp' => 'varchar(5)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Activer DEBUG',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnConfigAffichage_FormSelectOptions('onDebug'),
        'formNameChamp' => 'onDebug',
        'formValeurChamp' => $objet->get_Valeur('onDebug'),
        'formControl' => null,
    );
    $listeParametreObjet['onRefresh'] =  array('baseNomChamp' => 'onRefresh',
        'baseTypeChamp' => 'varchar(5)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Activer Refresh (F5)',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnConfigAffichage_FormSelectOptions('onRefresh'),
        'formNameChamp' => 'onRefresh',
        'formValeurChamp' => $objet->get_Valeur('onRefresh'),
        'formControl' => null,
    );
    return $listeParametreObjet;
}

function fnConfigAffichage_FormSelectOptions ($champ) {
    $tableauRetour = null;
    switch ($champ) {
        case 'onFrontend':
        case 'onDebug':
        case 'onRefresh':
            $tableauRetour[] = array('value' => '1', 'valueAffiche' => 'Oui');
            $tableauRetour[] = array('value' => 'NULL', 'valueAffiche' => 'Non', 'valueDefault' => true);
        break;
    }
    return $tableauRetour;
}