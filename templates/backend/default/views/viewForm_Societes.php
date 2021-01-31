<?php
// On inclue les paramètres de notre formulaire
fn_template_formDeclare(array(
	'position' => 'debut',
	'Objet' => $monObjet,
	'url' => $_SERVER['HTTP_REFERER'],
)); ?>

<div class='row'>
	<?php fn_template_formOnArchive($monObjet->get_FormInput('onArchive')); ?>
</div>


<div class="row">
	<div class="col-md-4 col-sm-4 col-xs-12">
		<?php
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Photo')); 
		fn_template_formInput($monObjet->get_FormInput('valeur'));
		fn_template_cadre(array('position' => 'fin'));
		?>
	</div>
	<div class="col-md-8 col-sm-8 col-xs-12">
		<?php
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Identité'));
			fn_template_formInput($monObjet->get_FormInput('statut'));
			fn_template_formInput($monObjet->get_FormInput('nom'));
			fn_template_formInput($monObjet->get_FormInput('enseigne'));
		fn_template_cadre(array('position' => 'fin'));
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Identité'));
			fn_template_formInput($monObjet->get_FormInput('telephone'));
			fn_template_formInput($monObjet->get_FormInput('fax'));
			fn_template_formInput($monObjet->get_FormInput('email'));
			fn_template_formInput($monObjet->get_FormInput('url'));
		fn_template_cadre(array('position' => 'fin'));
	fn_template_cadre(array('position' => 'fin'));
	?>
	</div>
</div>

<?php
// On inclue les paramètres de notre formulaire
fn_template_formDeclare(array(
	'position' => 'fin',
	'urlProvenance' => $_SERVER['HTTP_REFERER']
));