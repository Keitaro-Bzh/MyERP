<?php

function fn_Operation_sqlSelectLisOperationPlat ($args) {
    //On va préparer notre tableau pour afficher notre liste d'objet
    switch ($args['pageCible']) {
        case 'releve':
            $filtreAffiche = "rapprochees";
            break;
        case 'operation' :
            $filtreAffiche = "nonRapprochees";
            break;
    }

    $argsObjet = array(
        'idCompte' => $args['idCompte'],
        'filtreAffiche' => $filtreAffiche
    );

    $monObjet = new Operation();
    $listeOperationBDD = $monObjet->getListeObjet($argsObjet);


    $donneesMEF = array();
    if ($listeOperationBDD) {
        foreach ($listeOperationBDD as $operationLigne) {
            $donneesMEF[] = array(
                'Date' => date("d/m/y",strtotime($operationLigne->getValeur('date'))),
                'Tiers' => $operationLigne->getValeur('montant'),
                'Description' => $operationLigne->getValeur('description'),
                'Debit' => strcmp($operationLigne->getValeur('type'),'D') === 0 ? $operationLigne->getValeur('montant') : '',
                'Crédit' => strcmp($operationLigne->getValeur('type'),'C') === 0 ? $operationLigne->getValeur('montant') : '',
                'Options' => 'à définir fn_Operation',
            );
        }
    }
    else {
        $donneesMEF = null;
    }
    unset($monObjet);
    return (array('entete' => array('Date','Tiers','Description','Debit','Crédit','Options'), 'donnees' => $donneesMEF));
}