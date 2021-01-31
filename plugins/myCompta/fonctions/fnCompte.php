<?php
/* La fonction fnCompte_preprareListeComptePlat() va nous permettre de renvoyer un tableau de valeur simple
à partir de la liste d'objet généré */
function fnCompte_preprareListeComptePlat($idBanque = null) {
    $listeComptePlat = null;
    $monCompte = new Compte();

    $listeCompteBDD = null;
    $listeCompteBDD = $monCompte->get_ListeObjetFromBase();
    if ($listeCompteBDD) {
        foreach($listeCompteBDD as $fnCompteLigne) {
            if ($idBanque) {
                if (strcmp($idBanque,$fnCompteLigne->getValeur('idBanque')) === 0) {
                   $listeComptePlat[] = array(
                        'idCompte' => $fnCompteLigne->getValeur('idCompte'),
                        'libelleCompte' => $fnCompteLigne->getValeur('libelleCompte'),
                        'typeCompte' => $fnCompteLigne->getValeur('typeCompte'),
                        'Titulaire' => $fnCompteLigne->getValeurClasse('Titulaire','prenom'),
                   );
                }
            }
        }
    }
    return $listeComptePlat;
}
