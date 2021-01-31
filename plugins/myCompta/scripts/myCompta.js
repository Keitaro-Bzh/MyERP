
//Fonction spécifique pour gérer les SELECT
function getSelectMyCompta (args) {
	erreur = false;
	switch (args.classe) {
		case 'Compte':
			varChampRupture= typeof args.champRupture !== 'undefined' ? args.champRupture : 'nomBanque';
			varChampAffiche = typeof args.champAffiche !== 'undefined' ? args.label : 'libelleCompte';
			varAttrName= typeof args.attrName !== 'undefined' ? args.attrName : 'idCompte';
			varValueName= typeof args.valueName !== 'undefined' ? args.valueName : 'idCompte';
			varSpecifiqueFiltre = typeof args.specifiqueFiltre !== 'undefined' ?  args.specifiqueFiltre : null;
			break;
		case 'Banque':
			varChampRupture= typeof args.champRupture !== 'undefined' ? args.champRupture : null;
			varChampAffiche = typeof args.champAffiche !== 'undefined' ? args.label : 'nomBanque';
			varAttrName= typeof args.attrName !== 'undefined' ? args.attrName : 'idBanque';
			varValueName= typeof args.valueName !== 'undefined' ? args.valueName : 'idBanque';
			varSpecifiqueFiltre = typeof args.specifiqueFiltre !== 'undefined' ?  args.specifiqueFiltre : null;
			break;
		case 'Categorie':
			varChampRupture= typeof args.champRupture !== 'undefined' ? args.champRupture : 'nomFamille';
			varChampAffiche = typeof args.champAffiche !== 'undefined' ? args.label : ['nomCategorie'];
			varAttrName= typeof args.attrName !== 'undefined' ? args.attrName : 'idCategorie';
			varValueName= typeof args.valueName !== 'undefined' ? args.valueName : 'idCategorie';
			varSpecifiqueFiltre = typeof args.specifiqueFiltre !== 'undefined' ? args.specifiqueFiltre : 'D';
			break;
		default:
			alert('Erreur dans la récupération du select - Classe introuvable');
			erreur = true;
			break;
	}

	if (erreur !== true) {
		$('#' + args.nomChamp).load('_frameworks/myFramework/scripts/ajax.php',{
				source : 'AJAX',
				fonction: 'getListeObjet',
				plugin: 'myCompta',
				classe: args.classe,
				miseEnForme: 'select',	
				label  : typeof args.label !== 'undefined' ? args.label : null,
				attrName : varAttrName,
				valueName : varValueName,
				valueSelected : args.valueSelected,
				disabled: false,
				champAffiche: varChampAffiche,
				champRupture: varChampRupture,
				urlAjout: false,
				specifiqueFiltre: varSpecifiqueFiltre
		});
	}
}

//Fonction spécifique pour afficher les operations filtrés 
function getOperationsFiltrees (args) {
	messageChargement(args.nomChamp,'Chargement des opérations');
	$('#' + args.nomChamp).load('_plugins/myCompta/fonctions/comptes.php',{
		source : 'AJAX',
		fonction: 'tableauOperations',
		args : args
	});
}

//Fonction gérant la zone de ventilation
function afficheZoneVentilation() {
	$('#zoneVentilation').append('<hr />');
}


function afficheModeOperation(typeOperation,nomZone,Selected,numCheque = null) {
	$('#'+nomZone).html('');
	if (typeOperation == 'C') {
		if (modeSelected == 'VI') {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='VI' class='champ-inline' CHECKED> Virement ");
		}
		else {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='VI' class='champ-inline'> Virement ");
		}
		if (modeSelected == 'DE') {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='DE' class='champ-inline' CHECKED> Dépot (Espèces/Chèques) ");
		}else {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='DE' class='champ-inline'> Dépot (Espèces/Chèques) ");
		}
	}
	else {
		if (modeSelected == 'CB') {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='CB' class='champ-inline' CHECKED> Carte Bancaire ");
		}
		else {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='CB' class='champ-inline'> Carte Bancaire ");
		}
		if (modeSelected == 'RE') {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='RE' class='champ-inline' CHECKED> Retrait ");
		}
		else {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='RE' class='champ-inline'> Retrait ");
		}
		if (modeSelected == 'PR') {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='PR' class='champ-inline' CHECKED> Prélèvement ");
		}
		else {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='PR' class='champ-inline'> Prélèvement ");	
		}
		if (modeSelected == 'VI') {		
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='VI' class='champ-inline' CHECKED> Virement ");
		}
		else {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='VI' class='champ-inline'> Virement ");
		}
		if (modeSelected == 'CH') {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='CH' class='champ-inline' CHECKED> Chèque ");
		}
		else {
			$('#'+nomZone).append("<input type='radio' name='" + nomZone + "' value='CH' class='champ-inline'> Chèque ");
		}

	}
}

