<?php
/* La fonction fnBanque_preprareListeBanquePlat() va nous permettre de renvoyer un tableau de valeur simple
à partir de la liste d'objet généré */
function fnBanque_preprareListeBanquePlat() {
    $maBanque = new Banque();
    $listeBanquePlat = null;
    $listeBanqueBDD = $maBanque->get_ObjetListFromBase();
    if ($listeBanqueBDD) {
        foreach ($listeBanqueBDD as $banque) {
            $listeBanquePlat[] = array(
                'idBanque' => $banque->get_Valeur('idBanque'),
                'idSociete' => $banque->get_Valeur('idSociete'),
                'Enseigne' => $banque->get_Valeur('enseigne'),
                // 'Guichet' => $banque->get_Valeur('guichet'),
            );
        }
    }
    return $listeBanqueBDD;
}

