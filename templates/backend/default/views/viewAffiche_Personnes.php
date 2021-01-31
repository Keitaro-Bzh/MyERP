<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $monObjet->getValeur('civilite'); ?> <?php echo $monObjet->getValeur('nom'); ?> <?php echo $monObjet->getValeur('prenom'); ?></strong></h2>
				<div class="nav navbar-right panel_toolbox">
					<i class="fa fa-birthday-cake"></i> <?php echo baseToFormDate($monObjet->getValeur('dateNaissance')); ?>
					
				</div>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="col-md-2 col-sm-2 col-xs-12 profile_left">
					<div class="profile_img">
						<div id="crop-avatar">
							<!-- Current avatar -->
							<img class="img-responsive avatar-view" src="<?php echo ($_SESSION['avatar'] ? $_SESSION['avatar'] : 'templates/' . $_SESSION['template'] . '/images/avatar.png'); ?>" alt="Avatar" title="Change the avatar">
						</div>
						<br />
						<label class='form-control'><?php echo ($monObjet->getValeur('onArchive') === '1' ? "Archivé": "Actif"); ?></label>
					</div>

				</div>
				<div class="col-md-5 col-sm-5 col-xs-12">
					<div class="profile_title">
						<div class="col-md-6">
							<h2>Adresse</h2>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12 col-sm-12 col-xs-1">
						<h4><?php echo $monObjet->getValeur('numVoie') . ' ' . $monObjet->getValeur('indRepetition') . ' ' . $monObjet->getValeur('libelleVoie'); ?></h4>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-1">
						<h4><?php echo $monObjet->getValeur('complementVoie'); ?></h4>
					</div>
					<div class="col-md-12 col-sm-12 col-xs-1">
						<h4><?php echo $monObjet->getValeur('codePostal') . ' ' . $monObjet->getValeur('ville'); ?></h4>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12">
					<div class="profile_title">
						<div class="col-md-6">
							<h2>Coordonnées</h2>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class='form-group'>
						<div class="col-md-2 col-sm-2 col-xs-1">
							<h4><span class='fa fa-phone'></span></h4>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-11">
							<h4><?php echo $monObjet->getValeur('telephone'); ?></h4>
						</div></h3>
					</div>
					<div class="clearfix"></div>
					<div class='form-group'>
						<div class="col-md-2 col-sm-2 col-xs-1">
							<h4><span class='fa fa-mobile'></span></h4>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-11">
							<h4><?php echo $monObjet->getValeur('mobile'); ?></h4>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class='form-group'>
						<div class="col-md-2 col-sm-2 col-xs-1">
							<h4><span class='fa fa-envelope'></span></h4>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-11">
							<h4><a href='mailto:<?php echo $monObjet->getValeur('email'); ?>'><?php echo $monObjet->getValeur('email'); ?></a></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='group'>
			<?php if (isset($nomPlugin) && $_SESSION[$nomPlugin] >= 5) { ?>
				<a href='index.php?module=myContacts&rubrique=Personne&action=modif&id=<?php echo $monObjet->getValeur('idPersonne'); ?>'><button type=submit name="enreg" class="btn btn-info pull-right">Modifier</button></a>
			<?php } ?>
		</div>
	</div>
</div>