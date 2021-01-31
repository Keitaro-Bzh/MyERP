<?php
// On va vérifier si une demande AJAX n'est pas en cours
if (isset($_POST) && $_POST['source'] === 'AJAX') {
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/'. $_SESSION['template'] . '/fn_include.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/myCompta_include.php');
    switch ($_POST['cible']) {
        case 'releve':
        case 'operation':
            $donneesTableau = fn_Operation_sqlSelectLisOperationPlat(array('idCompte' => $_POST['idCompte'], 'pageCible' => $_POST['cible']));
        case 'echeance':
            
            break;
    }

    fn_template_SimpleOption($donneesTableau);
}