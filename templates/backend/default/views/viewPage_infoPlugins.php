<div class="row">
	<div class="">
		<div class="text-center text-center">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Informations plugin</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div>
							<p><strong>Nom :</strong> <?php echo $infoPlugin['nomPlugin']; ?></p>
							<p><strong>Développeur :</strong> <?php echo $infoPlugin['developpeurs']; ?></p>
							<p><strong>Version :</strong>  <?php echo $infoPlugin['version']; ?></p>
							<p><strong>Version base de données:</strong>  <?php echo $infoPlugin['versionBase']; ?></p>
							<p><strong>Description :</strong> <?php echo $infoPlugin['description']; ?></p>
							<p><strong>Dépendance :</strong> </p>
						</div>
						<hr>
                        <?php if ($_SESSION['niveauAccesGeneral'] === 9) { ?>
                            <div id='myPlugin' class='update center'>
                                <button class='btn btn-info' id='updatePlugin'>MISE A JOUR PLUGIN</button>
                                
                            </div>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Définition de notre script JS personnalisé !-->
<?php
$scriptPersoJS = $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/scripts/JS_updatePluginBDD.php'; 
$scriptPersoJSOnLoad = true;
?>