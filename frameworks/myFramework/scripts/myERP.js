/*
   Objectif:
  	Le but de ce fichier est de regrouper les fonctions génériques pouvant être appliquées à l'ensemble 
  	du site.
  
  Fonctionnement:
  	Aucune inclusion n'est à faire, car le fichier est inclu dans le footer du template.
   Il suffit ensuite de déclarer la fonction désirée dans la partie <SCRIPT></SCRIPT> 
   de la page html/php
  
  -------------------------------------------------------------------------
  Prototype des fonctions utilisables dans les plugins:
  -------------------------------------------------------------------------
  controleFormulaire();
  getTableau (args);
  messageChargement(zone,message);
  
  -------------------------------------------------------------------------
  Mode d'emploi des fonctions
  -------------------------------------------------------------------------
 controleFormulaire()
 	--------------------------
 	Utilisation:
 		La fonction va aller controller la saisie d'un champ si dans le champ, l'attribut class est renseigné.
 		La liste des classes vérifiable est exhaustive et doit être précédé du mot clé 'controlForm-'
 		La liste est 'pass' 'username' 'email' 'nom' 'prenom' 'date' 'url' 'tel' 'adresse' 'int' 'recherche'
 	--------------------------	
 	
 afficheTableauFiltre(args)
 	--------------------------
 	Utilisation:
 		La fonction va nous permettre de récupérer une liste d'objet et de les mettre en forme via
 		le tableau générique définit dans le fichier tableauObjets.php.
 		Il prendra en charge les différentes options d'affichage possible (filtre, recherche, page)
 	Définition arguments:
 		args : {
 			plugin: 'nom du plugin géré sur la page',
 			classe: 'nom de la classe des objets à afficher',
 			urlAjout: 'url à afficher dans le bouton ajout de la liste',
 			
 		}
 	--------------------------
 	
 	messageChargement(zone,message)
 	 	--------------------------
 	Utilisation:
 		La fonction va nous permettre d'afficher un gif animé simulant un chargement pour faire patienter l'utilisateur
 		lors d'un traitement ajax pouvant s'avérer long
 	Définition arguments:
 		zone : 'nom de la zone dans laquelle doit s'afficher le chargement'
 		message : 'message à afficher en paralelle du gif' 
 	--------------------------
 */


/* ------------------------------------
 * 			DEBUT DES FONCTIONS
 * ------------------------------------
 * 		Code à ne pas modifier!!!
 */
function controleFormulaire() {
	$('.controlForm-pass').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z0-9#@!]{4,20}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Le mot de passe ne doit comporter que des lettres, des chiffres ou les caractères spéciaux # ! @ \nIl doit comporter entre 4 et 20 caractères');	
			$(this).val("");
		}		
	});

	$('.controlForm-entier').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[0-9]{1,5}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('La valeur ne doit comporter que des chiffres\n');	
			$(this).val("");
		}		
	});
	
	$('.controlForm-username').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z0-9]{4,30}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Le nom d\'utilisateur ne doit comporter que des lettres ou des chiffres\nIl doit comporter entre 4 et 30 caractères');	
			$(this).val("");
		}		
	});

	$('.controlForm-basename').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z0-9_]{4,30}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Le nom de la base de données ne doit comporter que des lettres ou des chiffres ou le caractère "_"\nIl doit comporter entre 4 et 30 caractères');	
			$(this).val("");
		}		
	});

	$('.controlForm-sitename').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z0-9 _-!]+$", "i");
		if (valeurSaisie = "" & regex.exec(valeurSaisie) == null) {
			alert('Le nom du site ne doit comporter de caractères spéciaux\nIl doit comporter entre 1 et 50 caractères');	
			$(this).val("");
		}		
	});

	$('.controlForm-baseaddress').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z0-9.-]{1,30}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('L\'adresse de la base de données est incorrecte\nDe plus, elle doit comporter au maximum 30 caractères');	
			$(this).val("");
		}		
	});
	
	$('.controlForm-email').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z0-9-\._]{1,}@[a-zA-Z0-9-_\.$]{1,}[a-zA-Z]{1,5}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Erreur Saisie :\nMerci de renseigner une adresse email valide du type webmaster@IntranetERP.fr');	
			$(this).val("");
		}		
	});
	
	$('.controlForm-nom').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z-\s]{1,100}", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Erreur Saisie :\nVous ne pouvez saisir que des lettres, un " " ou un "-"\nVous ne pouvez dépasser 100 caractères');	
			$(this).val("");
		}
	});
	
	$('.controlForm-prenom').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z-\s]{1,200}", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Erreur Saisie :\nVous ne pouvez saisir que des lettres, un " " ou un "-"\nVous ne pouvez dépasser 200 caractères');	
			$(this).val("");
		}
	});
	
	$('.controlForm-date').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[0-9]{2}/{1}[0-9]{2/-{1}[0-9]{4}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Erreur Saisie :\nla date doit être au format 01-01-2010');	
			$(this).val("");
		}
	});
	
	$('.controlForm-url').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^(https?)://([a-zA-Z0-9-_.$]{1,})([a-zA-Z]{2,4})$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Erreur Saisie :\nMerci de renseigner une url valide du type http://www.google.fr');	
			$(this).val("");
		}
	});
	
	$('.controlForm-tel').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[0-9]{10}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Erreur Saisie :\nVous ne pouvez saisir que des chiffres au format 0811101112');		
			$(this).val("");
		}
	});
	
	$('.controlForm-int').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[0-9]+$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Erreur Saisie :\nVous ne pouvez saisir que des chiffres');			
			$(this).val("");
		}
	});
	
	$('.controlForm-adresse').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z0-9-\s]{1," + longueurChamp + "}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('Erreur Saisie :\nVous ne pouvez saisir que des lettres, un " " ou un "-"\nVous ne pouvez dépasser ' + longueurChamp + ' caractères');			
			$(this).val("");
		}
	});
	
	$('.controlForm-recherche').change(function() {
		valeurSaisie = $(this).val();
		regex = new RegExp("^[a-zA-Z0-9-%@. ]{2,20}$", "i");
		if (valeurSaisie != "" & regex.exec(valeurSaisie) == null) {
			alert('La recherche ne doit comporter que des lettres, des chiffres, des espaces ou les caractères spéciaux @ . - %\nIl doit comporter au minimum 2 caractères');	
			$(this).val("");
		}		
	});
}

function desactiveF5(e) {
	if ((e.which || e.keyCode) == 116) e.preventDefault();
}

function messageChargement(idChamp,message) {
	messageAffiche = '<div class="center">';
	messageAffiche =  messageAffiche + message + '<br>';
	messageAffiche =  messageAffiche + 'Merci de patienter ...<br>';
	messageAffiche = messageAffiche + '<br><img src="http://myerp.localhost.local/templates/default/images/loading.gif"></div>';
	//messageAffiche = messageAffiche + '<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif"></div>';
	$('#' + idChamp).html(messageAffiche);
}

function jsForms(args) {
	$('#btnValider').show()
	$('#btnModifier').hide();
	
	if (args.disableDefault == true) {
		$(':input',args.nomFormulaire)
		.not(':button')
		.prop("disabled",true);
		$('#btnValider').hide()
		$('#btnModifier').show();
	}
	$('#enForm').click(function(e) {
		$(':input',args.nomFormulaire)
		.not(':button')
		.prop("disabled",false);
		$('#btnModifier').hide();
		$('#btnValider').show();
	});
	$('#disForm').click(function(e) {
		$(':input',args.nomFormulaire)
		.not(':button')
		.prop("disabled",true);
		$('#btnValider').hide()
		$('#btnModifier').show();
	});
}
/*
function getFiltreDefault() {
	return {
			afficheArchive: $('input[type=radio][name=onArchive]:checked').val(),
			nbElementPage: $('#nbElementsPage').val(),
			valeurRecherche: $('#valeurCle').val() !== ''? $('#valeurCle').val() : null,
			cleRecherche: $('#nomCle').val(),
			numPage: '1'
		};
}
function getNumPage(args) {
	$('a').click(function() {
		if ( typeof $(this).attr('class') !== "undefined"  && $(this).attr('class') === 'numPage') {
			if ($(this).attr('id') > '0'){
				args.orig = 'numPage';
				args.filtre = getFiltreDefault();
				args.filtre.numPage = $(this).attr('id');
				$('#numPageDebut').val($(this).attr('id'));
				getTableauObjets(args);
			}
		}
	});
}
function afficheTableauFiltre(args) {
	$('input[type=radio][name=onArchive]').click(function() {
		args.orig = 'archive';
		args.filtre = getFiltreDefault();
		args.filtre.afficheArchive = $(this).val();
		getTableauObjets(args); 
	});
	
	$('#nbElementsPage').change(function(){
		args.filtre = getFiltreDefault();
		args.filtre.nbElementPage = $(this).val();		
		getTableauObjets(args);
	});
	
	$('#champRecherche').click(function(e) {
		args.orig = 'recherche';
		if ($('#valeurCle').val() === '') {
			alert('Merci de saisir un mot clé pour la recherche...');
		}
		else {
			args.filtre = getFiltreDefault();
			args.filtre.cleRecherche = $('#nomCle').val();
			args.filtre.valeurRecherche = $('#valeurCle').val();
			getTableauObjets(args);
		}
	});
	

}
function getTableauObjets (args) {
	$('#' + args.nomChamp).load('_frameworks/myFramework/scripts/getTableauObjets.php',{
			source : 'AJAX',
			plugin: args.plugin,
			classe: args.classe,
			urlAjout: args.urlAjout,
			afficheOption: args.afficheOption,
			nbObjetAffiche : args.filtre.nbElementPage,
			afficheArchive: args.filtre.afficheArchive,
			pageAffiche: args.filtre.numPage,
			cleRecherche : args.filtre.cleRecherche,
			valeurRecherche : args.filtre.valeurRecherche
	});
}




function effaceFormulaire(idFormulaire) {
	$(':input',idFormulaire)
	.not(':button, :submit, :reset, :hidden')
	.val('')
	.removeAttr('checked')
	.removeAttr('selected');
}


function jsForms(args) {
	$('#btnValider').show()
	$('#btnModifier').hide();
	
	if (args.disableDefault == true) {
		$(':input',args.nomFormulaire)
		.not(':button')
		.prop("disabled",true);
		$('#btnValider').hide()
		$('#btnModifier').show();
	}
	$('#enForm').click(function(e) {
		$(':input',args.nomFormulaire)
		.not(':button')
		.prop("disabled",false);
		$('#btnModifier').hide();
		$('#btnValider').show();
	});
	$('#disForm').click(function(e) {
		$(':input',args.nomFormulaire)
		.not(':button')
		.prop("disabled",true);
		$('#btnValider').hide()
		$('#btnModifier').show();
	});
}

function previewImage(file) {
	var input = file.target;	
	var reader = new FileReader();
	reader.readAsDataURL(input.files[0]);
	reader.onload = function(){
		var dataURL = reader.result;
		var output = document.getElementById('output');
		output.src = dataURL;
	};
	reader.readAsDataURL(input.files[0]);
}

function getArgsDefault() {
	return {
		plugin: '<?php echo $nomPlugin; ?>',
		classe: '<?php echo $nomClasse; ?>',
		urlAjout: '',
		nomChamp: 'tableauListe',
		afficheOption: '',
		numPageDebut: $('#numPageDebut').val()
	};
}*/