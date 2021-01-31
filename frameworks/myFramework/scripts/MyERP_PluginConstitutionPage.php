<?php
/* On va définir notre classe issue d'un formulaire de référence
 ou de configuration qui ne fait à aucune classe */ 
if (!isset($nomClasse) && isset($_POST['class'])){
    $nomClasse = $_POST['class'];
}


if (isset($nomClasse)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $plugin . '/class/' . $nomClasse . '.php';
}

if (!isset($bypassRoutage) || (isset($bypassRoutage) && !$bypassRoutage)) {
    // On va vérifier si un enregistrement est en cours
    if (isset($_POST['formulaire'])){
        $monObjet = new $nomClasse();
        $idObjet = fnBDD_setObjetToBaseFromPOST ($monObjet,$_POST,(isset($_FILES) ? $_FILES : null));
    }

    /* On va vérifier si notre viewModel inclue une classe. Si ce n'est pas le cas, 
    alors on va afficher la variable $tableauBordClasse est obligatoire dans ce cas. */
    if ($nomClasse) {
        // On regarde à présent si une action sur la liste est en cours
        if (isset($_GET['action']) && $_GET['action'] != 'supprime') {
            switch (htmlspecialchars($_GET['action'])) {
                case 'ajout':
                    $monObjet = new $nomClasse();
                    if (isset($nomObjetFormulaire) && ($nomObjetFormulaire)) {
                        $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $plugin. '/views/' . $nomObjetFormulaire;
                    }
                    else {
                        $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/referenceForm.php';
                    }

                    break;
                case 'affiche':
                    if(isset($nomObjetDetail) && ($nomObjetDetail)) {
                        $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $plugin. '/views/' . $nomObjetDetail;
                    }
                    else {
                        $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/referenceDetail.php';
                    }
                    $monObjet = new $nomClasse();
                    $monObjet->get_ObjetFromBase(array('idObjet' => htmlspecialchars($_GET['id'])));
                    break;
                case 'modif':
                    $monObjet = new $nomClasse();
                    $monObjet->get_ObjetFromBase(array('idObjet' => htmlspecialchars($_GET['id'])));
                    if (isset($nomObjetFormulaire) && ($nomObjetFormulaire)) {
                        $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $plugin. '/views/' . $nomObjetFormulaire;
                    }
                    else {
                        $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/referenceForm.php';
                    }
                    break;
                default:
                    $corpsPage= $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_404.php';
                    break;
            }

        }
        else {
            // On vérifie enfin si une suppresion est en cours
            if (isset($_GET['action']) && $_GET['action'] === 'supprime') {
                $monObjet = new $nomClasse();
                $monObjet->del_ObjetFromBase(array('idObjet' => $_GET['id']));
            }
            else {
                $monObjet = new $nomClasse();
            }

            // if($chargeListe) {
            //     $argsPage = array(
            //             'titrePage' => isset($titrePage) ? $titrePage : null,
            //             'sousTitrePage' => (isset($sousTitrePage) ? $sousTitrePage : null),
            //             'tableauDonnees' => $monObjet->get_ObjetPrepareListTableau(),
            //             'droitsUser' => fnDroits_getTypeAccesPage(),
            //     );
            // }

            if ($tableauBordClasse !== null) {
                $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $plugin . '/views/' . $tableauBordClasse;
            }
            else {
                $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template']. '/views/viewPage_defautList.php';
            }
        }
    }
    else {
        $corpsPage = $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $plugin . '/views/' . $tableauBordClasse;
    }
}