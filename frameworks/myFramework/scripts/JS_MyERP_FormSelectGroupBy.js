function JS_MyERP_FormSelectGroupBy(args) {
	$('#' + args.idDIV).load('frameworks/myFramework/scripts/PHP_MyERP_AJAX.php', {
		source: 'AJAX',
		plugin: args.plugin,
		cible: 'createFormSelectGroupBy',
		cibleAffiche: args.cibleAffiche,
		champName: args.champName,
		idSelect: typeof args.idSelect !== 'undefined' ? args.idSelect : null,
		ajoutOK: typeof args.ajoutOK !== 'undefined' ? args.ajoutOK : null,
	});
}
