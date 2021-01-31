<script>
	function chargeScriptPerso() {
		idSelected = <?php echo ($monObjet->getValeur('Fournisseur') && $monObjet->getValeurClasse('Fournisseur','idSociete')) ? "'" . $monObjet->getValeur('idFournisseur') . "'" : 'null'; ?>;
		JS_MyERP_FormSelect({
                idDIV: 'divSelectFournisseur',
                plugin : 'myContacts',
                cibleAffiche : 'societe',
                champName : 'idFournisseur',
            });
        getSelectMyContacts({classe: 'Societe', nomChamp : 'fournisseur', attrName: 'idFournisseur', valueSelected : idSelected});
	}
</script>