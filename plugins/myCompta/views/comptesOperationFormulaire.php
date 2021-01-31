<div class="content three_quarter">
	<h6><strong><?php echo ($monObjet->getValeur('idOperation') > 0 ? 'MODIFICATION' : 'AJOUT'); ?> D'UNE OPERATION</strong></h6>
	<hr>
	
	<form method=post action='index.php?module=myCompta&rubrique=Compte'>
		<input type='hidden' name=idCompte value='<?php echo ($monObjet->getValeur('Compte') ? $monObjet->getValeurClasse('Compte','idCompte') : '6'); ?>'>
		<input type='hidden' name='formulaire' value='Operation'>
		<?php echo ($monObjet->getValeur('idOperation')) ? '<input type=hidden name="idOperation" value=' . $monObjet->getValeur('idOperation') . '>':"";?>
		<?php echo ($monObjet->getValeur('idEcheance')) ? '<input type=hidden name="idEcheance" value=' . $monObjet->getValeur('idEcheance') . '>':"";?>
		
		<div class='group right btmspace-15'>
			<!-- <label class='champ-inline'>Ventilé </label>
			<input class='champ-inline'type='checkbox' name='estVentile' id='ventilation' <?php //echo ($monObjet->getValeur('onArchive')) ? 'CHECKED' :"";?> disabled> -->   
			<label class='champ-inline'>Rapproché </label>
			<input class='champ-inline' type='checkbox' name='estRapproche' <?php echo ($monObjet->getValeur('onArchive')) ? 'CHECKED' :"";?>>
		</div>
		
		<div class='group optionsAffiche btmspace-15'>
			<div class='one_quarter first btmspace-15'>
				<label for='date'>Date </label>
			</div>
			<div class='three_quarter'>
				<input type='date' name='date' id='date' <?php echo ($monObjet->getValeur('date') ? 'value="' . $monObjet->getValeur('date') . '"' :'value="' . date('Y-m-d') . '"');?> class="form-control">
			</div>
			<div class='one_quarter first btmspace-15'>
				<label>Compte</label>
			</div>
			<div class='three_quarter'>
				<div id="compte"></div>
			</div>
			<div class='one_quarter first btmspace-15'>
				<label for='type'>Type d'opération </label>
			</div>
			<div class='three_quarter'>
				<input type='radio' name='type' value='D' class='champ-inline' CHECKED> Débit
				<input type='radio' name='type' value='C' <?php echo ($monObjet->getValeur('type') === 'C') ? 'CHECKED' :'';?> class='champ-inline'> Crédit
			</div>
			<div class='one_quarter first btmspace-15'>
				<label>Mode de paiement</label>
			</div>
			<div class='three_quarter'>
				<div id='mode'></div>
			</div>
			<div class='one_quarter first btmspace-15'>
				<label>Catégorie</label>
			</div>
			<div class='three_quarter'>
				<div id="categorie"></div>
			</div>			
		</div>

		<div class='group btmspace-15'>
			<div class='one_quarter first btmspace-15'>
				<label for='typeTiers'>Tiers </label>
			</div>
			<div class='one_quarter'>
				<label class='champ-inline'></label>
				<select id=typeTiers name=typeTiers class='champ-inline form-control'>
					<option value=''></option>
					<option value=P> Personne</option>
					<option value=S> Société</option>
				</select>
			</div>			

			<div class='two_quarter'>
				<div id="tiers"></div>
			</div>
			
			<div class='one_quarter first btmspace-15'>
				<label for='description'>Description </label>
			</div>
			<div class='three_quarter'>
				<input type='text' name='description' id='description' <?php echo ($monObjet->getValeur('description')) ? 'value="' . $monObjet->getValeur('description') . '"' :"";?> class="form-control">
			</div>
			
			<div class='one_quarter first btmspace-15'>
				<label for='montant'>Montant </label>
			</div>
			<div class='two_quarter'>
				<input type='text' name='montant' id='montant' <?php echo ($monObjet->getValeur('montant')) ? 'value="' . $monObjet->getValeur('montant') .'"' :"";?> class="form-control">
			</div>				
		</div>
		
		<div class='one-line pull-right'>
			<button type='submit' name='enreg' value=<?php echo ($monObjet->getValeur('idOperation')) ? 'Modifier':'Ajouter';?> class="btn pull-right">Valider</button>
			<button id='retour' class="btn btn-warning pull-right">Retour</button>
		</div>
	</form>
</div>


<script src="_plugins/myCompta/scripts/myCompta.js"></script>
<script src="_plugins/myContacts/scripts/myContacts.js"></script>
<script>
function choixTiers() {
	switch ($('#typeTiers').val()) {
		case 'P':
			//On charge la zone Tiers correspondant à une personne
			idTiers = <?php echo ($monObjet->getValeur('Tiers')) ? "'" . $monObjet->getValeurClasse('Personne','idPersonne') . "'" : 'null'; ?>;
			getSelectMyContacts({classe: 'Personne', nomChamp: 'tiers', valueSelected: idTiers, attrName: 'idTiers'});
			break;
		case 'S':
			//On charge la zone Tiers correspondant à une personne
			idTiers = <?php echo ($monObjet->getValeur('Tiers')) ? "'" . $monObjet->getValeurClasse('Personne','idPersonne') . "'" : 'null'; ?>;
			getSelectMyContacts({classe: 'Societe', nomChamp: 'tiers', valueSelected: idTiers, attrName: 'idTiers'});
			break;	
		default:
			$('#tiers').html('<input type=text placeholder=\'Nom du bénéficiaire\' name=\'beneficiaire\' <?php echo ($monObjet->getValeur('beneficiaire')) ? 'value="' . $monObjet->getValeur('beneficiaire') . '"' :"";?> class="form-control" >');
			break;	
	};
}
$(function() {
	// Fonction qui va gérer l'affichage d'une personne/société au niveau du tiers
	$('#typeTiers').change(function() {
		choixTiers();
	});

	// Fonction pour la gestion du type d'opération
	$('input[name=type]:radio').change(function(){
		getSelectMyCompta({classe: 'Categorie', nomChamp: 'categorie', valueSelected: idCategorieSelected});
		afficheModeOperation(this.value,'mode');
	});

	// Fonction qui va affiche le tableau au chargement du programme
	$(document).ready(function() {
		//On charge la zone compte
		idSelected = <?php echo ($monObjet->getValeur('Compte')) ? "'" . $monObjet->getValeurClasse('Compte', 'idCompte') . "'" : 6; ?>;
		getSelectMyCompta({classe: 'Compte', nomChamp: 'compte', valueSelected: idSelected});
				
		// On charge la zone catégorie
		typeOperation = <?php echo ($monObjet->getValeur('type')) ? "'" . $monObjet->getValeur('type') . "'" : "'D'"; ?>;
		idCategorieSelected = <?php echo ($monObjet->getValeur('Categorie')) ? "'" . $monObjet->getValeurClasse('Categorie','idCategorie') . "'" : "null"; ?>;
		getSelectMyCompta({classe: 'Categorie', nomChamp: 'categorie', valueSelected: idCategorieSelected, specifiqueFiltre: typeOperation});


        // On affiche les type de paiement selon le type d'opération
        modeSelected = <?php echo ($monObjet->getValeur('mode')) ? "'" . $monObjet->getValeur('mode') . "'" : "null"; ?>;
		numCheque = <?php echo ($monObjet->getValeur('numCheque')) ? "'" . $monObjet->getValeur('numCheque') . "'" : "null"; ?>;
		afficheModeOperation(typeOperation,'mode',modeSelected,numCheque);

		choixTiers();
	});	
});
</script>
