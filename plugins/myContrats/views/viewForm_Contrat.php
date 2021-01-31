<form method=post class="form-horizontal form-label-left input_mask" enctype="multipart/form-data" action='index.php?module=<?php echo $_GET['module']; ?>&rubrique=<?php echo $_GET['rubrique']; ?>'>
	<input type=hidden name='formulaire'>
	<input type=hidden name='class' value='General'>
	<input type=hidden name='idUser' value="<?php echo $_SESSION['id']; ?>"/>
	<input type=hidden name="<?php echo $monObjet->getValeur('nomID'); ?>" value="<?php echo $monObjet->getValeur($monObjet->getValeur('nomID')); ?>"/>
    <!--<div class="x_panel">!-->
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Général</h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Fournisseur</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <div id=divSelectFournisseur>
                    </div>
                </div>
               
                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Type de contrat</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <select name='typeContrat' class="form-control">
                        <option value="abo" <?php echo ($monObjet->getValeur('typeContrat') === 'abo') ? "SELECTED" :"";?>>Abonnement</option>
                        <option value="mnt" <?php echo ($monObjet->getValeur('typeContrat') === 'mnt') ? "SELECTED" :"";?>>Maintenance</option>
                    </select>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Code Client</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <input class="form-control" type='text' placeholder="Code Client" name='codeClient' id="codeClient" value="<?php echo $monObjet->getValeur('codeClient'); ?>" REQUIRED/>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Libellé Contrat</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <input class="form-control" type='text' placeholder="Libellé" name='libelle' id="libelle" value="<?php echo $monObjet->getValeur('libelle'); ?>" REQUIRED/>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Référence fournisseur</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <input class="form-control" type='text' placeholder="Référence fournisseur" name='referenceFournisseur' id="referenceFournisseur" value="<?php echo $monObjet->getValeur('referenceFournisseur'); ?>" REQUIRED/>
                </div>

                
                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Référence interne</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                    <input class="form-control" type='text' placeholder="Référence interne" name='referenceInterne' id="referenceInterne" value="<?php echo $monObjet->getValeur('referenceInterne'); ?>" REQUIRED/>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dates</h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Date de signature</label>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input class="form-control" type='date' name='dateSignature' id="dateSignature" value="<?php echo ($monObjet->getValeur('dateSignature')) ? $monObjet->getValeur('dateSignature') :"";?>" REQUIRED/>
                </div>
                <div class="col-md-12 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Durée d'engagement (mois)</label>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input class="form-control" type='text' name='duree' id="duree" value="<?php echo ($monObjet->getValeur('duree'));?>" REQUIRED/>
                </div>
                <div class="col-md-12 col-sm-3 col-xs-12 form-group has-feedback">
                    <label>Date résiliation</label>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                    <input class="form-control" type='date' name='dateResiliation' id="dateResiliation" value="<?php echo ($monObjet->getValeur('dateResiliation')) ? $monObjet->getValeur('dateResiliation') :"";?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Documents</h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <input type=file name=Contrat></input>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Description</h2>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <textarea name=description class="form-control"><?php echo ($monObjet->getValeur('description')) ? $monObjet->getValeur('description') :"";?></textarea>
            </div>
        </div>
    </div>

  

    <!--</div>!-->
	<div class="row">
	    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                <button type=submit name="enreg" class="btn btn-info">Valider</button>
                <a href='index.php?module=<?php echo $_GET['module']; ?>&rubrique=<?php echo $_GET['rubrique']; ?>' class="btn btn-warning">Retour</a>
                
            </div>
        </div>
    </div>	
</form>

<!-- Définition de notre script JS personnalisé !-->
<?php
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myContrats/scripts/JS_myContrats.php'; 
$scriptPersoJSOnLoad = true;
?>
