<?php
session_start();

// On va vérifier si une demande AJAX n'est pas en cours
if (isset($_POST) && $_POST['source'] === 'AJAX') {
    switch ($_POST['cible']) {
        case 'formSelect':
            // On va inclure les sources dont on a besoin
            require_once($_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyERP.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Banque.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fn_Banque.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fn_myCompta.php');
            require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/fonctions/fn_template_formSelect.php');

            $configSelect = array(
                'nameChamp' => $_POST['champAffiche'],
                'options' => fn_myCompta_prepareformOptionSelect(array(
                    'champAffiche' => ($_POST['champAffiche'])
                )),
                'valueSelect' => (isset($_POST['idSelect']) ? $_POST['idSelect'] : null)
            );

            fn_formSelect($configSelect);
            break;
    }
}