<?php
session_start();

// On va vérifier si une demande AJAX n'est pas en cours
if (isset($_POST) && $_POST['source'] === 'AJAX') {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyERP.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/fonctions/fn_myERP.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/'. $_SESSION['template'] . '/_template_include.php');
    
    //On va vérifier si la demande est destiné à une action sur un plugin ou pas.
    if (strcmp($_POST['plugin'],'') === 0) {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/main/scripts/_include.php');
        $module = 'Main';
    }
    else {
        // On va vérifier si un lien existe entre nos plugins afin de charger les fichiers de classes associés
        require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $_POST['plugin'] . '/' . $_POST['plugin'] . '.php');
        $nomFonction = $_POST['plugin'] . 'GetDefinitionPlugin';
        $infoPlugin = $nomFonction();
        if ($infoPlugin['relations']) {
            foreach($infoPlugin['relations'] as $relationPlugin) {
                require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $relationPlugin . '/scripts/_' . $relationPlugin . 'Include.php');
            }
        }
        require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/'. $_POST['plugin'] . '/scripts/_' . $_POST['plugin'] . 'Include.php');
        $module = $_POST['plugin'];

        // On va charger notre objet si une demande va dans ce sens
        if (isset($_POST['classe'])) { 
            $monObjet = new $_POST['classe']();
        }
    }

    
    switch ($_POST['cible']) {
        case 'AJAX_ObjetEnreg':
            echo json_encode(fnBDD_setObjetToBaseFromPOST($monObjet,$_POST));
            break;
        case 'AJAX_afficheFormObjet':
            include( $_SERVER['DOCUMENT_ROOT'] . "/plugins/" . $_POST['plugin'] . "/views/viewForm_" . $_POST['classe'] . ".php");
            break;
        case 'AJAX_formSelect':
            $nomFonction = 'fn_' . $module . '_prepareformOptionSelect';
            $configSelect = array(
                'cibleChamp' => $_POST['cibleAffiche'],
                'champName' => $_POST['champName'],
                'options' => $nomFonction(array(
                    'cibleAffiche' => ($_POST['cibleAffiche'])
                )),
                'valueSelect' => (isset($_POST['idSelect']) ? $_POST['idSelect'] : null),
                'ajoutURL' => (isset($_POST['ajoutURL']) ? $_POST['ajoutURL'] : null)
            );
            fn_template_formSelect($configSelect);
            break;
        case 'createFormSelectGroupBy':
            $nomFonction = 'fn_' . $module . '_preprareformOptionSelectGroupBy';
            $configSelect = array(
                'cibleChamp' => $_POST['cibleAffiche'],
                'champName' => $_POST['champName'],
                'options' => $nomFonction(array(
                    'cibleAffiche' => ($_POST['cibleAffiche'])
                )),
                'valueSelect' => (isset($_POST['idSelect']) ? $_POST['idSelect'] : null),
                'ajoutOK' => (isset($_POST['ajoutOK']) ? $_POST['ajoutOK'] : null)
            );
        
            fn_template_formSelect($configSelect);
            break;
        case 'tableDonnees' :
            $nomFonction = 'fn_' . $_POST['classe'] . '_preprareTable';
            
            $champFiltre = isset($_POST['champFiltre']) ? $_POST['champFiltre'] : null;
            $idFiltre = isset($_POST['idFiltre']) ? $_POST['idFiltre'] : null;
            if ($champFiltre) {
                $tableauDonnees = $nomFonction(array('specifiqueClasse' => array( $champFiltre => $idFiltre)));
            }
            else {
                $tableauDonnees = $nomFonction($idFiltre);
            }
            $tableauDonnees = $nomFonction($idFiltre);
            fn_template_SimpleOption($tableauDonnees);
            break;
    }
}
else {
    echo json_encode($_POST);
}