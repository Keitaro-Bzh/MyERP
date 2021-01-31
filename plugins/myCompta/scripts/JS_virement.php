<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/scripts/JS_myCompta.php');
?>
 <script src="frameworks/myFramework/scripts/JS_MyERP.js">
</script>

<script>
	function chargeScriptPerso() {
        JS_MyERP_FormSelect({
            idDIV: 'divCompteEmetteur',
            plugin : 'myCompta',
            cibleAffiche : 'compte' ,
            champName : 'idCompteEmetteur'
        });
        JS_MyERP_FormSelect({
            idDIV: 'divCompteDestinataire',
            plugin : 'myCompta',
            cibleAffiche : 'compte',
            champName : 'idCompteDestinataire',
        });
	}
</script>