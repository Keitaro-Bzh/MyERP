<?php
/*---- DEBUT FORMULAIRE ---*/
fn_template_formDeclare(array(
	'position' => 'debut',
	'Objet' => $configAffichage,
	'url' => 'index.php?module=parametre&rubrique=Affichage',
));
fn_template_formInput($configAffichage->get_FormInput('titre'));
fn_template_formInput($configAffichage->get_FormInput('sousTitre'));
fn_template_formInput($configAffichage->get_FormInput('telContact'));
fn_template_formInput($configAffichage->get_FormInput('mailContact'));
fn_template_formInput($configAffichage->get_FormInput('footer'));
/*---- FIN FORMULAIRE ---*/
fn_template_formDeclare(array(
	'position' => 'fin',
));