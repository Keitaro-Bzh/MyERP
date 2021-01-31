<?php
session_start();

/* Mode développement */
if ((isset($GLOBALS['Site']) && $GLOBALS['Site']->getValeur('onDebug')) || 0 === 0) {
    error_reporting(E_ALL);
    ini_set('display_errors','On');
}

/* Définition de variable globale */
$GLOBALS['fileConfig'] = $_SERVER['DOCUMENT_ROOT']. "/config.xml";

/* Permet de réinitialiser l'installation du site */
if (isset($_POST['reset'])) {
    unlink($GLOBALS['fileConfig']);
}

/* Vérification que nous ne sommes pas dans une phase d'installation  */
if(!file_exists($GLOBALS['fileConfig'])) {
    include ($_SERVER['DOCUMENT_ROOT'] . "/install/install.php");
}
else {
    // On va charger notre class MyERP qui sera utilisé tout au long de fonctionnement du site
    require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyERP.php';

    // On va commencer par charger les paramètres de configuration de notre site via la class configSite
    require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/ConfigSite.php';
    $myConfigSite = new ConfigSite;
    $myConfigSite->get_ObjetFromBase(array('idObjet' => '1')); // Il n'y aura qu'un seul paramétrage pour le site, donc on aura forcément la même valeur pour l'id

    // Initialisation des paramètres du site web
    require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/ConfigAffichage.php';
    if (isset($_POST['formulaire']) && $_POST['formulaire'] === 'personnalisation') {
       // unset ($GLOBALS['Site']);
        $GLOBALS['Site'] = new configAffichage();
    }
    else {
        if (!isset($GLOBALS['Site'])) {
            $GLOBALS['Site'] = new configAffichage();
            $GLOBALS['Site']->get_ObjetFromBase(array('idObjet' => '1'));
        }
    }
    // On va déterminer le template à appliquer
    // Il est déterminer ici et nos lors de l'affichage car la variable template est utilisé dans le routage
    if (!isset($_SESSION['id'])) {
        if ((int)$myConfigSite->get_Valeur('onFrontend') === 1) { 
            $_SESSION['template'] = "frontend/default";
        }
        else {
            $_SESSION['template'] = "backend/default";
        }
    }
    /* On va procéder au routage de notre corps en procédant en plusieurs étapes
    Toutes les pages vont passer par la routine MyERP qui va ainsi permettre une configuration
    centralisée */
    include($_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/scripts/MyERP_routage.php');

    // La page blank permet un mode debug rapide Il suffit de déclarer la variable avant l'inclucion des pages affichages
    if (isset($pageBlank)) {
        include($_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/debug/_blank.php');
    }
    else {
        if ((int)$myConfigSite->get_Valeur('onFrontend') === 1 || (isset ($_SESSION['id']) && (int)$_SESSION['id'] > 0 )) {
            include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_header.php');
            include($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_content.php');
            include( $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_footer.php');
        }
        else {
            // il n'y a pas de frontend donc on passe directement sur l'écran du login.
            include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_header.php');
            include($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/views/viewPage_Login.php');
            include( $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $_SESSION['template'] . '/_footer.php');
        }
    }
}