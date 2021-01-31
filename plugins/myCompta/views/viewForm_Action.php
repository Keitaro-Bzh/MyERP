<?php 
$monObjet->set_Valeur('valeur','Total');
fn_template_formDeclareDebut(array(
    'position' => 'debut',
    'Objet' => $monObjet,
	'url' => $_SERVER['HTTP_REFERER'],
));

    fn_template_cadre(array('position' => 'debut','type' => 'cadreAvecTitre','titre' => 'Détails du mouvement'));
        // fn_template_formInput($monObjet->get_FormInput('__Compte__'));
        fn_template_formInput($monObjet->get_FormInput('valeur'));

        fn_template_formInput($monObjet->get_FormInput('typeMouvement'));
        fn_template_formInput($monObjet->get_FormInput('typeReglement'));

        
        fn_template_formInput($monObjet->get_FormInput('qte'));
        
        fn_template_formInput($monObjet->get_FormInput('prixAchat'));
        
        fn_template_formInput($monObjet->get_FormInput('fraisAchat'));

    fn_template_cadre(array('position' => 'fin'));

// On inclue les paramètres de notre formulaire
fn_template_formDeclare(array(
	'position' => 'fin',
	'urlProvenance' => $_SERVER['HTTP_REFERER']
));

$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/_myComptaScript.php';
$scriptPersoJSOnLoad = true;