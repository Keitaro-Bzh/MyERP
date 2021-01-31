<?php
function fn_template_TableauDatabase($tableauObjet = null,$userDroit = null) { ?>
    <?php if (count($tableauObjet) > 0) { ?>
    <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
            <tr>
                <?php foreach ($tableauObjet[0]['donnees'] as $objetLigne) { ?>
                        <th><?php echo $objetLigne['enTete']; ?></th>
                    <?php } ?>
                <th width=50>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tableauObjet as $objetLigne) { 
            $idObjet = $objetLigne['idObjet'];?>
            <tr>
                <?php foreach ($objetLigne['donnees'] as $detailObjet) { ?>
                    <td><?php echo $detailObjet['valeur']; ?></td>
                <?php } ?>
                <td class='text-center'>
                    <a href='<?php echo $_SERVER['REQUEST_URI'] . "&action=affiche&id=" . $idObjet; ?>'><i class='fa fa-search'></i></a>
                    <a href='<?php echo $_SERVER['REQUEST_URI'] . "&action=modif&id=" . $idObjet; ?>'><i class='fa fa-edit'></i></a>
                    <a href='<?php echo $_SERVER['REQUEST_URI'] . "&action=supprime&id=" . $idObjet; ?>'><i class='fa fa-trash'></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } 
        else { 
            fn_template_divAlert("Aucune donnée"); 
        }
    ?>
<?php }
$includeScriptTable = true;