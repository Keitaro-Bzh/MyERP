<?php
// On inclue les paramètres de notre formulaire
fn_template_formDeclare(array(
	'position' => 'debut',
	'Objet' => $monObjet,
	'url' => 'index.php?module=myContacts&rubrique=Personnes',
)); ?>

<div class='row'>
	<?php fn_template_formOnArchive($monObjet->get_FormInput('onArchive')); ?>
</div>

<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12"><?php
		
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Photo')); 
			fn_template_formImagePreview($monObjet->get_FormInput('Avatar'));
		fn_template_cadre(array('position' => 'fin'));
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Date de naissance'));
			fn_template_formInput($monObjet->get_FormInput('dateNaissance'));
		fn_template_cadre(array('position' => 'fin'));
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Coordonnées'));
			fn_template_formInput($monObjet->get_FormInput('telephone'));
			fn_template_formInput($monObjet->get_FormInput('mobile'));
			fn_template_formInput($monObjet->get_FormInput('email'));
		fn_template_cadre(array('position' => 'fin'));?>
	</div>
	<div class="col-md-8 col-sm-8 col-xs-12">
	<?php
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Identité'));
			fn_template_formInput($monObjet->get_FormInput('civilite'));
			fn_template_formInput($monObjet->get_FormInput('nom'));
			fn_template_formInput($monObjet->get_FormInput('nomJF'));
			fn_template_formInput($monObjet->get_FormInput('prenom'));
		fn_template_cadre(array('position' => 'fin'));

		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Adresse'));
		fn_template_formInput($monObjet->get_FormInput('numVoie'));
		fn_template_formInput($monObjet->get_FormInput('complementVoie'));
		fn_template_formInput($monObjet->get_FormInput('libelleVoie'));
		fn_template_formInput($monObjet->get_FormInput('codePostal'));
		fn_template_formInput($monObjet->get_FormInput('ville'));
	fn_template_cadre(array('position' => 'fin'));
	?>
	</div>
</div>

<?php
// On inclue les paramètres de notre formulaire
fn_template_formDeclare(array(
	'position' => 'fin',
	'urlProvenance' => 'index.php?module=myContacts&rubrique=Personnes'
));