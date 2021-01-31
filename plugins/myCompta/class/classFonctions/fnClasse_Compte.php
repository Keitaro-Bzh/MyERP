<?php
function fnCompte_classeBaseDefinition() {
    return array(
    'nomTable' => "mycompta_comptes",
    'nomID' => "idCompte",
    'suiviModification' => true
    );
}

function fnCompte_classeParametreDefinition($objet) {
    $listeParametreObjet['idCompte'] =  array('baseNomChamp' => 'idCompte',
        'baseTypeChamp' => 'int',
        'basePrimaryKey' => true,
        'baseAutoIncrement' => true,
        'baseNotNull' => true,
        'baseUnique' => true,
        'baseIndex' => true,
        'baseAncienNom' => null,
    );
    $listeParametreObjet['__Banque__'] =  array('baseClasseLien' => true,
        'baseClasseLienCorrespondance' => '1<>1',
        'baseClasseLienSourceObjet' => 'Banque',
        'baseClasseLienSourceObjetNomChamp' => 'idBanque',
        'baseClasseLienDestObjet' => 'Banque',
        'baseClasseLienDestObjetID' => 'idBanque',
        'formLabel' => "Banque",
        'formTypeChamp' => 'select',
        'formDivChamp' => 'Banque',
        'formNameChamp' => 'Banque',
        'formValeurChamp' => $objet->get_Valeur('Banque') ? (is_object($objet->get_Valeur('Banque')) ? $objet->get_ValeurClasse('Banque','idBanque') : $objet->get_Valeur('Banque')) : null,
    );
    $listeParametreObjet['__Titulaire__'] =  array('baseClasseLien' => true,
        'baseClasseLienUnique' => '1<>x',
        'baseClasseLienSourceObjet' => 'Titulaire',
        'baseClasseLienSourceObjetNomChamp' => 'idTitulaire',
        'baseClasseLienDestObjet' => 'Titulaire',
        'baseClasseLienDestObjetID' => 'idTitulaire',
        'formLabel' => "Titulaire",
        'formTypeChamp' => 'select',
        'formDivChamp' => 'Titulaire',
        'formNameChamp' => 'Titulaire',
        'formValeurChamp' => $objet->get_Valeur('Titulaire') ? (is_object($objet->get_Valeur('Titulaire')) ? $objet->get_ValeurClasse('Titulaire','idTitulaire') : $objet->get_Valeur('Titulaire')) : null,
    );
    $listeParametreObjet['libelleCompte'] =  array('baseNomChamp' => 'libelleCompte',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => true,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Libellé Compte",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'libelleCompte',
        'formValeurChamp' => $objet->get_Valeur('libelleCompte'),
        'formControl' => null,
        'tableAfficheOn' => true,
        'tableEnTete' => 'Libellé',
    );
    $listeParametreObjet['typeCompte'] =  array('baseNomChamp' => 'typeCompte',
        'baseTypeChamp' => 'varchar(1)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Type de compte",
        'formTypeChamp' => 'radio',
        'formOptionValues' => fnCompte_FormSelectOptions('typeCompte'),
        'formNameChamp' => 'typeCompte',
        'formValeurChamp' => $objet->get_Valeur('typeCompte'),
        'tableAfficheOn' => true,
        'tableEnTete' => 'Type de compte',
    );
    $listeParametreObjet['soldeInitial'] =  array('baseNomChamp' => 'soldeInitial',
        'baseTypeChamp' => 'double',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Solde initial",
        'formTypeChamp' => 'text',
        'formOptionValues' => null,
        'formDivChamp' => null,
        'formNameChamp' => 'soldeInitial',
        'formValeurChamp' => $objet->get_Valeur('soldeInitial'),
    );
    $listeParametreObjet['numeroCompte'] =  array('baseNomChamp' => 'numeroCompte',
        'baseTypeChamp' => 'varchar(100)',
        'basePrimaryKey' => false,
        'baseAutoIncrement' => false,
        'baseNotNull' => false,
        'baseUnique' => false,
        'baseIndex' => false,
        'baseAncienNom' => null,
        'formLabel' => "Numéro Compte",
        'formTypeChamp' => 'text',
        'formNameChamp' => 'numeroCompte',
        'formValeurChamp' => $objet->get_Valeur('numeroCompte'),
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

function fnCompte_FormSelectOptions ($champ) {
    switch ($champ) {
        case 'comptePrincipal':
            $tableauRetour[] = array('value' => '0', 'valueAffiche' => 'Non');
            $tableauRetour[] = array('value' => '1', 'valueAffiche' => 'Oui');
        break;
        case 'typeCompte':
            $tableauRetour[] = array('value' => 'C', 'valueAffiche' => 'Compte Courant');
            $tableauRetour[] = array('value' => 'E', 'valueAffiche' => 'Compte Epargne');
            $tableauRetour[] = array('value' => 'T', 'valueAffiche' => 'Compte Titres');
            break;
    }
    return $tableauRetour;
}