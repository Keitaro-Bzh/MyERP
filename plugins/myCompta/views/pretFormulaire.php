<div class="content">
	<!-- Affichage de la partie contenu -->
	<form method=post action='index.php?module=myCompta&rubrique=Pret'>
		<input type=hidden name='formulaire' />
		<div>
			<?php echo ($monObjet->getValeur('idPret')) ? '<input type=hidden name="idPret" value=' . $monObjet->getValeur('idPret') . '>':"";?>
		</div>

		<div class='group optionsAffiche btmspace-15'>
			<div class='one_quarter first'>
				<label>Libellé Prêt</label>
			</div>
			<div class='three_quarter btmspace-10'>
				<input type=text name=libelle class="form-control" value="<?php echo ($monObjet->getValeur('libelle')) ? $monObjet->getValeur('libelle') :"";?>">
			</div>	
			<div class='one_quarter first'>
				<label>Compte</label>
	
			</div>
			<div class='two_quarter btmspace-10'>
				<div id="compte"></div>
			</div>	
	
			<div class='one_quarter first'>
				<label>Type d'emprumt</label>
			</div>
			<div class='two_quarter'>
				<select name='typeEmprunt' class="form-control">
					<option value="immo" <?php echo ($monObjet->getValeur('typeEmprunt') === 'immo') ? "SELECTED" :"";?>>Immobilier</option>
					<option value="conso" <?php echo ($monObjet->getValeur('typeEmprunt') === 'conso') ? "SELECTED" :"";?>>Consommation</option>
				</select>
			</div>
		</div>

		<div class='group btmspace-15'>
			<div class='one_quarter first btmspace-15'>
				<label>Somme empruntée</label>
			</div>
			<div class='one_quarter'>
				<input type=text name=montantEmprunt class="form-control" value="<?php echo ($monObjet->getValeur('montantEmprunt')) ? $monObjet->getValeur('montantEmprunt') :"";?>">
			</div>
			<div class='one_quarter'>	
				<label>Durée (en mois)</label>
			</div>
			<div class='one_quarter'>
				<input type=text name=dureePret class="form-control" value="<?php echo ($monObjet->getValeur('dureePret')) ? $monObjet->getValeur('dureePret') :"";?>">
			</div>
			<div class='one_quarter first btmspace-15'>
				<label>Taux de base</label>
			</div>
			<div class='one_quarter'>
				<input type=text name=tauxBase class="form-control" value="<?php echo ($monObjet->getValeur('tauxBase')) ? $monObjet->getValeur('tauxBase') :"";?>">
			</div>
			<div class='one_quarter'>
				<label>TEAG</label>
			</div>
			<div class='one_quarter'>
				<input type=text name=TEAG class="form-control" value="<?php echo ($monObjet->getValeur('TEAG')) ? $monObjet->getValeur('TEAG') :"";?>">
			</div>
			<div class='one_quarter first btmspace-15'>
				<label>Date Signature</label>
			</div>
			<div class='one_quarter'>
				<input type=date name=dateSignature class="form-control" value="<?php echo ($monObjet->getValeur('dateSignature')) ? $monObjet->getValeur('dateSignature') :"";?>">
			</div>
			<div class='one_quarter'>
				<label>Date 1ere Echéance</label>
			</div>
			<div class='one_quarter'>
				<input type=date name=date1erEcheance class="form-control" value="<?php echo ($monObjet->getValeur('date1erEcheance')) ? $monObjet->getValeur('date1erEcheance') :"";?>">
			</div>
			<div class='one_quarter first'>
				<label>Montant assurance</label>
			</div>
			<div class='one_quarter'>
				<input type=text name=montantAssurance class="form-control" value="<?php echo ($monObjet->getValeur('montantAssurance')) ? $monObjet->getValeur('montantAssurance') :"";?>">
			</div>
			<div class='one_quarter'>
				<label>Lissage</label>
			</div>
			<div class='one_quarter'>
				<select id='nbPalier' name='nbPalier' class='form-control'>
					<option value='1'>Aucun</option>
					<option value='2'>1 palier</option>
					<option value='2'>2 paliers</option>
				</select>
			</div>

		</div>
	
		<div id='palier' class='group btmspace-15'>
			<hr>			
			<div class='four_quarter'>
				<strong><em>Détails du lissage</em></strong>
			</div>
			<hr>
			<div class='one_quarter first btmspace-15'>
				<label>Mensualité</label>
			</div>
			<div class='one_quarter'>
				<input type=text class='form-control'>
			</div>
			<div class='one_quarter'>
				<label>Nombre</label>
			</div>
			<div class='one_quarter'>
				<input type=text class='form-control'>
			</div>
		</div>		

		
		<div class='right'>
			<input type='submit' name='enreg' value=<?php echo ($monObjet->getValeur('idPret')) ? 'Modifier':'Ajouter';?> class="btn">
		</div>
	</form>
</div>

<script src="_plugins/myCompta/scripts/myCompta.js"></script>
<script>
$(function() {
	$('#nbPalier').change(function() {
		switch ($(this).val()) {
		case '2':
			$('#palier').show();
			alert('1 palier');
			break;
		case '3':
			$('#palier').show();
			alert('2paliers');
			break;
			default: 
				$('#palier').hide();
				break;
		};
	});

	// Fonction qui va affiche le tableau au chargement du programme
	$(document).ready(function() {
		$('#palier').hide();
		//On charge la zone compte
		idSelected = <?php echo ($monObjet->getValeur('Compte') && $monObjet->getValeurClasse('Compte','idCompte')) ? "'" . $monObjet->getValeur('idCompte') . "'" : 'null'; ?>;
		getSelectMyCompta({ classe : 'Compte',	nomChamp: 'compte',	valueSelected : idSelected });
	});

})
</script>