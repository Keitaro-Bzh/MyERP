<?php fn_template_cadre(array('position' => 'debut', 'titre' => 'Liste des utilisateurs')); ?>
		<div class="dropdown js__drop_down">
			<a href="index.php?module=parametre&rubrique=Users&action=ajout" class="btn btn-success btn-xs "><i class='fa fa-plus-square'></i> NOUVEAU</a>
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
											fn_template_TableauDatabase($tableauUsers);
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php fn_template_cadre(array('position' => 'fin'));