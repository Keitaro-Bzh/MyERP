<?php 
/*Gestion de notre formulaire
$argsFormulaire = array(
    'disableForm' => true,
); */ 
?>

<form method=post class="form-horizontal form-label-left" href='index.php?module=parametres' id=formulaire>
    <input type=hidden name='formulaire' value='personnalisation'>
    <input type=hidden name='class' value='General'>
    <input type=hidden name='id' value='<?php echo $GLOBALS['Site']->getValeur('id'); ?>'>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Titre du site</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='titre' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('titre')) ? $GLOBALS['Site']->getValeur('titre'): 'Your CORPORATION'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Sous-Titre du site</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='sousTitre' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('sousTitre')) ? $GLOBALS['Site']->getValeur('sousTitre'): 'MyERP'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Information Société 1</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='info1' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('info1')) ? $GLOBALS['Site']->getValeur('info1'): 'Information 1'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Complément information Société 1</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='stInfo1' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('stInfo1')) ? $GLOBALS['Site']->getValeur('stInfo1'): 'Complément information 2'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Information Société 2</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='info2' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('info2')) ? $GLOBALS['Site']->getValeur('info2'): 'Information 2'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Complément information Société 2</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='stInfo2' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('stInfo2')) ? $GLOBALS['Site']->getValeur('stInfo2'): 'Complément information 2'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Téléphone Société</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='telContact' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('telContact')) ? $GLOBALS['Site']->getValeur('telContact'): '+33 2 34 56 78 90'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Mail Société</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='mailContact' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('mailContact')) ? $GLOBALS['Site']->getValeur('mailContact'): 'contact@youcompany.com'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Information footer</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input type="text" name='footer' class="form-control" value='<?php echo (($GLOBALS['Site']->getValeur('footer')) ? $GLOBALS['Site']->getValeur('footer'): 'Texte footer'); ?>'>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Autoriser rafraichissement (F5)</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="radio">
                <label>
                    <input type="radio" <?php if($GLOBALS['Site']->getValeur('onRefresh') != '1') { echo'checked=""'; } ?> value="0" id="onRefresh1" name="onRefresh">Non
                </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio" <?php if($GLOBALS['Site']->getValeur('onRefresh') === '1') { echo'checked=""'; } ?> value="1" id="onRefresh2" name="onRefresh">Oui
            </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4 col-xs-12">Mode Debug activé</label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="radio">
                <label>
                    <input type="radio" <?php if($GLOBALS['Site']->getValeur('onDebug') != '1') { echo'checked=""'; } ?> value="0" id="onDebug1" name="onDebug">Non
                </label>
            </div>
            <div class="radio">
            <label>
                <input type="radio" <?php if($GLOBALS['Site']->getValeur('onDebug') === '1') { echo'checked=""'; } ?>value="1" id="onDebug2" name="onDebug">Oui
            </label>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-4">
            <div id='btnModifier'>
                <button class="btn btn-primary" type="button" id='enForm'>Modifier</button>
            </div>
            <div id='btnValider'>
                <button class="btn btn-warning" type="reset" id='disForm'>Annuler</button>
                <button type="submit" class="btn btn-success" name='enreg'>Valider</button>
            </div>
        </div>
    </div>
</form>

<?php
	// On déclare notre script JS/PHP qui correspond à notre page
	//$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/main/scripts/configurationSite.php'; 
?>