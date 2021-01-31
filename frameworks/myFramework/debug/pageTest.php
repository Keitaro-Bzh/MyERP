<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/backend/default/_template_Include.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/frontend/default/_template_Include.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/fonctions/fnDebug.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyERP.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/scripts/_include.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/_myComptaInclude.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myECommerce/scripts/_myECommerceInclude.php';

// $monObjet = new User();
$monObjet = new Compte();
// $listObjetTable = $monObjet->get_ObjetPrepareListTableau();
 
//  $listObjet = $monObjet->get_ObjetListFromBase();
 $monObjet->get_objetFromBase(array('idObjet' => '2'));
//fn_template_formInput($monObjet->get_FormInput('nom'),array('classOptions' => array('formAjax')));
?>

<table><tr>
<td width='400'>
        Début test 
        <?php fnDebug_varDump($monObjet); ?>
        fin test
    </td>
</tr></table>
<!-- 
<form method=post action=#>
    <button name=enreg>valider</button>
</form> -->