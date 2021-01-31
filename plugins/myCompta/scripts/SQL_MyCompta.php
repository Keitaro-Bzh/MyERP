<?php
 function sql_myCompta_List_CoordonneesBancaires($args = null) { 
    $requete = "SELECT mycompta_banques.idBanque,";
    $requete = $requete . " mycompta_comptes.idCompte,";
    $requete = $requete . " mycontacts_societes.nom as banque,";
    $requete = $requete . " mycompta_banques.guichet,";
    $requete = $requete . " mycompta_comptes.libelleCompte,";
    $requete = $requete . " mycontacts_personnes.nom as titulaire,";
    $requete = $requete . " mycompta_comptes.typeCompte";
    $requete = $requete . " FROM mycompta_banques inner join mycontacts_societes on mycompta_banques.idSociete = mycontacts_societes.idSociete,";
    $requete = $requete . " mycompta_comptes inner join mycontacts_personnes on mycompta_comptes.idTitulaire = mycontacts_personnes.idPersonne";
    $requete = $requete . " WHERE";
    $requete = $requete . " mycompta_banques.idBanque = mycompta_comptes.idBanque";
    return $requete;
 }