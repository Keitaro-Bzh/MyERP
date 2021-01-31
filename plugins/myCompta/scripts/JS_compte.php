<script>
	function chargeScriptPerso() {
        JS_MyERP_FormSelect({
            idDIV: 'divSelectTitulaire',
            plugin : 'myCompta',
            cibleAffiche : 'titulaire' ,
            champName : 'idTitulaire',
        });
        JS_MyERP_FormSelect({
            idDIV: 'divSelectBanque',
            plugin : 'myCompta',
            cibleAffiche : 'banque',
            champName : 'idBanque',
        });
	}
</script>

