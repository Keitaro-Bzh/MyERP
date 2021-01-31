<?php
function fn_myCompta_prepareformOptionSelect($args) {
    $valeurRetour = null;
    switch ($args['cibleAffiche']) {
        case 'typeCompte' :
            $valeurRetour[] = array('valueOption' => 'C','valueAffiche' => 'Compte Courant');
            $valeurRetour[] = array('valueOption' => 'E','valueAffiche' => 'Compte Epargne');
            $valeurRetour[] = array('valueOption' => 'A','valueAffiche' => 'Compte Titre');
            break;
        case 'typeOperation' :
            $valeurRetour[] = array('valueOption' => 'D','valueAffiche' => 'Débit');
            $valeurRetour[] = array('valueOption' => 'C','valueAffiche' => 'Crédit');
            break;
        case 'banque' :
            $listeBanque = fnBanque_preprareListeBanquePlat();
            if($listeBanque) {
                foreach ($listeBanque as $banque) {
                    $valeurGuichet = $banque->get_Valeur('nom') ? $banque->get_Valeur('nom') : ''; 
                    $valeurRetour[] = array('valueOption' => $banque->get_Valeur('idBanque'),
                        'valueAffiche' => $valeurGuichet,
                    );
                }
            }
            break;
        case 'titulaire' :
            $monTitulaire = new Titulaire();
            $listeTitulaireBDD = $monTitulaire->get_ObjetListFromBase();

            if($listeTitulaireBDD) {
                foreach ($listeTitulaireBDD as $titulaireLigne) {
                        $valeurAffiche = $titulaireLigne->get_Valeur('nom') . ' ' . $titulaireLigne->get_Valeur('prenom');
                        $valeurRetour[] = array(
                            'valueOption' => $titulaireLigne->get_Valeur('idTitulaire'),
                            'valueAffiche' => $valeurAffiche
                        );
                }
            }
            break;
            break;
        case 'compte' :
            $monCompte = new Compte();
            $listeCompteBDD = $monCompte->get_ObjetListFromBase();

            if($listeCompteBDD) {
                foreach ($listeCompteBDD as $compteLigne) {
                    if (strcmp($compteLigne->get_Valeur('typeCompte'), 'C') === 0 ) {
                        $valeurAffiche = $compteLigne->get_Valeur('libelleCompte') . ' (' . $compteLigne->get_ValeurClasse('Titulaire','prenom') . ')';
                        $valeurRetour[] = array(
                            'valueOption' => $compteLigne->get_Valeur('idCompte'),
                            'valueAffiche' => $valeurAffiche
                        );
                    }
                }
            }
            break;
        case 'famille' :
            $maFamille = new Famille();
            $listeFamilleBDD = $maFamille->get_ObjetListFromBase();
    
            if ($listeFamilleBDD) {
                foreach ($listeFamilleBDD as $familleLigne) {
                    $valeurRetour[] = array(
                        'valueOption' => $familleLigne->get_Valeur('idFamille'),
                        'valueAffiche' => $familleLigne->get_Valeur('nomFamille')
                    );
                }
            }
            break;
    }

    return $valeurRetour;
}

function fn_myCompta_preprareformOptionSelectGroupBy($args) {
    $valeurRetour = null;
    switch ($args['cibleAffiche']) {
        case 'compte' :

            break;
        case 'categorie' :
            $valeurRetour = fn_Categorie_preprareListeGroupByPlat();
            break;
    }

    return $valeurRetour;
}

/** La fonction suivante va préparer l'affichage des coordonnées bancaires sur 
 * la page d'accueil du référentiel
 */
 function fn_myCompta_prepareAfficheListeCoordooneesBancaire($afficheArchive = null) {
    $monCompte = new Compte();
    $maListeCompte = $monCompte->get_ObjetListFromBase();

    return $maListeCompte;
 }

function fn_myCompta_prepareListeCompteDetails($args = null) {
    $tableauFiltre = null;

    $monCompte = new Compte();
    $listeComptes = $monCompte->get_ObjetListFromBase();
    if ($listeComptes) {
        foreach($listeComptes as $compteLigne) {
            if (strcmp($compteLigne->get_Valeur('typeCompte'),$args['typeCompte']) === 0 ) {
                $tableauFiltre[] = $compteLigne;
            }
        }
    }

    return $tableauFiltre;
}

function fn_myCompta_afficheWidgetsListeComptes ($args) {
    $ListeCompteDetails = fn_myCompta_prepareListeCompteDetails(array('typeCompte' => $args['typeCompte']));
    if($ListeCompteDetails) {
        foreach ($ListeCompteDetails as $compteDetail) {
            if (strcmp($args['typeCompte'],'T') === 0) {
                fnWidget_compteTitreDetail(array('compte' => $compteDetail));
            }
            else {
                fnWidget_compteDetail(array('compte' => $compteDetail));
            }
        }
    }
    else {
        fn_template_divAlert("Aucun compte n'a été enregistré");
    }
}