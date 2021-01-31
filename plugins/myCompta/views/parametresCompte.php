<div class="content three_quarter">
	<!-- Affichage de la partie contenu -->
	<div id='titre'>
		<h6><strong>GESTION DES COMPTES</strong></h4>
		<hr />
	</div>
	
	<div id='liste'>
		<?php 
			// On va créer notre tableau
			if (!isset ($_GET['action'])) {
				creationTableau($argsTableau);
			}
		?>
	</div>

	<div id=formulaire>
		<form method=post action='<?php echo $urlBase; ?>'>
			<input type=hidden name=formulaire value=Compte>
			<?php echo ($monObjet->getValeur('idCompte')) ? '<input type=hidden name="idCompte" value=' . $monObjet->getValeur('idCompte') . '>':"";?>
			
			<div class='group optionsAffiche  right btmspace-15'>
				<label for='archive' class='champ-inline'>Archivé </label>
				<input type='checkbox' name='onArchive' id='archive' <?php echo ($monObjet->getValeur('onArchive')) ? 'CHECKED' :"";?> class="champ-inline">
				<br />
				<label for='comptePrincipal' class='champ-inline'>Compte Principal </label>
				<input type='checkbox' name='comptePrincipal' id='comptePrincipal' <?php echo ($monObjet->getValeur('comptePrincipal')) ? 'CHECKED' :"";?> class="champ-inline">
			</div>

			
			<div class='one_quarter first btmspace-15'>
				<label for='libelleCompte'>Banque</label>
			</div>
			<div id=banque class='two_quarter'></div>

			<div class='one_quarter first btmspace-15'>
				<label for='libelleCompte'>Libellé</label>
			</div>
			<div class='two_quarter'>
				<input type='text' name='libelleCompte' id='libelleCompte' <?php echo ($monObjet->getValeur('libelleCompte')) ? 'value="' . $monObjet->getValeur('libelleCompte') . '"' :"";?> class="form-control" REQUIRED>
			</div>
			
			<div class='one_quarter first btmspace-15'>
				<label for='libelleCompte'>Titulaire</label>
			</div>
			<div id=titulaire class='two_quarter'></div>

			
			<div class='one_quarter first btmspace-15'>
				<label for='soldeInitial'>Solde initial </label>
			</div>
			<div class='two_quarter btmspace-15'>		
				<div class="input-group">
					<input type='text' name='soldeInitial' id='soldeInitial' <?php echo ($monObjet->getValeur('soldeInitial')) ? 'value="' . $monObjet->getValeur('soldeInitial') . '"' :"0.00";?> class="form-control">
					<span class="input-group-addon"> €</span>
				</div>		
			</div>
			
			<div class='one-line pull-right'>
					<button type='submit' name='enreg' class="btn btn-success"><?php echo ($monObjet->getValeur('idCompte')) ? 'Modifier':'Ajouter';?></button>
					<button id='retour' class="btn btn-warning pull-right">Retour</button>
			</div>
		</form>
	</div>
</div>

<script src='/_plugins/myCompta/scripts/myCompta.js'></script>
<script src='/_plugins/myContacts/scripts/myContacts.js'></script>
<script>
	// Fonction pour la gestion du formulaire operation
	function formulaire(afficheFormulaire) {
		if (afficheFormulaire == '1') {
			$('#liste').hide();
			//On charge la zone Banque
			idBanque = <?php echo ($monObjet->getValeur('idBanque')) ? "'" . $monObjet->getValeur('idBanque') . "'" : 'null'; ?>;
			getSelectMyCompta({classe: 'Banque', nomChamp: 'banque', valueSelected: idBanque, attrName: 'idBanque'});

			//On charge la zone Titulaire
			idTitulaire = <?php echo ($monObjet->getValeur('idTitulaire')) ? "'" . $monObjet->getValeur('idTitulaire') . "'" : 'null'; ?>;
			getSelectMyContacts({classe: 'Personne', nomChamp: 'titulaire', valueSelected: idTitulaire, attrName: 'idTitulaire'});
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
			afficheFormulaire = <?php echo ((isset($_GET['action']) OR $monObjet->getValeur('idCompte')) ? '1' : '0'); ?>;
			formulaire(afficheFormulaire);
		});
	});
</script>
