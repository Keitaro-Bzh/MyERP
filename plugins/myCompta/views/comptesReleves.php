
<div class='row'>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<h3><?php echo $monObjet->getValeur('nomBanque'); ?> : <?php echo $monObjet->getValeur('libelleCompte'); ?><small> - <?php echo ($monObjet->getValeur('onArchive') === '1' ? "Cloturé": "Actif"); ?></small></h3>
		<p><a href='index.php?module=myCompta&rubrique=Compte	'><button name='compteCible'>Retour liste Comptes</button></a></p>
	</div>
</div>

<div class='row'>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><strong>Prévisionnel<?php echo $monObjet->getValeur('civilite'); ?> <?php echo $monObjet->getValeur('nom'); ?> <?php echo $monObjet->getValeur('prenom'); ?></strong></h2>
				<div class="nav navbar-right panel_toolbox">
					
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="col-md-4 col-sm-4 col-xs-9">
					Echéances à venir
				</div>
				<div class="col-md-2 col-sm-2 col-xs-3">
					<strong><?php echo $monObjet->getSolde()['soldeEcheance']; ?> €</strong>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-9">
					Opérations non rapprochées
				</div>
				<div class="col-md-2 col-sm-2 col-xs-3">
					<strong><?php echo $monObjet->getSolde()['soldeNonRapproche']; ?> €</strong>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-9">
					Solde Cours
				</div>
				<div class="col-md-2 col-sm-2 col-xs-3">
					<strong><?php echo $monObjet->getSolde()['soldeRapproche']; ?> €</strong>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-9">
					Solde Réel
				</div>
				<div class="col-md-2 col-sm-2 col-xs-3">
					<strong><?php echo $monObjet->getSolde()['soldeReel']; ?> €</strong>	
				</div>
			</div>
		</div>
	</div>
</div>

<div class='row'>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><strong>Relevé</strong></h2>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<a href="index.php?module=myCompta&rubrique=Compte&action=ajout&id=<?php echo $monObjet->getValeur('idCompte'); ?>">
						<button type="button" class="btn btn-success pull-right"><span class='glyphicon glyphicon-plus'></span> OPERATION</button>
					</a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-2">
					<ul  class="nav nav-tabs tabs-left">
						<li class="active" id='liReleveNonRapproche'><a class='filtre'  id='optReleveNonRapproche' href="#"> Opérations non rapprochées </a></li>
						<li id='liReleveEcheance'><a class='filtre'  id='optReleveEcheance' href="#"> Echéances du mois </a></li>
						<li id='liReleveCompte'><a class='filtre' id='optReleveCompte' href="#"> Relevé de comptes </a></li>
					</ul>
				</div>
				<div class="col-md-10 col-sm-10 col-xs-10">
                      <!-- Tab panes -->
					<div class="tab-content">
                        <div class="tab-pane <?php if (isset($_POST['formulaire']) && $_POST['formulaire'] != 'liReleveNonRapproche') { echo ''; } else { echo 'active'; } ?>"" id="liReleveNonRapproche">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                        <div class="x_content">
											<?php
												// affichage du bandeau d'option
												include ('_optionsAffichageComptes.php');
											?>
											<div id='tableauListe'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/_plugins/myCompta/scripts/myCompta.js"></script>
<script>
	function affichePageFiltree(dateDebut,dateFin,filtre) {
		getOperationsFiltrees({
			nomChamp : 'tableauListe',
			idCompte : '<?php echo $monObjet->getValeur('idCompte'); ?>',
			debutPeriode : dateDebut,
			finPeriode : dateFin,
			filtreAffiche : filtre
		});
	}
	
	$(function() {
		// Fonction qui va affiche le tableau au chargement du programme
		$(document).ready(function() {
			maDate = new Date();
			dateDebut= maDate.getFullYear() + '-' + (maDate.getMonth()+1) + '-01';
			dateFin= maDate.getFullYear() + '-' + (maDate.getMonth()+1) + '-' + new Date(maDate.getFullYear(),maDate.getMonth()+1,0).getDate();
			// On va charger via AJAX le tableau filtrée
			affichePageFiltree('<?php echo $dateDebut;?>','<?php echo $dateFin;?>','nonRapprochees');
			
			$('#selectionDate').hide();
			$('.filtre').click(function(e) {
				switch ($(this).attr('id')) {
					case 'optReleveCompte':
						$('#liReleveCompte').attr('class','active');
						$('#liReleveNonRapproche').attr('class','');
						$('#liReleveEcheance').attr('class','');
						$('#optionFiltre').show();
						affichePageFiltree(dateDebut,dateFin,'rapprochees');
						break;
					case 'optReleveNonRapproche':
						$('#liReleveNonRapproche').attr('class','active');
						$('#liReleveCompte').attr('class','');
						$('#liReleveEcheance').attr('class','');
						$('#optionFiltre').hide();
						affichePageFiltree(null,null,'nonRapprochees');
						break;
					case 'optReleveEcheance':
						$('#liReleveEcheance').attr('class','active');
						$('#liReleveNonRapproche').attr('class','');
						$('#liReleveCompte').attr('class','');
						$('#optionFiltre').hide();
						dateDebut= maDate.getFullYear() + '-' + (maDate.getMonth()+1) + '-01';
						dateFin= maDate.getFullYear() + '-' + (maDate.getMonth()+1) + '-' + new Date(maDate.getFullYear(),maDate.getMonth()+1,0).getDate();
						affichePageFiltree(dateDebut,dateFin,'echeances');
						break;
					default:
						break;					
				}
				e.preventDefault();
			});	
			$('input[type=radio]').click(function() {
				
				typeAff= $('input[type=radio]:checked').attr('value');
				switch (typeAff) {
					case '0':
						$('#selectionDate').show();
						$('#affiche').click(function(e) {
							dateDebut = $('#dateDebut').val();
							dateFin = $('#dateFin').val();
							affichePageFiltree(dateDebut,dateFin,'rapprochees');
							e.preventDefault();
						});
						break;
					case '-1':
						$('#selectionDate').hide();
						dateDebut= maDate.getFullYear() + '-' + (maDate.getMonth()) + '-01';
						dateFin= maDate.getFullYear() + '-' + (maDate.getMonth()) + '-' + new Date(maDate.getFullYear(),maDate.getMonth(),0).getDate();
						affichePageFiltree(dateDebut,dateFin,'rapprochees');
						break;
					default:
						$('#selectionDate').hide();
						dateDebut= maDate.getFullYear() + '-' + (maDate.getMonth()+1) + '-01';
						dateFin= maDate.getFullYear() + '-' + (maDate.getMonth()+1) + '-' + new Date(maDate.getFullYear(),maDate.getMonth()+1,0).getDate();
						affichePageFiltree(dateDebut,dateFin,'rapprochees');
						break;
				}
			});	
		});
	});
</script>
