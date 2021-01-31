<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/templates/'. $_SESSION['template'] . '/_template_include.php');
?>

<!-- On va procéder à un affichage d'un cadre par Banque !-->
<?php    
if ($listeTiers) { ?>
    <table class="table table-striped jambo_table">
        <thead>
            <th>Type</th>
            <th>Nom</th>
            <th class='text-center'>Action</th>
        </thead>
        <tbody>
        <?php foreach($listeTiers as $tiers) { ?>
            <tr>
                <td width=20%><?php echo $tiers['type']; ?></td>
                <td width=70%><?php echo $tiers['nom']; ?></td>
                <td width=10% class='text-center'> 
                    <a href="index.php?module=myCompta&rubrique=Tiers&action=modif&id=<?php echo $tiers['idTiers']; ?>"><li class='fa fa-pencil'></li></a>  
                    <a href="index.php?module=myCompta&rubrique=Tiers&action=supprime&id=<?php echo $tiers['idTiers']; ?>"><li class='fa fa-trash'></li></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php }
else { 
    fn_template_divAlert("Aucun tiers n'a été déclaré ou n'est actif");
}