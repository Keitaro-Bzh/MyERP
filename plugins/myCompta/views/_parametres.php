<div class="row">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>
					<?php if ($titrePage) { echo $titrePage; } ?>
					<small>
						<?php if ($sousTitrePage) { echo $sousTitrePage; } ?>
					</small>
				</h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="">
		<div class="text-center text-center">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Informations plugin</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
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
						<div class='update center'>
							<button class='btn btn-success' id='updatePlugin'>MISE A JOUR PLUGIN</button>
							<div id='myPlugin'></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(function() {
	// Fonction qui va affiche le tableau au chargement du programme
	$(document).ready(function() {
		updatePlugin({
			idChamp : 'myPlugin',
			plugin : '<?php echo $infoPlugin['nomPlugin']; ?>'
		});
	});
})
</script>