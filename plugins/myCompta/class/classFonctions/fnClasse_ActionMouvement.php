<?php

function fnActionMouvement_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_actionsMouvements",
    'nomID' => "idActionMouvement",
    'suiviModification' => true,
    );
}

function fnActionMouvement_classeParametreDefinition($objet) {		
    $listeParametreObjet['idActionMouvement'] =  array('baseNomChamp' => 'idActionMouvement',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['idAction'] =  array('baseNomChamp' => 'idAction',
    'baseTypeChamp' => 'int',
    'basePrimaryKey' => false,
    'baseAutoIncrement' => false,
    'baseNotNull' => true,
    'baseUnique' => false,
    'baseIndex' => true,
    'baseAncienNom' => null,
    'baseClasseParent' => true,
    'objetClasseParentChampInBaseParent' => true,
    'objetClasseParentLienID' => 'idAction'
);
    $listeParametreObjet['typeMouvement'] =  array('baseNomChamp' => 'typeMouvement',
        'baseTypeChamp' => 'varchar(1)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Type de mouvement',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnActionMouvement_FormSelectOptions('typeMouvement'), 
        'formNameChamp' => 'typeMouvement',
        'formValeurChamp' => $objet->get_Valeur('typeMouvement'),
        'formControl' => null,
    );
    $listeParametreObjet['typeReglement'] =  array('baseNomChamp' => 'typeReglement',
        'baseTypeChamp' => 'varchar(1)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Type réglement',
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnActionMouvement_FormSelectOptions('typeReglement'), 
        'formNameChamp' => 'typeReglement',
        'formValeurChamp' => $objet->get_Valeur('typeReglement'),
        'formControl' => null,
    );
    $listeParametreObjet['Compte'] =  array(//'baseNomChamp' => 'idCompte',
        // 'baseTypeChamp' => 'int',
        // 'basePrimaryKey' => false,
        // 'baseAutoIncrement' => false,
        // 'baseNotNull' => false,
        // 'baseUnique' => false,
        // 'baseAncienNom' => 'idCompte',
        // 'baseClasseLien' => true,
        // 'classeLienType' => '1<>1',
        // 'classeLienDefinition' => (array ('ciblePlugin' => 'myCompta',
        //         'cibleClasse' => 'Compte',
        //         'cibleChamp' => 'idCompte',
        //     )),
        'formLabel' => 'Compte',
        'formTypeChamp' => 'text',
        'formDivChamp' => 'Compte',
        'formNameChamp' => 'idCompte',
        'formValeurChamp' => '1',
        'formControl' => 'entier',
    );
    $listeParametreObjet['valeur'] =  array(//'baseNomChamp' => 'valeur',
        // 'baseTypeChamp' => 'varchar(100)',
        // 'basePrimaryKey' => false,
        // 'baseAutoIncrement' => false,
        // 'baseNotNull' => true,
        // 'baseUnique' => false,
        // 'baseAncienNom' => null,
        // 'baseIndex' => true,
        'formLabel' => 'Action',
        'formTypeChamp' => 'text',
        'formNameChamp' => 'valeur',
        'formValeurChamp' => $objet->get_Valeur('valeur'),
        'formControl' => '',
    );
    $listeParametreObjet['qte'] =  array('baseNomChamp' => 'qte',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Quantité',
        'formTypeChamp' => 'int',
        'formNameChamp' => 'qte',
        'formValeurChamp' => $objet->get_Valeur('qte'),
        'formControl' => 'entier',
    );
    $listeParametreObjet['prixAchat'] =  array('baseNomChamp' => 'prixAchat',
        'baseTypeChamp' => 'double',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => "Prix d'achat",
        'formTypeChamp' => 'monetaire',
        'formNameChamp' => 'prixAchat',
        'formValeurChamp' => $objet->get_Valeur('prixAchat'),
        'formControl' => 'decimal',
    );

    $listeParametreObjet['fraisAchat'] =  array('baseNomChamp' => 'fraisAchat',
        'baseTypeChamp' => 'double',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseAncienNom' => null,
        'baseIndex' => false,
        'formLabel' => 'Frais de courtage',
        'formTypeChamp' => 'monetaire',
        'formNameChamp' => 'fraisAchat',
        'formValeurChamp' => $objet->get_Valeur('fraisAchat'),
        'formControl' => 'decimal',
    );
    return $listeParametreObjet;
}

function fnActionMouvement_FormSelectOptions ($champ) {
    switch ($champ) {
        case 'typeMouvement':
            $tableauRetour[] = array('value' => 'A', 'valueAffiche' => 'Achat');
            $tableauRetour[] = array('value' => 'V', 'valueAffiche' => 'Vente');
        break;
        case 'typeReglement':
            $tableauRetour[] = array('value' => 'C', 'valueAffiche' => 'Comptant');
            $tableauRetour[] = array('value' => 'D', 'valueAffiche' => 'Différé (SRD)');
        break;
    }

    return $tableauRetour;
}