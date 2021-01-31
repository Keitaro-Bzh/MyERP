<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="box-content">
		<h4 class="box-title">
            <?php echo ($titrePageDetailObjet ? $titrePageDetailObjet : '') . $monObjet->get_Valeur('libelleCompte'); ?>
        </h4>
		<div class="dropdown js__drop_down">
			<a href="index.php?module=myCompta&rubrique=Compte" class="btn btn-warning btn-xs "><i class='fa fa-arrow-left'></i> Liste compte</a>
		</div>

        <div class="col-md-12">
            <div class="bs-example">
                <div class="dropdown clearfix">
                    <div class="row small-spacing">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <a href="index.php?module=myCompta&rubrique=Operation&action=ajout" class="btn btn-success btn-sm margin-bottom-10"><i class='fa fa-plus'></i> Opération</a>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 margin-bottom-20 text-center">
                                   <!-- <a href="#" class="dropdown-icon js__drop_down_button btn btn-sm "><i class='fa fa-cog'></i> Affichage</a> -->
                                </div>
                                <table class='table table-responsive'>
                                <tr>
                                    <td>Solde actuel</td>
                                    <td class='text-right'>0.00€</td>
                                </tr>
                                <tr>
                                    <td>Solde réel</td>
                                    <td class='text-right'>0.00€</td>
                                </tr>
                                <tr>
                                    <td>Echéances à venir</td>
                                    <td class='text-right'>0.00€</td>
                                </tr>
                                </table>

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <?php //fn_template_TableauDatabase(null); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Définition de notre script JS personnalisé !-->
<?php
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_compte.php';
$scriptPersoJSOnLoad = true;
?>