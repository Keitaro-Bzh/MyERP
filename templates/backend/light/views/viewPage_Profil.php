<?php 
	fn_template_cadre(array('position' => 'debut', 'titre' => 'Gestion de votre profil')); 
		fn_template_cadre(array('position' => 'debut', 'titre' => 'Détails de votre profil')); ?>
		<div class="dropdown js__drop_down">
			<a href="#" class="btn btn-danger btn-xs " onclick="$dialog.showModal()"></button><i class='fa fa-key'></i> Modifier le mot de passe</a>
		</div>
		<?php fn_template_formDeclare(array(
			'position' => 'debut',
			'Objet' => $monObjet
		)); ?>
		<div class="col-md-4 col-sm-4 col-xs-12 text-center">
			<div class='row clearfix text-center margin-bottom-10'>
				<p>
					<strong><?php echo $monObjet->get_Valeur('username'); ?></strong>
					(<?php echo ($_SESSION['niveauAccesGeneral'] === 9 ? 'Administrateur global' : 'Utilisateur standard'); ?>)<br />
				</p>
			</div>
			<?php fn_template_formImagePreview($monObjet->get_FormInput('avatar')); ?>
		</div>
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class='row'>
			<?php
				fn_template_formInput($monObjet->get_FormInput('acces'));
				fn_template_formInput($monObjet->get_FormInput('email'));
				fn_template_formInput($monObjet->get_FormInput('template'));
			?>
			</div>
		</div>
		<?php 
		// On inclue les paramètres de notre formulaire
		fn_template_formDeclare(array(
			'position' => 'fin',
		));
	fn_template_cadre(array('position' => 'fin'));
fn_template_cadre(array('position' => 'fin'));

// On déclare notre script JS/PHP qui correspond à notre page
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/main/scripts/JS_profil.php';
$scriptPersoJSOnLoad = true;