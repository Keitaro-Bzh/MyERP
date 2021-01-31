<?php
function fnOperation_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_operations",
    'nomID' => "idOperation",
    'suiviModification' => true,
    );
}

function fnOperation_classeParametreDefinition($objet) {
    $listeParametreObjet['idOperation'] =  array('baseNomChamp' => 'idOperation',
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
        'baseClasseLienSourceObjet' => get_class($objet),
        'baseClasseLienSourceObjetNomChamp' => 'idCompte',
        'baseClasseLienDestObjet' => 'Compte',
        'baseClasseLienDestObjetID' => 'idCompte',
        'formLabel' => "Compte",
        'formTypeChamp' => 'select',
        'formDivChamp' => 'Compte',
        'formNameChamp' => 'Compte',
        'formValeurChamp' => $objet->get_Valeur('Compte') ? (is_object($objet->get_Valeur('Compte')) ? $objet->get_ValeurClasse('Compte','idCompte') : $objet->get_Valeur('Compte')) : null,
        'formControl' => 'user',
    );
    $listeParametreObjet['__Categorie__'] =  array('baseClasseLien' => true,
    'baseClasseLienUnique' => '1<>1',
    'baseClasseLienSourceObjet' => get_class($objet),
    'baseClasseLienSourceObjetNomChamp' => 'idCategorie',
    'baseClasseLienDestObjet' => 'Compte',
    'baseClasseLienDestObjetID' => 'idCompte',
    'formLabel' => "Categorie",
    'formTypeChamp' => 'select',
    'formDivChamp' => 'Categorie',
    'formNameChamp' => 'Categorie',
    'formValeurChamp' => $objet->get_Valeur('Categorie') ? (is_object($objet->get_Valeur('Categorie')) ? $objet->get_ValeurClasse('Categorie','idCategorie') : $objet->get_Valeur('Categorie')) : null,
    'formControl' => 'user',
);
    $listeParametreObjet['typeMouvement'] =  array('baseNomChamp' => 'typeMouvement',
        'baseTypeChamp' => 'varchar(1)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Type de mouvement",
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnOperation_FormSelectOptions('typeMouvement'),
        'formNameChamp' => 'typeMouvement',
        'formValeurChamp' => $objet->get_Valeur('typeMouvement'),
    );
    $listeParametreObjet['modePaiement'] =  array('baseNomChamp' => 'modePaiement',
        'baseTypeChamp' => 'varchar(2)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Mode de paiement",
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnOperation_FormSelectOptions('modePaiement'),
        'formNameChamp' => 'modePaiement',
        'formValeurChamp' => $objet->get_Valeur('modePaiement'),
    );
    $listeParametreObjet['date'] =  array('baseNomChamp' => 'date',
        'baseTypeChamp' => 'date',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Date d'opération",
        'formTypeChamp' => 'date',
        'formNameChamp' => 'date',
        'formValeurChamp' => $objet->get_Valeur('date'),
    );
    $listeParametreObjet['description'] =  array('baseNomChamp' => 'description',
        'baseTypeChamp' => 'varchar(150)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Description",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'description',
        'formValeurChamp' => $objet->get_Valeur('description'),
    );
    $listeParametreObjet['montant'] =  array('baseNomChamp' => 'montant',
        'baseTypeChamp' => 'float',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Montant",
        'formTypeChamp' => 'decimal',
        'formNameChamp' => 'montant',
        'formValeurChamp' => $objet->get_Valeur('montant'),
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

function fnOperation_FormSelectOptions ($champ) {
    switch ($champ) {
        case 'modePaiement':
            $tableauRetour[] = array('value' => 'CB', 'valueAffiche' => 'Carte bancaire');
            $tableauRetour[] = array('value' => 'VI', 'valueAffiche' => 'Virement');
            $tableauRetour[] = array('value' => 'PR', 'valueAffiche' => 'Prélèvement');
            $tableauRetour[] = array('value' => 'CH', 'valueAffiche' => 'Chèque');
        break;
        case 'typeMouvement':
            $tableauRetour[] = array('value' => 'C', 'valueAffiche' => 'Crédit');
            $tableauRetour[] = array('value' => 'D', 'valueAffiche' => 'Débit');
            break;
    }
    return $tableauRetour;
}

