<?php 
// Initialication du formulaire 
fn_template_formDeclareDebut(array(
    'position' => 'debut',
    'Objet' => $monObjet,
    'url' => 'index.php?module=myCompta&rubrique=Compte'
)); ?>

<div class='row'> <?php
    echo "<div class='row'>";
        fn_template_formOnArchive($monObjet->get_FormInput('onArchive'));
    echo "</div>";
    fn_template_cadre(array("position" => "debut","type" => "cadreAvecTitre","titre" => "Détails")); 
        fn_template_formInput($monObjet->get_FormInput('__Banque__'));
        fn_template_formInput($monObjet->get_FormInput('__Titulaire__'));
        fn_template_formInput($monObjet->get_FormInput('typeCompte'));
        fn_template_formInput($monObjet->get_FormInput('libelleCompte'));
        fn_template_formInput($monObjet->get_FormInput('numeroCompte'));
        fn_template_formInput($monObjet->get_FormInput('soldeInitial'));
     fn_template_cadre(array('position' => 'fin')); ?>
</div>

<?php
// Fin du formulaire
fn_template_formDeclareFin(array('urlProvenance' => getenv("HTTP_REFERER")));
?>
<!-- Définition de notre script JS personnalisé !-->
<?php
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/_myComptaScript.php';
$scriptPersoJSOnLoad = true;