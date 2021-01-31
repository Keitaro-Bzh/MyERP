
<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="box-content">
		<h4 class="box-title">
			<?php if ($argsPage['titrePage']) { echo $argsPage['titrePage']; } ?>
			<small><?php if ($argsPage['sousTitrePage']) { echo ' - ' . $argsPage['sousTitrePage']; } ?></small>
		</h4>

		<div class="dropdown js__drop_down">
			<a href="<?php echo $_SERVER['REQUEST_URI'] . "&action=ajout"; ?>" class="btn btn-success btn-xs "><i class='fa fa-plus-square'></i> NOUVEAU</a>
		</div>

		<!-- /.dropdown js__dropdown -->
		<div class="row">
			<div class="col-md-12">
				<div class="bs-example min-height-300">
					<div class="dropdown clearfix">
						<div class="row small-spacing">
							<div class="col-xs-12">
								<div class="box-content">
										<div id='tableauListe'>
											<?php
											// La création du tableau et des boutons se fera depuis une seule fonction
											//fnAfficheTable_AfficheTableau($argsPage['tableauDonnees']);
											fn_template_TableauDatabase($argsPage['tableauDonnees'],$argsPage['droitsUser']);
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


