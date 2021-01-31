<?php 
/* ---------------------------------------------------------------------------------
 * ---------------------------------------------------------------------------------
 	Objectif:
 	---------
	Le but de ce fichier est de traiter toutes les fonctions qui seront potentiellement
 	accessible depuis notre site. Chaque fonction sera présenté dans le descriptif ci-dessous
 	avec la procédure pour l'utiliser
 	Il est possible de rajouter une fonction spécifique, mais il faut le faire directement
 	dans un fichier à mettre dans le dossier fonctions du plugin.
 	Les fichiers annexes seront inclus dans ce fichier qui sera le seul a être déclaré
 	dans notre index.php afin d'en faciliter la gestion et des scinder les fonctions
 	par type. Pour chaque fichier joint, une liste de fonctions présentes dans ce fichier
 	sera faite.
 	
 	++++++++++++++++++++++++++++++++++++++++++++++++++++++
 	------------------------------------------------------
 	Liste des fonctions par fichier
 	------------------------------------------------------
 	++++++++++++++++++++++++++++++++++++++++++++++++++++++
 	tableauObjets.php
 		creationTableau($args)
 		setTableLigneDefinition($libelleAffiche,$afficheOn,$typeChamp,$align = null, $particularite = null)	
 		getNombrePage ($nbObjet,$nbObjetAffiche)
 		afficheChampTableau ($objet,$tabEntete,$cle)
 	
 	
 	------------------------------------------------------
 	++++++++++++++++++++++++++++++++++++++++++++++++++++++
 	
 	
 	
 	------------------------------------------------------
 	--- tableauObjets.php --- DETAILS
 	------------------------------------------------------
 	creationTableau($args)
			 	---------------------
				Objectif
					Le but de cette fonction est de créer un tableau de manière générique
					afin d'uniformiser l'affichage, mais également à partir d'une liste d'objets
					et de certains arguments, de gagner un temps précieux dans la construction 
					des tableaux
				---------------------
				Descriptif paramètres
					$args = array(
						'enTete' => array définissant les entetes du tableau de manière générale, il est défini
							depuis la classe via la fonction $monObjet->getTableEnTeteDefinition(). Peut être null
							pour ne pas afficher d'en-tete
						'donnees' => array contenant  nos objets mis en forme de manière spécifique,
						'options' => (!$afficheOption ? null : array (
									'idObjet' => $monObjet->getValeur('nomID'),
									'type' => $droitsOptions,
									'lien' => 'index.php?module=' . $lienPlugin. '&rubrique=' . $nomClasse
							)),
						'nbPage' => Définit le nombre de page du tableau en cours donc peut varier selon les options. il est
							possible d'utiliser la fonction getNombrePage().
						'niveauDroitAjout' => Niveau du droit pour l'accès à l'ajout du formulaire. On l'obtient via la fonction
							getNiveauDroit()
						'urlAjout' => URL pointant vers le formulaire de saisie de l'objet,
					)
				Prototype
						creationTableau(array(
							'enTete' => '' // Obligatoire, null possible
							'donnees' => '', // Obligatoire, null possible
							'rupture' => array(
								'cleRupture' => '',
								'libelleRupture' => ''
								),
							'options' => array (	
										'idObjet' => '',
										'type' => '',
										'lien' => ''
								),
							'nbPage' => '' // Obligatoire, null possible
							'niveauDroitAjout' => '' // Obligatoire
							'urlAjout' => '' // Obligatoire
						));
				+++++++++++++++++++++++++++++++++++++++++


	setTableLigneDefinition($libelleAffiche,$afficheOn,$typeChamp,$particulariteChamps = null, $particulariteClasse = null)
				---------------------
				Objectif
					Le but de cette fonction est de créer un tableau qui utilisé dans notre classe objet, permet
				de définir une ligne à afficher(ou pas) et qui sera utiliser dans la fonction creationTableau($args)
				---------------------
				Descriptif paramètres
					$libelleAffiche => Libellé qui sera affiché dans l'entête du tableau
					$afficheOn => boolen permettant de masquer la colonne
					$typeChamp => type de champ affiché (date, int, etc.)
					$particulariteChamp = Si on veut une mise en forme particulière (mail / www / monetaire) 
					$particulariteClasse = Si on veut mettre une particularité de classe (center pull-right etc.)
				---------------------
				Prototype
					setTableLigneDefinition($libelleAffiche,$afficheOn,$typeChamp,$align = null, $particularite = null)
				+++++++++++++++++++++++++++++++++++++++++


	getNombrePage ($nbObjet,$nbObjetAffiche)
				---------------------
				Objectif
					Le but de cette fonction est de renvoyer le nombre de page à afficher dans notre tableau en
				fonction du nombre d'objets dans la liste
				---------------------
				Descriptif paramètres
					$nbObjet => Nombre d'objet contenu dans la liste 
					$nbObjetAffiche => Nombre d'objet à afficher sur une page dans le tableau
				---------------------
				Prototype
					getNombrePage ($nbObjet,$nbObjetAffiche)
				+++++++++++++++++++++++++++++++++++++++++
				
				
	afficheChampTableau ($objet,$tabEntete,$cle)
				---------------------
				Objectif
					Le but de cette fonction est de renvoyer le nombre de page à afficher dans notre tableau en
				fonction du nombre d'objets dans la liste
				---------------------
				Descriptif paramètres
					$nbObjet => Nombre d'objet contenu dans la liste 
					$nbObjetAffiche => Nombre d'objet à afficher sur une page dans le tableau
				---------------------
				Prototype
					getNombrePage ($nbObjet,$nbObjetAffiche)
				+++++++++++++++++++++++++++++++++++++++++
* ---------------------------------------------------------------------------------
* ---------------------------------------------------------------------------------
*/


// Inclusion de nos fichiers de fonctions
include_once ('fnAfficheTable.php');
include_once ('fnBDD.php');
include_once ('fnDates.php');
include_once ('fnDroits.php');
include_once ('fnFiles.php');
include_once ('fnForm.php');
include_once ('fnFormat.php');
include_once ('fnDebug.php');

/* Cette fonction a pour but de récupérer un paramètre général dans la liste
 * Celle-ci pourra être compléter au fur et à mesure de l'évolution du programme
 */
/*function recupereParametre ($param) {
	switch ($param){
		case 'idCompteDefaut':
			$maConnexion = ouvreConnexion();
			$requete = $maConnexion->query("SELECT " . $param . " FROM _param");
			$parametre = $requete->fetch();
			break;
		default:
			$parametre = null;
			break;
	}
	return $parametre;
}*/
/*


/*function recupArgsTableau($nomClasse,$nomID,$URL,$rupture,$idObjet = null) {
	$monObjet = new $nomClasse($idObjet);
	$listeObjet = $monObjet->getListeObjet();
	// Nous allons créer un tableau d'options
	$tableOptions = array();
	foreach ($listeObjet as $objet){
		$tableDetails = array();
		//------------------------------------
		// Création du tableau d'option
		// Option pour afficher l'opératoin
		$tableDetails[] = array(
				'type' => 'affiche',
				'lien' => $URL . '&' . $nomID . '=' . $objet->getValeur($nomID)
		);
		//------------------------------------
		$tableOptions[] = array(
				'idObjet' => $objet->getValeur($nomID),
				'options' => $tableDetails
		);
	}
	$argsTableau = array(
			'enTete' => $monObjet->getDefinition(),
			'donnees' => $listeObjet,
			'options' => $tableOptions,
			'rupture' => $rupture
	);
	return $argsTableau;
}*/

/* Fonction qui va créer un tableau associant une valeur
 * à la valeur à afficher pour les champs SELECT
 */
/*function setArraySelectListe($valeur,$valeurAffiche) {
	return array(
			'valeur' => $valeur,
			'valeurAffiche' => $valeurAffiche
	);
}*/

/* ---------------------------------------------------------------------------------------------------------------------
 * ---------------------------------------------------------------------------------------------------------------------
 *		FONCTIONS DIVERSES
 * ---------------------------------------------------------------------------------------------------------------------
 * --------------------------------------------------------------------------------------------------------------------- */
/* Fonction qui va nous permettre de constuire un tableau de données
 * qui sera utilisé par le template pour afficher les menus.
 * il ira chercher dans chaque dossier de plugins le fichier définition afin de retourner l'affiche
 * ainsi que les droits autorisés.
 * Les droits eux seront dans la variable $_SESSION
 * Pour simplifier le template, on va gérer les droits dans cette fonction
 */
/*function getListeMenu() {
	$listePlugin = listeDossiers(array('dossier' => 'plugins'));
	foreach ($listePlugin as $plugin) {
		// on va récupérer la définition de notre menu
		require_once ( $_SERVER['DOCUMENT_ROOT'] . '/_plugins/' . $plugin . '/_definitions.php');
		$definitionMenu = $plugin('getMenu');
	
		// On vérifie que l'on doit affiche le plugin dans le menu
		if ($definitionMenu) {
			// on vérifie si la personne est autorisée à accéder au menu
			if (isset($_SESSION[$plugin]) && $_SESSION[$plugin] >= $definitionMenu['niveauAcces']) {
				//on va vérifier la présence de notre sous menu
				if($definitionMenu['sousMenu']) {
					// Comme le menu, on va vérifier que pour chaque sous-menu
					// l'utilsateur y a accès (ex: paramètres)
					//
					$listeSousMenuFiltree = array();
					//$listeSousMenu = null;
					$listeSousMenu  = $plugin('getSousMenu');
					foreach ($listeSousMenu as $sousMenu) {
						if ($_SESSION[$plugin] >= $sousMenu['niveauAcces']) {
							$listeSousMenuFiltree[] = $sousMenu;
						}
					}
					$definitionMenu['sousMenu'] = $listeSousMenuFiltree;
				}
				// On ajoute la définition de notre menu
				$tableauMenu[] = $definitionMenu;
			}
		}
	}
	
	// on renvoie un null si aucun menu n'a été trouvé
	if (isset($tableauMenu)) {
		return $tableauMenu;
	}
	else {
		return null;
	}
}*/

/*function setTuile($titre,$description,$lien,$nomImage,$classe = null) { ?>
	<div class='tuile<?php echo (isset($classe) ? ' ' .$classe : ''); ?>'>
		<a class="tile" title="<?php echo $description; ?>" href="<?php echo $lien; ?>">
			<h1><?php echo $titre; ?></h1>
			<img src="_templates/<?php  echo $_SESSION['template'];?>/images/<?php echo $nomImage; ?>" alt="<?php echo $description; ?>">
			<p><?php echo $description; ?></p>
		</a>
	</div>
<?php }*/
