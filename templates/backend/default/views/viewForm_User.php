<?php
// On inclue les paramètres de notre formulaire
fn_template_formDeclare(array(
	'position' => 'debut',
    'Objet' => $user,
	'url' => 'index.php?module=parametre&rubrique=Users',
)); ?>

<div class='row'>
	<?php fn_template_formOnArchive($user->get_FormInput('onArchive')); ?>
</div>

<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class='row'>
            <?php
                fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Utilisateur'));
                    fn_template_formInput($user->get_FormInput('username'));
                    fn_template_formInput($user->get_FormInput('password'));
                    fn_template_formInput($user->get_FormInput('password'));
                    fn_template_formInput($user->get_FormInput('acces'));
                fn_template_cadre(array('position' => 'fin'));
            ?>
            <?php
                fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Identité'));
                    fn_template_formInput($user->get_FormInput('civilite'));
                    fn_template_formInput($user->get_FormInput('nom'));
                    fn_template_formInput($user->get_FormInput('nomJF'));
                    fn_template_formInput($user->get_FormInput('prenom'));
                fn_template_cadre(array('position' => 'fin'));
            ?>
        </div>
	</div>
	<div class="col-md-4 col-sm-4 col-xs-12"><?php
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Avatar')); 
			fn_template_formImagePreview($user->get_FormInput('__Avatar__'));
		fn_template_cadre(array('position' => 'fin'));
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Date de naissance'));
			fn_template_formInput($user->get_FormInput('dateNaissance'));
		fn_template_cadre(array('position' => 'fin'));
		fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Coordonnées'));
			fn_template_formInput($user->get_FormInput('telephone'));
			fn_template_formInput($user->get_FormInput('mobile'));
			fn_template_formInput($user->get_FormInput('email'));
		fn_template_cadre(array('position' => 'fin'));?>
	</div>

</div>

<?php
// On inclue les paramètres de notre formulaire
fn_template_formDeclare(array(
	'position' => 'fin',
	'urlProvenance' => $_SERVER['HTTP_REFERER']
));