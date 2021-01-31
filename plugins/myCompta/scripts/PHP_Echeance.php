<?php
// On va vérifier si une demande AJAX n'est pas en cours
if (isset($_POST) && $_POST['source'] === 'AJAX') {
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/'. $_SESSION['template'] . '/fn_include.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/myCompta_include.php');
    switch ($_POST['cible']) {
        case 'releve':
            $requete = fn_Echeance_sqlSelectLisEcheancePlat(array('idCompte' => $_POST['idCompte']));
            break;
    }
    
    echo $requete;

}