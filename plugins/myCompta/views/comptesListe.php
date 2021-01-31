<?php
    // On va charger la liste de nos comptes
    $compte = new Compte();
    $listCompte = $compte->getListeObjet();

    $compteurTableau = 0;

    // On va recréer un tableau par Banque
    foreach ($listCompte as $compte) {
        if ($compteurTableau === 0) {
            $listeBanque[$compteurTableau] = array(
                'nomBanque' => $compte->getValeur('nomBanque'),
                'DetailCompte' => $compte
            );
            $compteurTableau = 1;
        }
        else {
            $newBanque = true;
            foreach ($listeBanque as $banqueList) {
                if (strcmp($banqueList['nomBanque'],$compte->getValeur('nomBanque')) === 0) {
                   $listCompteTri[($compteurTableau -1)]['DetailCompte'] = $compte;
                    $newBanque = false;
                }
            }
            // Pas de rapprochament de banque, on ajoute une nouvelle banque à notre tableau
            if ($newBanque) {
                $listeBanque[$compteurTableau] = array(
                    'nomBanque' => $compte->getValeur('nomBanque'),
                    'DetailCompte' => $compte,
                );
                $compteurTableau++;               
            }
        }
    }
    /*echo '<pre>';
    var_dump($listeBanque);
    echo '</pre>';*/
?>

<!-- page content -->
<div class='row'>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3>Liste des comptes</h3>
    </div>
</div>

<?php foreach($listeBanque as $banque) { ?>
<div class='row'>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $banque['nomBanque']; ?></h2>
				<div class="nav navbar-right panel_toolbox">
                    <ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Libellé Compte </th>
                                <th class="column-title">Titulaire </th>
                                <th class="column-title">Type de compte </th>
                                <th class="column-title" align=center>Solde </th>
                                <th class="column-title no-link last" align=center><span class="nobr">Action</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="even pointer">
                                <td class=" "><?php echo $compte->getValeur('libelleCompte'); ?></td>
                                <td class=" "></td>
                                <td class=" "></td>
                                <td class=" "><?php echo $compte->getSolde()['soldeRapproche']; ?></td>
                                <td class=" last" align=center>
                                    <div class="col-md-1 col-sm-1 col-xs-1">
                                        <a href='index.php?module=myCompta&rubrique=Compte&action=affiche&id=6' title='Relevé de compte'><span class="glyphicon glyphicon-list-alt"> </a></span>
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-1">
                                        <a href='index.php?module=myCompta&rubrique=Compte&action=affiche&id=6' title='Modifier le compte'><span class="glyphicon glyphicon-pencil"></a></span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- /page content -->