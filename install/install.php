<?php
/* Déclaration de variables à portée du plugin */
$msgErreur = false;

/* On va définir l'étape et procder aux tests afin de router sur la bonne page */
if(isset($_POST['step']))
{
    $installStep = (int)$_POST['step'] + 1;
    switch ((int)$_POST['step']) {
        case 2:
            /* On part du principe que si l'on a pas confirmé la connexion, on considère que cela ne 
                fonctionne pas */
            $msgErreur = null;
            $installStep = (int)$_POST['step'];

            if (testConnexionBase($_POST) === 1) {
                $installStep = (int)$_POST['step'] + 1;
            }
            else {
                switch (testConnexionBase($_POST)) {
                    case -1:
                        $msgErreur = "Serveur injoignable - Merci de vérifier vos paramètres";
                        break;
                    case -2:
                        $msgErreur = "Base introuvable - Merci de vérifier le nom de la base";
                        break;
                    case -3:
                        $msgErreur = "Accès refusé - Merci de vérifier vos identifiants";
                        break;
                    default:
                        $msgErreur = "Paramètres incorrects - Merci de vérifier";
                        break;
                }
            }
        break;
        case 3:
            $_SESSION['installSite']['siteName'] = $_POST['siteName'];
            $_SESSION['installSite']['siteAdmin'] = $_POST['siteAdmin'];
            $_SESSION['installSite']['siteAdminPass'] = $_POST['siteAdminPass'];
            $_SESSION['installSite']['siteAdminEmail'] = $_POST['siteAdminEmail'];
        break;
        case 4:
            /* On va procéder à l'enregistrement du fichier de configuration */
            $xw = new XMLWriter();
            $xw->openMemory();
            $xw->startDocument("1.0");
            $xw->startElement("sql");
                $xw->startElement("type");
                $xw->text("MariaDB");
                $xw->endElement();
                $xw->startElement("address");
                $xw->text($_SESSION['installSite']['baseServer']);
                $xw->endElement();
                $xw->startElement("port");
                $xw->text($_SESSION['installSite']['basePort']);
                $xw->endElement();
                $xw->startElement("name");
                $xw->text($_SESSION['installSite']['baseDatabase']);
                $xw->endElement();
                $xw->startElement("username");
                $xw->text($_SESSION['installSite']['baseUser']);
                $xw->endElement();
                $xw->startElement("password");
                $xw->text($_SESSION['installSite']['basePassword']);
                $xw->endElement();
            $xw->endElement();
            $xw->endDocument();
            file_put_contents($GLOBALS['fileConfig'], $xw->outputMemory());

            include_once ($_SERVER['DOCUMENT_ROOT']. "/frameworks/myFramework/class/MyERP.php");
            $myERP = new MyPDO();
            
            /* On va commencer par effacer le contenu de notre base s'il y en a*/
            $myERP->resetBase();
            $myERP->installBase();

            // On va ajouter les informations sur le site
            include_once ($_SERVER['DOCUMENT_ROOT']. "/main/class/User.php");
            include_once ($_SERVER['DOCUMENT_ROOT']. "/main/class/ConfigAffichage.php");

            $myAdmin = new User();
            $myAdmin->set_Valeur("username",$_SESSION['installSite']['siteAdmin']);
            $myAdmin->set_Valeur("password",md5($_SESSION['installSite']['siteAdminPass']));
            $myAdmin->set_Valeur("email",$_SESSION['installSite']['siteAdminEmail']);
            $myAdmin->set_Valeur("acces",'9');
            $myAdmin->set_Valeur("template",'backend/default');
            $myAdmin->set_ObjetToBase();

            $mySite = new ConfigAffichage();
            $mySite->set_Valeur('titre',$_SESSION['installSite']['siteName']);
            $mySite->set_ObjetToBase();

            /* On supprime le cache pour l'installation par sécurité*/
            $_SESSION['installSite'] = null;
        break;
    }
}
else {
    $installStep = 1;
}

/* Routine d'affichage de l'installation */
include ($_SERVER['DOCUMENT_ROOT'] . "/install/views/_header.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/install/views/step" . $installStep . ".php");
include ($_SERVER['DOCUMENT_ROOT'] . "/install/views/_footer.php");

function testConnexionBase($args) {
    $server = $args['baseAddress'];
    $user = $args['baseUser'];
    $password = $args['basePass'];
    $database = $args['baseName'];
    $port = (isset($args['basePort']) ? (int)$args['basePort']: NULL);
    $mysqli = new mysqli($server, $user, $password, $database, $port);
    if ($mysqli->connect_error) {
        switch ($mysqli->connect_errno) {
            case 2002:
                return -1;  // Hote ou port inconnu
                break;
            case 1049:
                return -2;  // table inconnue
                break;
            case 1045:
                return -3;  //accès refusé
                break;
            default:
                return 0;
                break;
        }
    }
    else {
            $_SESSION['installSite']['baseServer'] = $_POST['baseAddress'];
            $_SESSION['installSite']['basePort'] = $port;
            $_SESSION['installSite']['baseUser'] = $_POST['baseUser'];
            $_SESSION['installSite']['basePassword'] = $_POST['basePass'];
            $_SESSION['installSite']['baseDatabase'] = $_POST['baseName'];
            return 1;
    }
    $mysqli->close();
}
