<script>
	function chargeScriptPerso() {
		var args = { idChamp : 'myPlugin', plugin : '<?php echo $infoPlugin['nomPlugin']; ?>'};
		updatePlugin(args);
	}

	function updatePlugin(args) {
		$('#updatePlugin').click(function (e) {
			messageChargement(args.idChamp,'Mise à jour de la base en cours');
			$('#' + args.idChamp).load('frameworks/myFramework/scripts/PHP_updatePluginBDD.php',{
				plugin : args.plugin,
				source : 'ajax'
			});
		})
	}
</script>