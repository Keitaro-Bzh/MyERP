<div class='corps'>
	<div class="container-fluid">
		<!-- Affichage de la partie contenu -->
		<section>
			<article>
				<form class='col-xs-9' method=post action='index.php?module=myCompta&rubrique=Echeance'>
					<?php echo ($monObjet->getValeur('idEcheance')) ? '<input type=hidden name="idEcheance" value=' . $monObjet->getValeur('idEcheance') . '>':"";?>
					<fieldset>
						<label>Type de mouvement</label>
						<?php echo ($monObjet->getValeur('idEcheance')? '<input type=hidden name=typeMouvement value=' . $monObjet->getValeur('typeMouvement') . '>':''); ?>
						<input type=radio class='typeMouvement' name="typeMouvement" value='O' CHECKED <?php echo ($monObjet->getValeur('idEcheance') ? 'DISABLED':'');?>> Operation
						<input type=radio class='typeMouvement' name="typeMouvement" value='V' <?php echo ($monObjet->getValeur('idEcheance')? 'DISABLED':'');?>> Virement
	
						
						<input 
							class='pull-right'
							type='checkbox' 
							name='onArchive' 
							<?php echo ($monObjet->getValeur('onArchive')) ? 'CHECKED' :"";?> 
							><label class='pull-right'>Archivé </label>
					</fieldset>
					
					<fieldset>
						<div class='row center'>
							<div class='col-xs-3'>
							<label>Intégration Automatique </label>
							<input 
								type='checkbox' 
								name='integrationAuto' 
								<?php echo ($monObjet->getValeur('integrationAuto')) ? 'CHECKED' :"";?> 
								>
							</div>
							<div class='col-xs-4'>
							<label>Recalcul écheances non intégrées </label>
							<input 
								type='checkbox' 
								name='recalculEcheancesPassees' 
								<?php echo ($monObjet->getValeur('recalculEcheancesPassees')) ? 'CHECKED' :"";?> 
								>
							</div>
							<div class='col-xs-5'>
							<label>Date échéance Variable (recalcul date opération) </label>
							<input 
								type='checkbox' 
								name='recalculDateEcheances' 
								<?php echo ($monObjet->getValeur('recalculDateEcheances')) ? 'CHECKED' :"";?> 
								>
							</div>
						</div>
						<hr>
						<label for=typePeriode>Periodicité</label>
						<div class="form-control">
							<input type="number" name="nbEntrePeriode" value="<?php echo ($monObjet->getValeur('nbEntrePeriode')) ? $monObjet->getValeur('nbEntrePeriode') :"";?>">
							<select name="typePeriode" >
								<option value="J" <?php echo ($monObjet->getValeur('typePeriode') === 'J') ? 'SELECTED' :"";?>>Jour</option>
								<option value="M" <?php echo ($monObjet->getValeur('typePeriode') === 'M') ? 'SELECTED' :"";?>>Mois</option>
								<option value="A" <?php echo ($monObjet->getValeur('typePeriode') === 'A') ? 'SELECTED' :"";?>>An</option>
							</select>
						</div>						
						<label for=dateDebut>Date de début</label>
						<input
							type="date"
							name="dateDebut"
							id="dateDebut"
							value="<?php echo ($monObjet->getValeur('dateDebut')) ? baseToFormDate($monObjet->getValeur('dateDebut')) : baseToFormDate(date('Y-m-j'));?>"
							class="form-control">
						<label for=dateFin>Date de fin</label>
						<input
							type="date"
							name="dateFin"
							id="dateFin"
							value="<?php echo ($monObjet->getValeur('dateFin') ? baseToFormDate($monObjet->getValeur('dateFin')) : null );?>"
							class="form-control">
					</fieldset>	
					
					<!-- Zone d'affiche du formulaire d'opération ou de virement -->
					<div id='mouvement'></div>
					
					<input 
						type='submit' 
						name='enreg' 
						value=<?php echo ($monObjet->getValeur('idEcheance')) ? 'modifier':'ajouter';?> 
						class="btn btn-success pull-right">
					<button id='retour' class="btn btn-warning pull-right">Retour</button>
				</form>
			</article>
		</section>
	</div>
</div>

<script src="_plugins/myCompta/scripts/myCompta.js"></script>
<script>
	// Fonction pour la gestion du formulaire operation
	function operation() {
		//On charge la zone compte
		idSelected = '<?php echo $monObjet->getValeur('operationIdCompte'); ?>';
        $('#compte').load('_plugins/myCompta/scripts/myCompta.php',{
  			source : 'AJAX',
  			fonction: 'getListeObjet',
  			plugin: 'myCompta',
  			classe: 'Compte',
  			miseEnForme: 'select',
   			idSelected : idSelected,
           	label  : 'Compte', 
           	attrName : 'idCompte'
        });
		
		
		// On charge la zone catégorie
		typeOperation = '<?php echo ($monObjet->getValeur('operationType') ? $monObjet->getValeur('operationType'): 'D'); ?>';
		idCategorieSelected = '<?php echo $monObjet->getValeur('operationIdCategorie'); ?>';
		modeSelected = '<?php echo $monObjet->getValeur('operationMode'); ?>';
        $('#categorie').load('_plugins/myCompta/scripts/myCompta.php',{
  			source : 'AJAX',
  			fonction: 'getListeObjet',
  			plugin: 'myCompta',
  			classe: 'Categorie',
  			miseEnForme: 'select',
   			idSelected : idCategorieSelected,
           	label  : 'Categorie', 
           	attrName : 'idCategorie',
           	typeOperation: typeOperation
        });
		//selectCategorie('myCompta','Categorie', 'operationIdCategorie', idCategorieSelected,'categorie','Categorie',typeOperation);
		afficheModeOperation(typeOperation,'operationMode',modeSelected);
		
		// On efface la zone de ventilation par défaut
		$('#zoneVentilation').html('');
		$('#zoneVentilation').hide('');

		// Fonction pour la gestion du type d'opération
		$('input[name=operationType]:radio').change(function(){
			modeSelected = '<?php echo $monObjet->getValeur('operationMode'); ?>';
	        $('#categorie').load('_plugins/myCompta/scripts/myCompta.php',{
	  			source : 'AJAX',
	  			fonction: 'getListeObjet',
	  			plugin: 'myCompta',
	  			classe: 'Categorie',
	  			miseEnForme: 'select',
	   			idSelected : idCategorieSelected,
	           	label  : 'Categorie', 
	           	attrName : 'idCategorie',
	           	typeOperation: this.value
	        });
			//selectCategorie('myCompta','Categorie', 'operationIdCategorie', idCategorieSelected,'categorie','Categorie',this.value);
			afficheModeOperation(this.value,'operationMode',modeSelected);
		});
	}

	// Fonction pour la gestion du formulaire operation
	function virement() {
		//On charge les zone de comptes
		idCompteEmetteurSelected = <?php echo ($monObjet->getValeur('virementIdCompteEmetteur')) ? "'" . $monObjet->getValeur('virementIdCompteEmetteur') . "'" : 'null'; ?>;
		idCompteDestinataireSelected = <?php echo ($monObjet->getValeur('virementIdCompteDestinataire')) ? "'" . $monObjet->getValeur('virementIdCompteDestinataire') . "'" : 'null'; ?>;

		// Zone Emetteur
        $('#compteEmetteur').load('_plugins/myCompta/scripts/myCompta.php',{
  			source : 'AJAX',
  			fonction: 'getListeObjet',
  			plugin: 'myCompta',
  			classe: 'Compte',
  			miseEnForme: 'select',
   			idSelected : idCompteEmetteurSelected,
           	label  : 'Compte Emetteur', 
           	attrName : 'idCompteEmetteur'
        });

		// Zone Emetteur
        $('#compteDestinataire').load('_plugins/myCompta/scripts/myCompta.php',{
  			source : 'AJAX',
  			fonction: 'getListeObjet',
  			plugin: 'myCompta',
  			classe: 'Compte',
  			miseEnForme: 'select',
   			idSelected : idCompteDestinataireSelected,
           	label  : 'Compte Destinataire', 
           	attrName : 'idCompteDestinataire'
        });
	}

	$(function() {
		// Fonction qui va affiche le tableau au chargement du programme
		$(document).ready(function() {
			messageChargement('mouvements','Chargement du mouvement');
			if ('<?php echo $monObjet->getValeur('typeMouvement'); ?>' == 'V') {
				$('#mouvement').load('_plugins/myCompta/scripts/myCompta.php',{
					fonction: 'echeanceVirement',
					idEcheance : '<?php echo $monObjet->getValeur('idEcheance'); ?>'},virement);
			}
			else {
				$('#mouvement').load('_plugins/myCompta/scripts/myCompta.php',{
					fonction: 'echeanceOperation',
					idEcheance : '<?php echo $monObjet->getValeur('idEcheance'); ?>'},operation);
			}
		});

		$('.typeMouvement').change(function(){
			switch($(this).attr("value")) {
				case 'V':
					messageChargement('mouvements','Chargement du mouvement');
					$('#mouvement').load('_plugins/myCompta/scripts/myCompta.php',{
						fonction: 'echeanceVirement',
						idEcheance : '<?php echo $monObjet->getValeur('idEcheance'); ?>'},virement);
					break;
				case 'O':
					messageChargement('mouvements','Chargement du mouvement');
					$('#mouvement').load('_plugins/myCompta/scripts/myCompta.php',{
						fonction: 'echeanceOperation',
						idEcheance : '<?php echo $monObjet->getValeur('idEcheance'); ?>'},operation);
					break;
				default:
					alert('Erreur');
					break;
			};
		});
	});
</script>
