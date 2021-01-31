<div class="content three_quarter">		
	<h6><strong>GESTION DES BANQUES</strong></h6>

	<hr />
	<div id='liste'>
		<?php 
			// On va créer notre tableau
			if (!isset($_GET['action'])) {
				creationTableau($argsTableau);
			}
			else {
				if ($_GET["action"] !== 'ajout' AND $_GET["action"] !== 'modif') {
					creationTableau($argsTableau);
				}
			}
		?>
	</div>
	<div id='formulaire' class='formulaire'>
		<form method=post action='index.php?module=myCompta&rubrique=Parametres&referentiel=Banque'>
			<?php echo ($monObjet->getValeur('idBanque')) ? '<input type=hidden name="idBanque" value=' . $monObjet->getValeur('idBanque') . '>':"";?>
			<input type=hidden name=formulaire value=Banque>

			<div class='group optionsAffiche  right btmspace-15'>
				<label for='archive' class='champ-inline'>Archivé </label>
				<input type='checkbox' name='onArchive' id='archive' <?php echo ($monObjet->getValeur('onArchive')) ? 'CHECKED' :"";?> class="champ-inline">
			</div>

			<div class='one_quarter first btmspace-15'>
				<label for='nom'>Nom </label>
			</div>
			<div class='three_quarter'>
				<input type='text' name='nomBanque' id='nom' <?php echo ($monObjet->getValeur('nomBanque')) ? 'value="' . $monObjet->getValeur('nomBanque') . '"' :"";?> class="form-control long80">
			</div>

			<hr>
			<div class='one_quarter first btmspace-15'>
				<label for='telephone'>Téléphone </label>
			</div>
			<div class='three_quarter'>
				<input type='tel' name='telephone' id='telephone' placeholder="ex: (+33) 612345678" <?php echo ($monObjet->getValeur('telephone')) ? 'value="' . $monObjet->getValeur('telephone') . '"' :"";?> class="form-control">
			</div>
			<div class='one_quarter first btmspace-15'>
				<label for='email'>Email </label>
			</div>
			<div class='three_quarter'>
				<input type='email' name='email' id='email' placeholder="ex: contact@myerp.com" <?php echo ($monObjet->getValeur('email')) ? 'value="' . $monObjet->getValeur('email') . '"' :"";?> class="form-control"><br />
			</div>


			<hr>
			<div class='one_quarter first btmspace-15'>
				<label for='url'>URL </label>
			</div>
			<div class='three_quarter btmspace-15'>
				<input type='text' name='url' id='url' placeholder="ex: https://www.boursorama.com" <?php echo ($monObjet->getValeur('url')) ? 'value="' . $monObjet->getValeur('url') . '"' :"";?> class="form-control">
			</div>
			
			<div class='one-line pull-right'>
					<button type='submit' name='enreg' class="btn btn-success"><?php echo ($monObjet->getValeur('idBanque')) ? 'Modifier':'Ajouter';?></button>
					<button id='retour' class="btn btn-warning pull-right">Retour</button>
			</div>
		</form>
	</div>
</div>

<script>
	// Fonction pour la gestion du formulaire operation
	function formulaire(afficheFormulaire) {
		if (afficheFormulaire == '1') {
			$('#liste').hide();
			$('#formulaire').show();
		}
		else {
			$('#formulaire').hide();
			$('#liste').show();
		}
	}

	$(function() {

		// Fonction qui va affiche le tableau au chargement du programme
		$(document).ready(function() {
			afficheFormulaire = <?php echo ((isset($_GET['action']) OR $monObjet->getValeur('idBanque')) ? '1' : '0'); ?>;
			formulaire(afficheFormulaire);

			$('#supprime').click(function(e) {
				e.preventDefault();
			});
		});
	});



</script>
