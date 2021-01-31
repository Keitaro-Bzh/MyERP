<?php 
// Initialication du formulaire 
fn_template_formDeclareDebut(array(
    'position' => 'debut',
    'Objet' => $monObjet,
    'url' =>  getenv("HTTP_REFERER")
)); ?>

<div class='row'>
	<?php fn_template_formOnArchive($monObjet->get_FormInput('onArchive')); ?>
</div>

<div class='row'> <?php
  fn_template_cadre(array("position" => "debut","type" => "cadreAvecTitre","titre" => "Détail de l'opération"));
        echo '<div id=detail>';
            fn_template_formInput($monObjet->get_FormInput('typeMouvement'));
            fn_template_formInput($monObjet->get_FormInput('__Compte__'));
            fn_template_formInput($monObjet->get_FormInput('modePaiement'));
            fn_template_formInput($monObjet->get_FormInput('date'));
            //fn_template_formInput($monObjet->get_FormInput('typeTiers'));
            //echo '<div id="divSelectTiers">';
            //    fn_template_formInput($monObjet->get_FormInput('tiers'));
            //echo '</div>';
            fn_template_formInput($monObjet->get_FormInput('description'));
            //fn_template_formInput($monObjet->get_FormInput(array('champClasse' => 'modePaiement')));
            fn_template_formInput($monObjet->get_FormInput('__Categorie__'));
            
            //fn_template_formInput($monObjet->get_FormInput(array('champClasse' => 'typeMouvement')));
            // fn_template_formInput($monObjet->get_FormInput(array('modalitePaiement')));
            
            fn_template_formInput($monObjet->get_FormInput('montant'));
        echo '</div>';
    fn_template_cadre(array('position' => 'fin')); ?>
</div>


<?php
// Fin du formulaire
fn_template_formDeclareFin(array('urlProvenance' => getenv("HTTP_REFERER")));

// Définition de notre script JS personnalisé
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/_myComptaScript.php';
$scriptPersoJSOnLoad = true;