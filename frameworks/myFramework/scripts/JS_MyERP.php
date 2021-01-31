<!-- Inclusion des fonctions liées à notre plugins !-->
<?php 
$nomFonction = $plugin . 'GetDefinitionPlugin';
$infoPlugin = $nomFonction();
if ($infoPlugin['relations']) {
	foreach($infoPlugin['relations'] as $relationPlugin) {
		include_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $relationPlugin . '/scripts/_' . $relationPlugin . 'Include.php');
	}
}
require_once ($_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $nomPlugin . '/scripts/_' . $nomPlugin . 'Include.php');
?>

 <!-- Inclusion de nos scripts spécifiques à notre plugins  !-->
<script src="frameworks/myFramework/scripts/JS_MyERP.js"></script>
<script src="frameworks/myFramework/scripts/JS_MyERP_FormSelectGroupBy.js"></script>
