<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="box-content">
		<h4 class="box-title">
            Libellé compte<?php //echo ($titrePageDetailObjet ? $titrePageDetailObjet : '') . $monObjet->getValeur('libelleCompte'); ?>
		</h4>
		<div class="dropdown js__drop_down">
			<a href="index.php?module=myCompta&rubrique=CompteAction" class="btn btn-warning btn-xs "><i class='fa fa-arrow-left'></i> Liste compte</a>
			<a href="#" class="btn btn-xs "><i class='fa fa-cog'></i></a>						
		</div>
		<!-- /.dropdown js__dropdown -->
		<div class="row">
			<div class="col-md-12">
				<div class="bs-example">
					<div class="dropdown clearfix">
						<div class="row small-spacing">
                            <div class="col-xs-12">
                                <!-- résumé financier -->
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <table class='no-border table table-responsive'>
                                        <tr>
                                            <td class='text-center'>Solde Espèces</td>
                                            <td class='text-right'>1,09 €</td>
                                            <td class='text-center'>+/- Values</td>
                                            <td class='text-right'>146.36 €</td>
                                        </tr>
                                        <tr>
                                            <td class='text-center'>Total Titres</td>
                                            <td class='text-right'>2226,51 €</td>
                                            <td class='text-center'>Valorisation</td>
                                            <td class='text-right'>2382.13 €</td>
                                        </tr>
                                        <tr>
                                            <td class='text-center'>Valeur Titres J-1</td>
                                            <td class='text-right'>2371.87 €</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 text-center">
                                    <a href='index.php?module=myCompta&rubrique=Operation&action=ajout' class='btn btn-info btn-xs margin-bottom-10'><i class='fa fa-plus'></i> Virement </a>
                                    <a href='index.php?module=myCompta&rubrique=Action&action=ajout' class='btn btn-success btn-xs margin-bottom-10'><i class='fa fa-plus'></i> Ordre </a>
                                </div>
                                <!-- fin résumé -->
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class='row'>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12">
                    <h4>Mes positions au comptant</h4>
                </div>
                <div class="x_content">
                    <table class='table table-hover'>
                        <thead>
                        <tr>
                            <th>Valeur</th>
                            <th>Qté</th>
                            <th>Prix de revient</th>
                            <th>Total titre</th>
                            <th>Cours (Cloture j-1)</th>
                            <th>Valorisation cours</th>
                            <th>+/- value</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class='actionJS' value='1'>Total</td>
                            <td>35</td>
                            <td>32,217 €</td>
                            <td>1127,60 €</td>
                            <td>32,65 €</td>
                            <td>1142,75 €</td>
                            <td>15,15 €</td>
                            <td><button class=btnTest>A</button><button class=btnTest>V</button></td>
                        </tr>
                        <tr>
                            <td class='actionJS' value='2' id='test'>FDJ</td>
                            <td>20</td>
                            <td>19,50 €</td>
                            <td>390,00 €</td>
                            <td>26,08 €</td>
                            <td>521,60 €</td>
                            <td>131,60 €</td>
                            <td><button class=btnTest>A</button><button class=btnTest>V</button></td>
                        </tr>
                        <tr>
                            <td class='actionJS'>Prologue</td>
                            <td>240</td>
                            <td>0,285 €</td>
                            <td>68,40 €</td>
                            <td>0,264 €</td>
                            <td>63,36 €</td>
                            <td>-5,04 €</td>
                            <td><button class=btnTest>A</button><button class=btnTest>V</button></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class='x_title'>
                    <h5>Mes positions SRD</h5>
                </div>
                <div class="x_content">
                    Aucune position prise
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Définition de notre script JS personnalisé !-->
<?php
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_actions.php';
$scriptPersoJSOnLoad = true;
?>