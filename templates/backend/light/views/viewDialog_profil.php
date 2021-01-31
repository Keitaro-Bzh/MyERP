<dialog id="mydialog">
	<div><input type=password value="" class="form-control controlForm-pass" id=passwdOld placeholder="Mot de passe actuel"></div> 
	<hr />
	<div><input type=password value="" class="form-control controlForm-pass" name="passwd" id="passwdNew" placeholder="Nouveau mot de passe"></div> <br />
	<div><input type=password value="" class="form-control controlForm-pass" id="passwdBis" placeholder="Confirmer mot de passe"></div> <br />
	<div class="col-md-6 col-sm-6 col-xs-6">
		<button class='btn btn-warning' onclick="$dialog.close()">Annuler</button> 
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">
		<button  class='btn btn-primary' onclick="newPasswd();">Valider</button>
	</div>
</dialog>