<?php
// Initialication du formulaire 
fn_template_formDeclare(array(
    'position' => 'debut',
    'Objet' => $monObjet
)); 

echo "<div class='row'>";
    fn_template_formOnArchive($monObjet->get_FormInput('onArchive'),array('classOptions' => array('formAjax')));
echo "</div>";
fn_template_cadre(array("position" => "debut","type" => "cadreAvecTitre","titre" => "BANQUE : Formulaire de saisie"));
    //fn_template_formInput($monObjet->get_FormInput('__Societe__'));
    // fn_template_formInput($monObjet->get_FormInput('statut'));
    fn_template_formInput($monObjet->get_FormInput('nom'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('enseigne'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('email'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('telephone'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('url'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('codeBanque'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('codeGuichet'),array('classOptions' => array('formAjax')));
fn_template_cadre(array('position' => 'fin')); 

// Fin du formulaire
fn_template_formDeclare(array('position' => 'fin', 'urlProvenance' => getenv("HTTP_REFERER")));

// Définition de notre script JS personnalisé 
// $scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/_myComptaScript.php';