<?php
/*---- DEBUT FORMULAIRE ---*/
fn_template_formDeclare(array(
	'position' => 'debut',
	'Objet' => $myConfigSite,
	'url' => 'index.php?module=parametre&rubrique=Configuration',
));
fn_template_formInput($myConfigSite->get_FormInput('onRefresh'));
fn_template_formInput($myConfigSite->get_FormInput('onDebug'));
fn_template_formInput($myConfigSite->get_FormInput('onFrontend'));
/*---- FIN FORMULAIRE ---*/
fn_template_formDeclare(array(
	'position' => 'fin',
));