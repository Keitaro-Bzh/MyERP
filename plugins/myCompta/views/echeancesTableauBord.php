<div class='four_quarter first'>
	<div class='group'>
		<h6><strong>GESTION DES ECHEANCES</strong></h6>
	</div>

	<div class='group'>
		<div class='btmspace-10 group'>
			<hr>
			<strong>ABONNEMENTS/CONTRATS</strong>
			<a href="index.php?module=myFichiers&rubrique=Contrat&action=ajout">
				<button type="button" class="btn btn-success pull-right"><span class='glyphicon glyphicon-plus'></span> CONTRAT/ABONNEMENT</button>
			</a>
		</div>
		<div class='four_quarter first'>
		<?php if ($tabEcheanceContrat) { ?>
				<table>
					<tr>
						<th>Date début</th>
						<th>Date fFin</th>
						<th>Date prochaine échéance</th>
						<th>Tiers</th>
						<th>Description</th>
						<th>Montant</th>
						<th>Options</th>
					</tr>
					<?php
					foreach ($tabEcheanceContrat as $contrat) { ;?>
						<tr>
							<td><?php //echo baseToFormDate($pretEcheance->getValeur('dateDebut')); ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php //echo $pretEcheance->getValeur('description'); ?></td>
							<td><?php //echo $pretEcheance->getValeur('montant'); ?></td>
						</tr>
					<?php } ?>
				</table>
			<?php } else { ?>
				<div class='center'>
					<hr>
					<strong>Pas de contrats/abonnements en cours</strong>
				</div>
			<?php } ?>
		</div>
	</div>

	<div class='group'>
		<div class='btmspace-10 group'>
			<hr>
			<strong>MOUVEMENTS RECCURENTS</strong>
			<a href="index.php?module=myCompta&rubrique=Echeance&objet=ajout">
				<button type="button" class="btn btn-success pull-right"><span class='glyphicon glyphicon-plus'></span> OPERATION</button>
			</a>
			<a href="index.php?module=myCompta&rubrique=Echeance&action=ajout">
				<button type="button" class="btn btn-success pull-right"><span class='glyphicon glyphicon-plus'></span> VIREMENT INTERNE</button>
			</a>
		</div>
		<div class='four_quarter first'>
		<?php if ($tabEcheanceContrat) { ?>
			<table>
				<tr>
					<th>Date début</th>
					<th>Date fFin</th>
					<th>Date prochaine échéance</th>
					<th>Tiers</th>
					<th>Description</th>
					<th>Montant</th>
					<th>Options</th>
				</tr>
				<?php
				foreach ($tabEcheanceContrat as $contrat) { ;?>
					<tr>
						<td><?php //echo baseToFormDate($pretEcheance->getValeur('dateDebut')); ?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php //echo $pretEcheance->getValeur('description'); ?></td>
						<td><?php //echo $pretEcheance->getValeur('montant'); ?></td>
					</tr>
				<?php } ?>
			</table>
		<?php } else { ?>
			<div class='center'>
				<hr>
				<strong>Pas de mouvement réccurents en cours</strong>
			</div>
		<?php } ?>
	</div>
		</div>
	</div>
	
	<div class='group'>
		<div class='btmspace-10 group'>
			<hr>
			<strong>PRETS BANCAIRES</strong>
			<a href="index.php?module=myCompta&rubrique=Pret&action=ajout">
				<button type="button" class="btn btn-success pull-right"><span class='glyphicon glyphicon-plus'></span> PRET</button>
			</a>
		</div>
		<div class='four_quarter first'>
			<?php if ($tabEcheancePret) { ?>
				<table>
					<tr>
						<th>Date Echéance</th>
						<th>Date fin</th>
						<th>Libellé</th>
						<th>Mensualité</th>
					</tr>
					<?php
					
					foreach ($tabEcheancePret as $pretEcheance) { ;?>
						<tr>
							<td><?php echo baseToFormDate($pretEcheance->getValeur('dateDebut')); ?></td>
							<td></td>
							<td><?php echo $pretEcheance->getValeur('description'); ?></td>
							<td><?php echo $pretEcheance->getValeur('montant'); ?></td>
						</tr>
					<?php } ?>
				</table>
			<?php } else { ?>
				<div class='center'>
					<hr>
					<strong>Pas de prêts en cours</strong>
				</div>
			<?php } ?>
		</div>
	</div>					

</div>