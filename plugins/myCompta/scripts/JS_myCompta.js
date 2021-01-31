function JS_myCompta_testAlert() {
	alert('myCompta');
}

function JS_myCompta_FormSelect(args) {
	$('#' + args.idDIV).load('plugins/myCompta/scripts/PHP_myCompta.php',{
		source : 'AJAX',
		cible : 'formSelect',
		champAffiche: args.champAffiche,
		idSelect: typeof args.idSelect !== 'undefined' ? args.label : null,
	});
}
