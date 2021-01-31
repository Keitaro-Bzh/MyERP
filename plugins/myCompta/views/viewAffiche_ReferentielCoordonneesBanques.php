<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/templates/'. $_SESSION['template'] . '/_template_include.php');
?>

<!-- On va procéder à un affichage d'un cadre par Banque !-->
<?php    
if ($listeBanquePlat) {
    foreach($listeBanquePlat as $banque) { ?>
        <!-- On va procéder à l'affichage des Comptes selon les banques !-->
        <?php
        if ($listeCoordonneesBancaires) { ?>
            <table class="table table-striped jambo_table">
                <thead>
                    <tr class="headings">
                        <th colspan=3><?php echo $banque->get_Valeur('nom'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listeCoordonneesBancaires as $compteLigne) { 
                        if ((int)$banque->get_Valeur('idBanque') === (int)$compteLigne->get_ValeurClasse('Banque','idBanque')) { ?>
                        <tr>
                            <td width=30%><?php echo $compteLigne->get_Valeur('libelleCompte'); ?></td>
                            
                            <td width=60% class='text-center'><?php echo $compteLigne->get_Valeur('Titulaire') ? $compteLigne->get_ValeurClasse('Titulaire','nom') . ' ' . $compteLigne->get_ValeurClasse('Titulaire','prenom') : ''; ?></td>
                            <td width=10% class='text-center'>
                                <a href="index.php?module=myCompta&rubrique=Compte&action=modif&id=<?php echo $compteLigne->get_Valeur('idCompte'); ?>"><li class='fa fa-pencil'></li></a>  
                                <a href="index.php?module=myCompta&rubrique=Compte&action=supprime&id=<?php echo $compteLigne->get_Valeur('idCompte'); ?>"><li class='fa fa-trash'></li></a>
                            </td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
        <?php } 
        else { 
            fn_template_divAlert("Aucun compte détenu ou actif dans cet établissement bancaire"); 
        }
    }
}
else { 
    fn_template_divAlert("Aucun établissement bancaire n'a été déclaré ou n'est actif");
}