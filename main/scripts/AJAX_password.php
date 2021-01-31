<?php
session_start();
/* La demande provient d'une fonction javascript
  Il faut donc procéder à une re-déclaration des classes*/
require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyERP.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/User.php';

$monUser = new User();
$monUser->get_ObjetFromBase(array('idObjet' => $_SESSION['id']));

// On va vérifier que le mot de passe actuel est le bon
if (strcmp(md5($_POST['passwdOld']),$monUser->get_Valeur('password')) === 0) {
    // On va définir notre mot de passe
    $monUser->set_Valeur('password',md5($_POST['passwd']));
    $idUSer = $monUser->set_ObjetToBase();
    echo json_encode(array('success' => 1));
}
else {
    echo json_encode(array('success' =>  -1));
}