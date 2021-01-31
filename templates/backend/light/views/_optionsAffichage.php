<div class="row">
	<div class="">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Options d'affichage</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left">
						<input type=hidden id=numPageDebut value='1'>
						<div class="form-group">
							<label class="control-label col-md-1">
								<i>Filtrer par:</i>
							</label>
							<label class="control-label col-md-1">
								<input type=radio name=onArchive id=onArchive value='1' CHECKED> Actifs 
							</label>
							<label class="control-label col-md-2"> 
								<input type=radio name=onArchive id=onArchive value='9'> Tous 
							</label>
							<label class="control-label col-md-2">
								<input type=radio name=onArchive id=onArchive value='-1'> Archivés
							</label>
							<label class="control-label col-md-3"">Eléments/page</label>
							<div class="col-md-3">
								<select id='nbElementsPage' class="form-control">
									<option value='10'>10</option>
									<option value='50'>50</option>
									<option value='100'>100</option>
									<option value='200'>200</option>
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>