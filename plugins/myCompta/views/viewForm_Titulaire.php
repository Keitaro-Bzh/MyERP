<?php
// Initialication du formulaire 
fn_template_formDeclare(array(
    'position' => 'debut',
    'Objet' => $monObjet,
)); 

echo "<div class='row'>";
    fn_template_formOnArchive($monObjet->get_FormInput('onArchive'),array('classOptions' => array('formAjax')));
echo "</div>";
fn_template_cadre(array("position" => "debut","type" => "cadreAvecTitre","titre" => "TITULAIRE : Formulaire de saisie"));
    fn_template_formInput($monObjet->get_FormInput('civilite'));
    fn_template_formInput($monObjet->get_FormInput('nom'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('prenom'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('email'),array('classOptions' => array('formAjax')));
    fn_template_formInput($monObjet->get_FormInput('telephone'),array('classOptions' => array('formAjax')));
fn_template_cadre(array('position' => 'fin')); 

// Fin du formulaire
fn_template_formDeclare(array('position' => 'fin'));