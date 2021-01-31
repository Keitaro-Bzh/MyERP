<?php
function fn_template_SimpleOption($tableauBrutes = null) { ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php
        if ($tableauBrutes['donnees']) { ?>
            <table class="table table-striped jambo_table">
                <thead>
                    <tr class="headings">
                        <?php foreach ($tableauBrutes['entete'] as $enteteLigne) { ?>
                        <th class="column-title"><?php echo $enteteLigne; ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tableauBrutes['donnees'] as $donneesLigne) { ?>
                        <tr>
                            <?php foreach ($tableauBrutes['entete'] as $enteteLigne) { ?>
                                <td><?php echo $donneesLigne[$enteteLigne]; ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } 
        else { 
            fn_template_divAlert("Aucune donnée"); 
        }
    ?>
    </div>
<?php } 