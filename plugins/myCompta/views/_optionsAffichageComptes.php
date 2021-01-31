<div id='optionFiltre' class="group optionsAffiche">
	<div id="affichage" class="four_quarter first btmspace-15">
		<div class='one_quarter first'>
			<label><strong>Relevé: </strong></label>
		</div>
		<div class='three_quarter right'>
			<label class="champ-inline"> mois en cours </label>
				<input class='champ-inline' type=radio name=afficheDate value='1' CHECKED>
			<label class="champ-inline"> mois dernier </label>
				<input type=radio class='champ-inline'  name=afficheDate value='-1'>
			<label class="champ-inline"> personnalisé </label>
				<input type=radio class='champ-inline'  name=afficheDate value='0'>
		</div>
	</div>
	<div id='selectionDate' class='four_quarter first right'>
		<input type=text class='champ-inline controlForm-date' placeholder="Début (jj-mm-aaaa)" id='dateDebut'>
		<input type=text class='champ-inline controlForm-date' placeholder="Fin (jj-mm-aaaa)" id='dateFin'>
		<input type=submit class='champ-inline' value='Afficher' id='affiche'>
	</div>
</div>

