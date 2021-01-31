<?php
function fn_Categorie_preprareListeGroupByPlat() {
    $valeurRetour = null;
    $maCategorie = new Categorie();

    $requete = "SELECT mycompta_categories.idCategorie, " .
        "mycompta_familles.idFamille, " .
        "mycompta_familles.nomFamille, " .
        "mycompta_categories.nomCategorie " .
        "FROM mycompta_categories INNER JOIN mycompta_familles ON mycompta_categories.idFamille = mycompta_familles.idFamille " .
        "ORDER BY nomFamille,nomCategorie ASC";
    


    $listeCategorieBDD = $maCategorie->myQuery($requete);
    $idFamille = null;


    if($listeCategorieBDD) {
        foreach($listeCategorieBDD as $ligne) {
            $valeurRupture = null;
            if ($idFamille === null || strcmp($idFamille,$ligne['idFamille']) !== 0) {
                $valeurRupture = $ligne['nomFamille'];
                $idFamille = $ligne['idFamille'];
            }
            $valeurRetour[] = array(
                'valueRupture' => $valeurRupture,
                'valueOption' => $ligne['idCategorie'],
                'valueAffiche' => $ligne['nomCategorie']
            );
        }
    }
 
    return $valeurRetour;
}