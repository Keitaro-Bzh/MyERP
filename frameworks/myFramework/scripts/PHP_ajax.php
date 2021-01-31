<?php
/* Ce fichier aura pour but de créer une réponse AJAX qui renverra les données issues de la base
 * En cas d'un select, il faudrait  envoyer les informations suivantes:
 * 		$('#ville').load('_frameworks/myFramework/scripts/ajax.php',{   // Ou #ville correspond à l'id du div ou doit être affiché le select
 *			source : 'AJAX',											// Obligatoire pour vérifier qu'il s'agit bien d'une rquete ajax
 * 			fonction: 'getListeObjet',									// définit la fonction à utiliser
 * 			plugin: 'myContacts',										// définit le plugin pour charger le contenu
 * 			classe: 'Ville',											// Classe sur laquelle se porte la requete
 * 			miseEnForme: 'select',										// Type de mise en forme 'select' ou 'tableau'	
 *         	label  : 'Ville', 											// Label à affiche devant le select (peut etre null)
 *         	attrName : 'idVille',										// Attribut id pour le champ select
 *         	valueName : 'codePostal',									// nom de la colonne dans la base envoyé par la requete
 *         	valueSelected : $(this).val(),							// valeur envoyé ou selectionné
 *         	disabled: false,											// désactiver le select
 *         	champAffiche: 'libelleNom',									// Champ à afficher dans la zone
 *          urlAjout: false												// Si on doit afficher un lien pour ajouter une valeur dans la liste (renvoie vers une autre page)
 *      });
 */

/* On va vérifier si une requète AJAX est en cours et si ce n'est
 * pas le cas, nous allons afficher simplement le sous menu
*/
session_start();

if (isset($_POST['source']) AND $_POST['source'] === 'AJAX'){
	// On vérifie que la demande provient d'un plugin sinon on définit nos paramètres ici
	if ($_POST['plugin']) {
		$lienPlugin = $_POST['plugin'];
		$cheminPlugin = 'plugins/' . $_POST['plugin'];
		$niveauAcces = $_SESSION[$_POST['plugin']];
	}
	else {
		$lienPlugin = 'parametres';
		$cheminPlugin = 'main';
		$niveauAcces = $_SESSION['niveauAccesGeneral'];
	}
	
	/* On inclue nos fichiers de class et fonction de base car nous sommes
	dans une déclaration AJAX */ 
	include_once ($_SERVER['DOCUMENT_ROOT']  . '/frameworks/myFramework/class/myERP.php');
	include_once ($_SERVER['DOCUMENT_ROOT']  . '/frameworks/myFramework/fonctions/fn_myERP.php');
	// On va créer une instance de notre objet
	require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/'. $_SESSION['template'] . '/fn_include.php');
           
	if (isset($_POST['plugin']) && $_POST['plugin'] != '') {
		require_once $_SERVER['DOCUMENT_ROOT'] .  '/plugins/' . $_POST['plugin'] . '/class/' . $_POST['classe'] . '.php';
	}
	else {
		require_once $_SERVER['DOCUMENT_ROOT'] .  '/main/class/' . $_POST['classe'] . '.php';
	}

	$monObjet = new $_POST['classe']();
	switch ($_POST['fonction']) {
		case 'getListeObjet':
			//On va ensuite définir  le type d'affichage désiré
			switch ($_POST['miseEnForme']){
				case 'tableau':
					// On va définir notre tableau d'argument
					$argsObjet = array(
						'classe' => $_POST['classe'],
						'nomTable' => $monObjet->getValeur('nomTable'),
						'nomID' => $monObjet->getValeur('nomID'),
						'afficheArchive' => (isset($_POST['afficheArchive']) && $_POST['afficheArchive']? $_POST['afficheArchive'] : '1'),
						'nbObjetAffiche' => (isset($_POST['nbObjetAffiche']) ? $_POST['nbObjetAffiche'] : '10'),
						'pageAffiche' => (isset($_POST['pageAffiche']) ? $_POST['pageAffiche'] : null),
						'champRecherche' => (isset($_POST['valeurCle']) ? $_POST['nomCle'] : null),
						'cleRecherche' => (isset($_POST['valeurCle']) ? $_POST['valeurCle'] : null)
					);
					
					$tableauObjet = $monObjet->getListeObjet($argsObjet);
					var_dump($tableauObjet);
					//var_dump($tableauObjet);
					// Nous allons constituer notre tableau de variables
					$argsTableau = array(
							'niveauAcces' => $niveauAcces,
							'enTete' => $monObjet->getTableEnTeteDefinition(),
							'donnees' => $tableauObjet,
							'options' => ($_POST['afficheOption'] === '' ? null : array (
									'idObjet' => $monObjet->getValeur('nomID'),
									'type' => $monObjet->getDroits($_POST['plugin']),
									'lien' => 'index.php?module=' . $lienPlugin. '&rubrique=' . $_POST['classe']
							)),
							//'nbPage' => ($tableauObjet ? getNombrePage($monObjet->getNombreObjet($argsObjet), $_POST['nbObjetAffiche']) : '0'),
							//'niveauDroitAjout' => getNiveauDroit($monObjet->getDroits($_POST['plugin'])['droits'],'ajout'),
							//'urlAjout' => $_POST['urlAjout']
					);
					

					/* On construit notre tableau via la fonction définie
					 * dans le fichier se trouvant
					 * _frameworks/myFramework/fonctions/fn_myERP.php
					 */
					fnAfficheTable_AfficheTableau($argsTableau);

					break;
				case 'select':
					/* On va préparer nos variables pour créer
					 * notre select
					 */
					$idSelected = (isset($_POST['valueSelected'])) ? $_POST['valueSelected'] : null;
					$label = (isset($_POST['label'])) ? $_POST['label'] : null;
					$attrName = (isset($_POST['attrName'])) ? $_POST['attrName'] : $monObjet->getValeur('nomID');

					// On va récupérer les différentes informations nécessaires à la récupération de notre
					// liste d'objets
					$argsListeObjet = array(
						'afficheObjet' => (isset($_POST['afficheObjet']) ? $_POST['afficheObjet'] : '1'),
						'nbObjetAffiche' => (isset($_POST['nbObjetAffiche']) ? $_POST['nbObjetAffiche'] : '20'),
						'pageAffiche' => (isset($_POST['pageAffiche']) ? $_POST['pageAffiche'] : '1'),
						'champTri' => (isset($_POST['champTri']) ? $_POST['champTri'] : null),
						'ordreTri' => (isset($_POST['ordreTri']) ? $_POST['ordreTri'] : null),
						'champRecherche' => (isset($_POST['champRecherche']) ? $_POST['champRecherche'] : null),
						'cleRecherche' => (isset($_POST['cleRecherche']) ? $_POST['cleRecherche'] : null)
					);
					$listeObjet = $monObjet->getListeObjet(array('champ' => $_POST['valueName'],'valeur' => $idSelected));
					$argsSelect =  array(
							'libelleLabel' => $label,
							'donnees' => $listeObjet,
							'attrName' => $attrName,
							'champIDBase' => $monObjet->getValeur('nomID'),
							'champAffiche' => $_POST['champAffiche'],
							'urlAjout' => ($_POST['urlAjout'] === true ? 'index.php?module=' . $_POST['plugin'] . '&rubrique=' . $_POST['classe'] . '&action=ajout' : null),
							'idSelected' => $idSelected,
							'champRupture' => (isset($_POST['champRupture']) ? $_POST['champRupture']: null),
							'disabled' => $_POST['disabled']
					);
					selectObjetCreate($argsSelect);
					break;
				default:
					break;
			}
			break;
		case 'getObjet' :
			include( $_SERVER['DOCUMENT_ROOT'] . "/plugins/" . $_POST['plugin'] . "/views/viewForm_" . $_POST['classe'] . ".php");
			break;
		default:
			break;
	}
}
