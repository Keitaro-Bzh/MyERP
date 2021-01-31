<?php
// Initialication du formulaire 
fn_template_formDeclare(array(
    'position' => 'debut',
    'Objet' => $monObjet
));  ?>

<div class='row'> <?php
    echo "<div class='row'>";
        fn_template_formOnArchive($monObjet->get_FormInput('onArchive'),array('classOptions' => array('formAjax')));
    echo "</div>";
    fn_template_cadre(array("position" => "debut","type" => "cadreAvecTitre","titre" => "CATEGORIES : Formulaire de saisie"));
        fn_template_formInput($monObjet->get_FormInput('__Famille__'));
        fn_template_formInput($monObjet->get_FormInput('nomCategorie'));
    fn_template_cadre(array('position' => 'fin'));?>
</div>

<?php
// Fin du formulaire
fn_template_formDeclareFin(array('urlProvenance' => getenv("HTTP_REFERER")));
?>
<!-- Définition de notre script JS personnalisé !-->
<?php
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/_myComptaScript.php';
$scriptPersoJSOnLoad = true;