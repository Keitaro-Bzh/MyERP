<script>
	function chargeScriptPerso() {
        idCompte = <?php echo ($monObjet->get_Valeur('idOperation') > 0 ?  "'" . $monObjet->get_ValeurClasse('Compte','idCompte') . "'" : "null"); ?>;
        // alert('ko');
        JS_MyERP_FormSelect({
            idDIV: 'divSelectCompte',
            plugin : 'myCompta',
            cibleAffiche : 'compte' ,
            champName : 'idCompte',
            idSelect : idCompte,
        });
        // JS_MyERP_FormSelectGroupBy({
        //     idDIV: 'divSelectCategorie',
        //     plugin : 'myCompta',
        //     cibleAffiche : 'categorie',
        //     champName : 'idCategorie',
        //     idSelect : idCategorie
        // });

        // $('.typeTiers').click(function() {
        //     switch ($(this).val()) {
        //         case 'P':
        //             JS_MyERP_FormSelect({
        //                 idDIV: 'divSelectTiers',
        //                 plugin : 'myContacts',
        //                 cibleAffiche : 'personne' ,
        //                 champName : 'idTiers'
        //             });
        //             break;
        //         case 'S':
        //             JS_MyERP_FormSelect({
        //                 idDIV: 'divSelectTiers',
        //                 plugin : 'myContacts',
        //                 cibleAffiche : 'societe' ,
        //                 champName : 'idTers'
        //             });
        //             break;
        //         default:
        //             $('#divSelectTiers').html('<input type=text class="form-control name=tiers">');
        //             break;
        //     }
            
        // });
	}
</script>