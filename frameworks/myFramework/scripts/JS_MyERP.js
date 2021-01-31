function JS_MyERP_FormSelect(args) {
	$('#' + args.idDIV).load('frameworks/myFramework/scripts/PHP_MyERP_AJAX.php',{
        source : 'AJAX',
        plugin : args.plugin,
		cible : 'AJAX_formSelect',
		cibleAffiche: args.cibleAffiche,
		champName: args.champName,
		idSelect: typeof args.idSelect !== 'undefined' ? args.idSelect : null,
		ajoutURL : typeof args.ajoutURL !== 'undefined' ? args.ajoutURL : null,
	});
}