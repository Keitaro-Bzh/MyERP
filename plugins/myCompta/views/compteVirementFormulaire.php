<div class="content three_quarter">
	<h6><strong><?php echo ($monObjet->getValeur('idVirement') > 0 ? 'MODIFICATION' : 'AJOUT'); ?> D'UN VIREMENT</strong></h6>
	<hr>
	
	<form method=post action='index.php?module=myCompta&rubrique=Compte'>
		<input type='hidden' name='formulaire' value='Virement'>
		<?php echo ($monObjet->getValeur('idVirement')) ? '<input type=hidden name="idOperation" value=' . $monObjet->getValeur('idVirement') . '>':"";?>
		<?php echo ($monObjet->getValeur('idEcheance')) ? '<input type=hidden name="idEcheance" value=' . $monObjet->getValeur('idEcheance') . '>':"";?>
		
		<div class='group right btmspace-15'>
			<label class='champ-inline'>Rapproché </label>
			<input class='champ-inline' type='checkbox' name='onArchive' <?php echo ($monObjet->getValeur('onArchive')) ? 'CHECKED' :"";?>>
		</div>
		
		<div class='group optionsAffiche btmspace-15'>
			<div class='one_quarter first btmspace-15'>
				<label for='date'>Date </label>
			</div>
			<div class='one_quarter'>
				<input type='date' name='date' id='date' <?php echo ($monObjet->getValeur('date')) ? 'value=' . baseToFormDate($monObjet->getValeur('date')) :'value=' . date('d-m-Y');?> class="form-control">
			</div>

			<div class='one_quarter first btmspace-15'>
				<label for='type'>Compte Emetteur </label>
			</div>
			<div class='two_quarter'>
				<div id="compteEmetteur"></div>
			</div>
			<div class='one_quarter first btmspace-15'>
				<label>Compte Destinataire</label>
			</div>
			<div class='two_quarter'>
				<div id="compteDestinataire"></div>
			</div>
			<div class='one_quarter first btmspace-15'>
				<label>Montant</label>
			</div>
			<div class='one_quarter'>
				<input type='text' name='montant' id='montant' <?php echo ($monObjet->getValeur('montant')) ? 'value=' . $monObjet->getValeur('montant') :"";?> class="form-control">
			</div>	
			<div class='one_quarter first btmspace-15'>
				<label>Description</label>
			</div>
			<div class='three_quarter'>
				<input type='text' name='description' id='description' value="<?php echo ($monObjet->getValeur('description') ? $monObjet->getValeur('description') : 'Transfert de fonds');?>" class="form-control">
			</div>		
		</div>
		
		<div class='one-line pull-right'>
			<button type='submit' name='enreg' value=<?php echo ($monObjet->getValeur('idVirement')) ? 'Modifier':'Ajouter';?> class="btn pull-right">Valider</button>
			<button id='retour' class="btn btn-warning pull-right">Retour</button>
		</div>
	</form>

</div>

<script src="_plugins/myCompta/scripts/myCompta.js"></script>
<script>
$(function() {
	// Fonction qui va affiche le tableau au chargement du programme
	$(document).ready(function() {
		//On charge les zone de comptes
		idCompteEmetteurSelected = <?php echo ($monObjet->getValeur('idCompteEmetteur')) ? "'" . $monObjet->getValeur('idCompteEmetteur') . "'" : $compteID; ?>;
		idCompteDestinataireSelected = <?php echo ($monObjet->getValeur('idCompteDestinataire')) ? "'" . $monObjet->getValeur('idCompteDestinataire') . "'" : $compteID; ?>;

		// Zone Emetteur
		getSelectMyCompta({classe: 'Compte', nomChamp: 'compteEmetteur',	valueSelected: idCompteEmetteurSelected, attrName: 'idCompteEmetteur'});

		// Zone Emetteur
		getSelectMyCompta({classe: 'Compte', nomChamp: 'compteDestinataire', valueSelected: idCompteDestinataireSelected, attrName: 'idCompteDestinataire'});
	});	
});
</script>