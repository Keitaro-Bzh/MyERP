<div class="content">
	<h6>Détails d'un contrat</h6>
	<hr>
	<!-- Affichage de la partie contenu -->
	<div>
		<?php echo ($monObjet->getValeur('idContrat')) ? '<input type=hidden name="idContrat" value=' . $monObjet->getValeur('idContrat') . '>':"";?>
	</div>

	<div class='group optionsAffiche btmspace-15'>
		<div class='four_quarter first'>
		<strong>
			<?php
				echo $monObjet->getValeurClasse('Fournisseur', 'nom');
				echo ($monObjet->getValeurClasse('Fournisseur', 'enseigne')? ' (' . $monObjet->getValeurClasse('Fournisseur', 'enseigne') . ')' : '');
			?>
		</strong>
		</div>
		<div class='four_quarter first'>
			<?php 
				echo ($monObjet->getValeur('libelle')) ? $monObjet->getValeur('libelle') :"";
				switch ($monObjet->getValeur('typeContrat')) {
					case 'abo':
						echo ' (Abonnement service/matériel)';
						break;
					case 'mnt':
						echo ' (Contrat de maintenance)';
						break;
					default:
						break;
				}
			?>
		</div>	
	</div>

		<div class='group'>
			<div class='one_quarter first'>
				<label>Date de signature</label>
			</div>
			<div class='one_quarter'>
				<?php echo ($monObjet->getValeur('dateSignature')) ? $monObjet->getValeur('dateSignature') :"";?>
			</div>
			<div class='one_quarter'>	
				<label>Durée (en mois)</label>
			</div>
			<div class='one_quarter'>
				<?php echo ($monObjet->getValeur('duree')) ? $monObjet->getValeur('duree') :"";?>
			</div>
		</div>

		<div class='group'>
			<hr>
			<div class='one_quarter first'>
				<label>Descriptif</label>
			</div>
			<div class='three_quarter btmspace-10'>
				<?php echo ($monObjet->getValeur('description')) ? $monObjet->getValeur('description') :"";?>
			</div>	
		</div>
		<div class='group'>
			<hr>
			<div class='one_quarter first'>
				<label>Descriptif</label>
			</div>
			<div class='three_quarter btmspace-10'>
				<?php echo ($monObjet->getValeur('description')) ? $monObjet->getValeur('description') :"";?>
			</div>	
		</div>
		
		<div class='right'>
			<input type='submit' name='enreg' value=<?php echo ($monObjet->getValeur('idContrat')) ? 'Modifier':'Ajouter';?> class="btn">
		</div>
</div>
