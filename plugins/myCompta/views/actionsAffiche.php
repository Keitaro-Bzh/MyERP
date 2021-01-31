<div class="content">
	<h6>Détails d'un pret bancaire</h6>
	<hr>
	<div class='group optionsAffiche'>
		<input type=hidden name="idPret" value='<?php echo $monObjet->getValeur('idPret'); ?>'>
		<div class='four_quarter first'>
			<strong><?php echo $monObjet->getValeurClasse('Compte','nomBanque'); ?> - <?php echo $monObjet->getValeurClasse('Compte','libelleCompte'); ?></strong><br>
		</div>
		<div class='two_quarter first'>
			<em><?php echo ($monObjet->getValeur('libelle')) ? $monObjet->getValeur('libelle') :"";?></em>
		</div>
		<div class='two_quarter right'>
			<strong class='champ-inline'>Type <?php echo ($monObjet->getValeur('typeEmprunt') === 'immo') ? "IMMOBILIER" :"CONSOMMATION";?></strong>
		</div>
	</div>
		
	<div class='group'>
		<hr>
		<div class='one_quarter first right'>
			<em>Date Signature :</em>
		</div>
		<div class='one_quarter'>
			<strong><?php echo ($monObjet->getValeur('dateSignature')) ? baseToFormDate($monObjet->getValeur('dateSignature')) :"";?></strong>
		</div>
		<div class='one_quarter'>
			<em>Date 1ere échéance: </em>
		</div>
		<div class='one_quarter'>
			<strong><?php echo ($monObjet->getValeur('date1erEcheance')) ? $monObjet->getValeur('date1erEcheance') :"";?></strong>
		</div>
	</div>
	
	<div class='group'>
		<hr>
		<div class='two_quarter first'>
		
			<table>
				<tr>
					<td>Montant emprunté</td>
					<td class='td150 right'><?php echo ($monObjet->getValeur('montantEmprunt')) ? $monObjet->getValeur('montantEmprunt') :"";?></td>
				</tr>
				<tr>
					<td>Taux de base</td>
					<td class='td150 right'><?php echo ($monObjet->getValeur('tauxBase')) ? $monObjet->getValeur('tauxBase') :"";?> %</td>
				</tr>
				<tr>
					<td>TEAG</td>
					<td class='td150 right'><?php echo ($monObjet->getValeur('TEAG')) ? $monObjet->getValeur('TEAG') :"";?> %</td>
				</tr>
				<tr>
					<td>Durée (en mois)</td>
					<td class='td150 right'><?php echo ($monObjet->getValeur('dureePret')) ? $monObjet->getValeur('dureePret') :"";?></td>
				</tr>
			</table>
		</div>
		<div class='two_quarter'>
			<table>
				<tr>
					<td>Montant mensualité</td>
					<td></td>
				</tr>
				<tr>
					<td>Montant assurance</td>
					<td class='td150 right'><?php echo ($monObjet->getValeur('montantAssurance')) ? $monObjet->getValeur('montantAssurance') :"";?></td>
				</tr>
				<tr>
					<td>Capital restant</td>
					<td class='td150 right'></td>
				</tr>
			</table>
		</div>
	</div>
	<div class='group echeancier center btmspace-15'>
		<hr>
		<?php  if ($monObjet->getValeur('PretEcheancier') === null) { ?>
			<button class='btn btn-success'>Générer le tableau d'amortissement</button>
		<?php } else { ?>
			<div class='center btmspace-10'><strong>TABLEAU D'AMORTISSEMENT</strong></div>
			<table>
				<tr>
					<th class='td100 center'>Echeance</th>
					<th class='center'>Date</th>
					<th class='center'>Mensualité</th>
					<th class='center'>Capital</th>
					<th class='center'>Assurance</th>
					<th class='center'>Intérêts</th>
					<th class='td100 center'>Rapproché</th>
				</tr>
				<?php
				$numEcheance = 1;
				foreach ($monObjet->getValeur('PretEcheancier') as $echeance) { ?>
				<tr>
					<td class='center'><?php echo $numEcheance; ?></td>
					<td class='center'><?php echo baseToFormDate($echeance->getValeur('dateEcheance')); ?></td>
					<td class='right'><?php echo $echeance->getValeur('montantEcheance'); ?></td>
					<td class='right'><?php echo $echeance->getValeur('montantCapital'); ?></td>
					<td class='right'><?php echo $echeance->getValeur('montantAssurance'); ?></td>
					<td class='right'><?php echo $echeance->getValeur('montantInteret'); ?></td>
					<td class='center'></td>
				</tr>
				<?php
				$numEcheance++;
				} ?>
			</table> 
		<?php } ?>		
	</div>
	
	<div class='right'>
		<a href='index.php?module=myCompta&rubrique=Pret'><button id='retour' class="btn btn-warning pull-right">Retour</button></a>
	</div>
</div>
