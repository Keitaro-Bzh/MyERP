<?php
fn_template_cadre(array("position" => "debut","type" => "cadreAvecTitre","titre" => "Configuration MyCOMPTA"));
    fn_template_formDeclareDebut(array(
        'position' => 'debut',
        'Objet' => $monObjet,
        'url' => 'index.php?module=myCompta&rubrique=Parametres'
    ));
        fn_template_formInput($monObjet->get_FormInput('referentielGlobal'),array('classOptions' => array('formAjax')));
    fn_template_formDeclareFin();
fn_template_cadre(array('position' => 'fin')); 
