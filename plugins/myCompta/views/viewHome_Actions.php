<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="box-content">
		<h4 class="box-title">
			Comptes TITRE
		</h4>
		<div class="dropdown js__drop_down">
			<a href="index.php?module=myCompta&rubrique=Action&action=simulation" class="btn btn-info btn-xs "><i class='fa fa-plus-square'></i> SIMULATION</a>
			<a href="index.php?module=myCompta&rubrique=Compte&action=ajout" class="btn btn-success btn-xs "><i class='fa fa-plus-square'></i> NOUVEAU</a>
			<!-- <a href="#" class="btn btn-xs "><i class='fa fa-cog'></i></a> -->
		</div>
		<!-- /.dropdown js__dropdown -->
		<div class="row">
			<div class="col-md-12">
				<div class="bs-example min-height-300">
					<div class="dropdown clearfix">
						<div class="row small-spacing">
							<div class="col-xs-12">
                                <?php fn_myCompta_afficheWidgetsListeComptes(array('typeCompte' => 'T')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
