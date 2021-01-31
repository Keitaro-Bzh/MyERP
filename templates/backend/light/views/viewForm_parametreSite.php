<?php
/*---- DEBUT FORMULAIRE ---*/
fn_template_formDeclare(array(
	'position' => 'debut',
	'Objet' => $GeneralConfig,
	'url' => 'index.php?module=parametres',
));
fn_template_formInput($GeneralConfig->get_FormInput('titre'));
fn_template_formInput($GeneralConfig->get_FormInput('sousTitre'));
fn_template_formInput($GeneralConfig->get_FormInput('telContact'));
fn_template_formInput($GeneralConfig->get_FormInput('mailContact'));
fn_template_formInput($GeneralConfig->get_FormInput('footer'));
fn_template_formInput($GeneralConfig->get_FormInput('onRefresh'));
fn_template_formInput($GeneralConfig->get_FormInput('onDebug'));
fn_template_formInput($GeneralConfig->get_FormInput('onFrontend'));
/*---- FIN FORMULAIRE ---*/
fn_template_formDeclare(array(
	'position' => 'fin',
));