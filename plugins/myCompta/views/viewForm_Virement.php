<?php

// Initialication du formulaire 
fn_template_formDeclareDebut(array(
    'classe' => 'Virement',
    'valeurID' => null,//$monObjet->getValeur('idVirement'),
    'nomID' => 'idVirement',
    'url' => 'index.php?module=myCompta&rubrique=Compte'
)); ?>

<div class='row'>
    <div class='x_panel'>
        <div class='col-md-4 col-sm-4 col-xs-12 form-group'>
            <label class='form-control'>Compte émetteur</label>
        </div>
        <div class='col-md-8 col-sm-8 col-xs-12 form-group'>
            <div id='divCompteEmetteur'></div>
        </div>
        <div class="clearfix"></div>

        <div class='col-md-4 col-sm-4 col-xs-12 form-group'>
            <label class='form-control'>Compte destinataire</label>
        </div>
        <div class='col-md-8 col-sm-8 col-xs-12 form-group'>
            <div id='divCompteDestinataire'></div>
        </div>

        <div class="clearfix"></div>

        <div class='col-md-4 col-sm-4 col-xs-12 form-group'>
            <label class='form-control'>Montant</label>
        </div>
        <div class='col-md-8 col-sm-8 col-xs-12 form-group'>
            <input type=text class='form-control'/>
        </div>

        <div class="clearfix"></div>

        <div class='col-md-4 col-sm-4 col-xs-12 form-group'>
            <label class='form-control'>Date opération</label>
        </div>
        <div class='col-md-8 col-sm-8 col-xs-12 form-group'>
            <input type=date class='form-control' />
        </div>
        <div class="clearfix"></div>

        <div class='col-md-4 col-sm-4 col-xs-12 form-group'>
            <label class='form-control'>Opération pointé</label>
        </div>
        <div class='col-md-8 col-sm-8 col-xs-12 form-group'>
            <input type=checkbox>
        </div>
    </div>
</div>


<?php 
echo getenv("HTTP_REFERER");
// Fin du formulaire
fn_template_formDeclareFin(array(
    'urlProvenance' => getenv("HTTP_REFERER"),
));
?>

<!-- Définition de notre script JS personnalisé !-->
<?php
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_virement.php';
$scriptPersoJSOnLoad = true;
?>


