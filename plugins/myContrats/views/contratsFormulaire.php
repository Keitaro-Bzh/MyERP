
<div class="page-title">
	<div class="title_left">
	<h3>EDITION D'UN CONTRAT</h3>
	</div>
</div>
<div class="clearfix"></div>

<form method=post class="form-horizontal form-label-left input_mask" enctype="multipart/form-data" href='index.php?module=myContrats&rubrique=Contrat'>
	<input type=hidden name='formulaire'>
	<input type=hidden name='class' value='Contrat'>
	<input type=hidden name='idUser' value="<?php echo $_SESSION['id']; ?>"/>
	<input type=hidden name='idContrat' value="<?php echo $monObjet->getValeur('idContrat'); ?>"/>

	<div class='row'>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class='row'>
						<div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
							<label for="Statut">Fournisseur</label>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-12 form-group has-feedback">
							<div id="fournisseur"></div>
						</div>
					</div>


					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Type de contrat</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
							<?php 
							// On va construire notre tableau pour créer le champ SELECT
							$tableSelect = array(
								'champCle' => 'typeContrat',
								'listeChoix' => array(
									setArraySelectListe('','----'),
									setArraySelectListe('abo','Abonnement'),
									setArraySelectListe('mnt','Maintenance')
									),
								'champSelected' => $monObjet->getValeur('typeContrat')
							);
							// On va appeler notre fonction de création de SELECT
							selectVariablesCreate($tableSelect) ;
							?>
						</div>
					</div>

					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Libellé Contrat</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
						<input type=text name=libelle class="form-control" value="<?php echo ($monObjet->getValeur('libelle')) ? $monObjet->getValeur('libelle') :"";?>">
						</div>
					</div>

					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Code Client</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
						<input type=text name=codeClient class="form-control" value="<?php echo ($monObjet->getValeur('codeClient')) ? $monObjet->getValeur('codeClient') :"";?>">
						</div>
					</div>

					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Référence Fournisseur</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
						<input type=text name=referenceFournisseur class="form-control" value="<?php echo ($monObjet->getValeur('referenceFournisseur')) ? $monObjet->getValeur('referenceFournisseur') :"";?>">
						</div>
					</div>

					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Référence Interne</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
						<input type=text name=referenceInterne class="form-control" value="<?php echo ($monObjet->getValeur('referenceInterne')) ? $monObjet->getValeur('referenceInterne') :"";?>">
						</div>
					</div>

					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Date de signature</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
						<input type=date name=dateSignature class="form-control" value="<?php echo ($monObjet->getValeur('dateSignature')) ? $monObjet->getValeur('dateSignature') :"";?>">
						</div>
					</div>

					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Durée (en mois)</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
						<input type=text name=duree class="form-control" value="<?php echo ($monObjet->getValeur('duree')) ? $monObjet->getValeur('duree') :"";?>">
						</div>
					</div>

					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Description</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
						<textarea name=description class="form-control"><?php echo ($monObjet->getValeur('description')) ? $monObjet->getValeur('description') :"";?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class='row'>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_content">
					<div class='row'>
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
							<label for="Statut">Contrat (pdf, docx ou jpg)</label>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12 form-group has-feedback">
							<input type=file name=Contrat></input>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		
	<div class="clearfix"></div>
	<button type=submit name="enreg" class="btn btn-info pull-right">Valider</button>   
</form>

<script src="_plugins/myContacts/scripts/myContacts.js"></script>
<script>
$(function() {
	// Fonction qui va affiche le tableau au chargement du programme
	$(document).ready(function() {
		idSelected = <?php echo ($monObjet->getValeur('Fournisseur') && $monObjet->getValeurClasse('Fournisseur','idSociete')) ? "'" . $monObjet->getValeur('idFournisseur') . "'" : 'null'; ?>;
		getSelectMyContacts({classe: 'Societe', nomChamp : 'fournisseur', attrName: 'idFournisseur', valueSelected : idSelected});
	});

})
</script>