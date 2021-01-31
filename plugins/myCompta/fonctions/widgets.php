<?php

/* Nous allons voir quel widget est appelé
 * et charger la fonction correspondante

if (isset($_POST['widget'])) {
	switch ($_POST['widget']) {
		case 'echeances' :
			listeEcheances();
			break;
		case 'listeCompte' :
			listeCompte();
			break;
		case 'compteDefaut' :
			$GLOBALS['root'] = '../../../';
			afficheCompte();
			break;
		default:
			break;
	}
} */

function listeEcheances() { ?>
	<div class="widget">
	<h4>Echéances des 30 prochains jours</h4>
	<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/_frameworks/myFramework/fonctions/fn_myERP.php';
	
	/* On va contruire notre demande de tableau d'échéances
	 * puis récupérer notre tableau d'échéance
	 */
	$argsEcheance = array (
			'idCompte' => '',
			'dateDebut' => date('Y-m-d'),
			'dateFin' => date('Y-m-d', strtotime(date('Y-m-d').' + 30 day'))
	);
	$maListeEcheance = funcGetListeEcheances($argsEcheance);
	/* on va créer notre tableau regroupant nos différents comptes pour lesquels
	 * il y a une échéance
	 */
	foreach ($maListeEcheance as $echeance) {
		$tableCompte[$echeance['idCompte']] = new Compte(array('idObjet' => $echeance['idCompte']));
	}
	// On affiche nos résulats
	foreach ($tableCompte as $objetCompte) { 
		?>
			<p>
				<strong><?php echo $objetCompte->getValeur('nomBanque'); ?> - <?php echo $objetCompte->getValeur('libelleCompte'); ?></strong>
			</p>
	
				<table style="width:100%">
					<tr>
						<th>Date</th>
						<th>Objet</th>
						<th>Montant</th>
					</tr>
					<?php foreach ($maListeEcheance as $detailEcheance) { 
						if ($detailEcheance['idCompte'] === $objetCompte->getValeur('idCompte')) {
						?>
						<tr>
							<td style="width:20%"><?php echo baseToFormDate($detailEcheance['echeanceDate']); ?></td>
							<td style="width:60%"><?php echo $detailEcheance['description']; ?></td>
							<td style="width:20%">
								<span class="pull-right <?php echo ($detailEcheance['operationType'] === 'D' ? "debit" : "credit"); ?>">
									<?php echo number_format($detailEcheance['montant'], 2,'.',''); ?> €
								</span>
							</td>
							
						</tr>
						<?php }
					}	?> 
				</table>
	
		<?php }	?>
	</div>
<?php }



 
function afficheCompte ($idCompte =  null) {
	// On va inclure notre classe
	require_once $_SERVER['DOCUMENT_ROOT'] . '/_plugins/myCompta/class/Compte.php';
	if ($idCompte) {
		$afficheLibelle = true;
	}
	else {
		$afficheLibelle =false;
	}
	if (! $idCompte) {
		/* On va récupérer les paramètres du site par défaut
		 * si aucun paramètre n'est renseigné
		 */
		require_once $_SERVER['DOCUMENT_ROOT'] . '/_frameworks/myFramework/class/MyBDD.php';
		$maConnexion = new MyBDD();
		$maConnexion = $maConnexion->getConnexion();
		$requete = "SELECT idCompteDefaut FROM _param";
		$donnees = $maConnexion->query($requete);
		$idCompte = $donnees->fetch()[0];
	}

	$monCompte = new Compte(array('idObjet'=>$idCompte));
	?>
	<div class="widget">
		<?php echo  ($afficheLibelle) ? '' : '<h4>Compte Principal</h4>'; ?>
		<strong><a href="index.php?module=myCompta&rubrique=Compte&idCompte=<?php echo $idCompte; ?>"><?php echo $monCompte->getValeur('libelleCompte'); ?></a></strong>
		<ul>
			<li>Solde rapproché : <span class="pull-right <?php echo ((int)$monCompte->getValeur('soldeCours') >= 0 ? "credit": "debit");  ?>"><?php echo $monCompte->getValeur('soldeCours'); ?> €</span>
			<li>Solde réel : <span class=" pull-right <?php echo ((int)$monCompte->getValeur('soldeReel') >= 0 ? "credit": "debit"); ?>"><?php echo $monCompte->getValeur('soldeReel'); ?> €</span>
		</ul>
	</div>
	
	<?php
}