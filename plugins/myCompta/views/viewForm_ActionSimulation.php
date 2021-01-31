<h4>Simulation d'achat action</h4>
<div class="box-content">
    <div class='col-md-12'>
        <form action=# method=post>
        <div class="col-md-2 col-sm-4 col-xs-12 form-group has-feedback">
            <label class='form-group'>Quantité Achat</label>
            <input type=text class='form-control form-group' name=qteAchat value=0>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-12 form-group has-feedback">
            <label class='form-group'>Prix Achat</label>
            <input type=text class='form-control form-group' name=prixAchat value=0>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-12 form-group has-feedback">
            <label class='form-group'>Quantité Cours</label>
            <input type=text class='form-control form-group' name=qteCours value=0>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-12 form-group has-feedback">
            <label class='form-group'>Prix revient cours</label>
            <input type=text class='form-control form-group' name=prixCours value=0><br />
        </div>
        <div class="col-md-2 col-sm-4 col-xs-12 form-group has-feedback">
            <label class='form-group'>Palier</label>
            <select class='form-control form-group' name=palier>
                <option value=0.0001>0.0001</option>
                <option value=0.001 SELECTED>0.001</option>
                <option value=0.005>0.005</option>
                <option value=0.01>0.01</option>
                <option value=0.05>0.05</option>
                <option value=0.1>0.1</option>
                <option value=0.5>0.5</option>
                <option value=1>1</option>
                <option value=5>5</option>
            </select><br />
        </div>
        <div class="col-md-2 col-sm-4 col-xs-12 form-group has-feedback">
            <label class='form-group'>Tarif</label>
            <select class='form-control form-group' name=forfait>
                <option value=D>Decouverte</option>
                <option value=C SELECTED>Classic</option>
            </select><br />
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12 form-group has-feedback">
            <input type=submit name=btnAchat class='form-control btn btn-info btn-xs' value="Simuler Achat">
            <br />
            <input type=submit name=btnPrixRevient class='form-control btn btn-success btn-xs' value="Simuler Prix de revient">
        </div>
        </form>
    </div>
    <?php
    if (isset($_POST['btnAchat'])) {
        $palierForfait = strcmp($_POST['forfait'],'D') === 0 ? 500 : 1000;
        $forfaitFrais = strcmp($_POST['forfait'],'D') === 0 ? 1.99 : 5.5;
        $tauxFrais = strcmp($_POST['forfait'],'D') === 0 ? 0.006 : 0.0048;
        $montantAchat = (double)$_POST['qteAchat'] * (double)$_POST['prixAchat'];
        $fraisAchat = $montantAchat < $palierForfait ? $montantAchat === 0. ? 0 : $forfaitFrais : round($montantAchat * $tauxFrais ,2);
        $montantTotalMouvement = $montantAchat + $fraisAchat;
        $montantActionCours = (int)$_POST['qteCours'] > 0 ? round((int)$_POST['qteCours'] * (double)$_POST['prixCours'],3) : 0;
        $montantTotal = $montantTotalMouvement + $montantActionCours;
        $qteTotal = $_POST['qteAchat'] + $_POST['qteCours'];
        $prixRevient = $qteTotal > 0 ? round($montantTotal / $qteTotal,3) : 0;
        ?>
        <div class='col-md-4'>
            <h4>Prévision mouvement</h4>
            <div class='box-content'>
            <p><div class='col-md-8'>Montant achat :</div><div class='text-right col-md-4'><strong><?php echo $montantAchat; ?> €</strong></div></p>
            <p><div class='col-md-8'>Frais mouvement :</div><div class='text-right col-md-4'><strong><?php echo $fraisAchat; ?> €</strong></div></p>
            <p><div class='col-md-8'>Quantité Total :</div><div class='text-right col-md-4'><strong><?php echo $qteTotal; ?> </strong></div></p>
            <p><div class='col-md-8'>Montant Total :</div><div class='text-right col-md-4'><strong><?php echo $montantTotal; ?> €</strong></div></p>
            <p><div class='col-md-8'>Prix de revient :</div><div class='text-right col-md-4'><strong><?php echo $prixRevient; ?> €</strong></div></p>
            </div>
        </div>
        <div class='col-md-8'>
            <h4>Analyse retour sur investissement</h4>
            <div class='box-content'>
            <table class='text-center table' width=100%>
                <tr>
                    <th class='test-center'>Prix de vente</th>
                    <th class='test-center'>Montant vente</th>
                    <th class='test-center'>Frais de vente</th>
                    <th class='test-center'>Total Mouvement</th>
                    <th class='test-center'>+/- value</th>
                </tr>
                <?php
                for($x = $prixRevient / 1.1 ; $x <= $prixRevient * 1.3; $x += $_POST['palier']) { 
                    $prixRevente = round($x,4);
                    $montantVente = round($prixRevente * $qteTotal,3);
                    $fraisVente = $montantVente < $palierForfait ? $forfaitFrais : round($montantVente * $tauxFrais ,3);
                    $totalVente = round($montantVente - $fraisVente,3);
                    $plusValue = round($totalVente - $montantTotal,2); 
                    ?>
                    <tr>
                        <td><?php echo $prixRevente; ?> €</td>
                        <td><?php echo $montantVente; ?> €</td>
                        <td><?php echo $fraisVente; ?> €</td>
                        <td><?php echo $totalVente; ?> €</td>
                        <td><?php echo $plusValue; ?> €</td>
                    </tr>
                <?php } ?>
            </table>
            </div>
        </div>
        <?php
    } 
    elseif (isset($_POST['btnPrixRevient'])) {
        $montantActionCours = (int)$_POST['qteCours'] > 0 ? round($_POST['qteCours'] * $_POST['prixCours'],3) : 0;
        $qteCours = $_POST['qteCours'];

        ?>
        <div class='col-md-8'>
            <h4>Evolution prix de revient</h4>
            <div class='box-content'>
            <table class='text-center table' width=100%>
                <tr>
                    <th class='test-center'>Quantité</th>
                    <th class='test-center'>Total achat</th>
                    <th class='test-center'>Frais Mouvement</th>
                    <th class='test-center'>Total Mouvement</th>
                    <th class='test-center'>Prix de revient</th>
                </tr>
                <?php
                $palier = round($qteCours * 0.1,0);
                for($x = $qteCours ; $x <= $qteCours * 3; $x += $palier) {
                    $newQte = $x + $qteCours; 
                    $prixRevient = round($x,3);
                    // $montantVente = round($prixRevente * $qteTotal,3);
                    // $fraisVente = $montantVente < 500 ? 1.99 : round($montantVente * 0.006,3);
                    // $totalVente = round($montantVente - $fraisVente,3);
                    // $plusValue = round($totalVente - $montantTotal,2); 
                    ?>
                    <tr>
                        <td><?php echo $x; ?> €</td>
                    </tr>
                <?php } ?>
            </table>
            </div>
        </div>
    <?php } ?>
</div>