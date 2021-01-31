<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/Fichier.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyClassLiens.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyPDO.php';

class MyERP {
	// On va définir une constante qui va nous permettre de créer des classes qui ne tiendront
	// pas compte de la routine de notre framework

	public function __construct($args = null) {
		// On active la mise à jour pour le développement
		// à supprimer en production
		$this->set_ObjetDefinitionToBase();
	}

	public function get_ClasseParametreDefinition() {
		$fonction = 'fn' . get_class($this) . '_classeParametreDefinition';
		return $fonction($this);
	}
	public function get_ClasseBaseDefinition() {
		$fonction = 'fn' . get_class($this) . '_classeBaseDefinition';
		return $fonction();
	}

	public function get_ObjetFromBase($args) {
		$myPDO = new MyPDO();
		$tableChamps = $this->get_ObjetDefinition('base');
		$fonction = 'fn' . get_class($this) . '_classeBaseDefinition';
		$classeDefinition = $fonction();
		$donneesBase = null;
		if (isset($args['idObjet'])) {
			// On va vérifier si la classe en cours dépend d'une classe personnalisé
			if (strcmp(get_parent_class($this),'MyERP') !== 0) {
				$fonction = 'fn' . get_class($this) . '_classeParametreDefinition';
				$classeChampsDefinition = $fonction($this);
				// On va récupérer le paramétrage de la classe parent et voir si les données sont dans la base ou dans la table correspond à la classe personnalisée
				foreach($classeChampsDefinition as $cleChamps => $valeurChamp)		 {
					if (strcmp(substr($cleChamps,0,2),'[_') === 0) {
						if ($valeurChamp['baseClasseParentRecopieChampParentTableCours']) {
							$requete = "SELECT * FROM " . $classeDefinition['nomTable'] ." WHERE " . $classeDefinition['nomID'] . " = " . $args['idObjet'];
						}
						else {
							$myClassLien = new myClassLiens();
							//On va aller récupérer le lien entre les bases dans la table correspondante
							$rechercheLien = array ( 'classeCours' => get_class($this),
								'classDest' => get_parent_class($this),
								'classeCoursID' => $args['idObjet']);
							$listLienID = $myClassLien->get_list_classLiensFromBase($rechercheLien);

							$maClasseParent = get_parent_class($this);
							$maClasseParent = new $maClasseParent();
							$maClasseParentBaseDefinition = $maClasseParent->get_ClasseBaseDefinition();

							$requete = "SELECT * FROM " . $classeDefinition['nomTable'] ."," . $maClasseParentBaseDefinition['nomTable'] . " WHERE " . $classeDefinition['nomID'] . " = " . $args['idObjet'] . " AND " .$maClasseParentBaseDefinition['nomID'] . " = " . $listLienID[0]['ClassLienDestID'];

						}
					}
				}
			}
			else {
				$requete = "SELECT * FROM " . $classeDefinition['nomTable'] ." WHERE " . $classeDefinition['nomID'] . " = " . $args['idObjet'];
			}
			$donneesBase = $myPDO->myQuery($requete);
		}
		if (isset($args['remoteRequete'])) {
			$donneesBase = $myPDO->myQuery($args['remoteRequete']);
		}

		if($donneesBase) {
			foreach ($tableChamps as $definitionChamp){
				if (isset($definitionChamp['definition']['ClasseParent']) && $definitionChamp['definition']['ClasseParent']) {
					echo 'coucou';
					$myClassLien = new myClassLiens();
					//On va aller récupérer le lien entre les bases dans la table correspondante
					$rechercheParent = array ( 'classeCours' => get_class($this),
						'classDest' => get_parent_class($this),
						'classeCoursID' => $args['idObjet']);
					$classParentID = $myClassLien->get_list_classLiensFromBase($rechercheParent);
					$maClasseParent = get_parent_class($this);
					$maClasseParent = new $maClasseParent();
					if($classParentID) {
						$maClasseParent->get_ObjetFromBase(array('idObjet' => $classParentID[0]['ClassLienDestID']));
					}
					foreach($maClasseParent as $cle => $valeur) {
						$this->set_Valeur($cle,$valeur);
					}
				}
				elseif (isset($definitionChamp['definition']['ClasseLien']) && $definitionChamp['definition']['ClasseLien']) {
					$myClassLien = new myClassLiens();
					//On va aller récupérer le lien entre les bases dans la table correspondante
					$rechercheLien = array ( 'classeCours' => get_class($this),
						'classDest' => $definitionChamp['definition']['ClasseLienDestObjet'],
						'classeCoursID' => $args['idObjet']);
					$listLienID = $myClassLien->get_list_classLiensFromBase($rechercheLien);
					if ($listLienID) {
						foreach ($listLienID as $idLien) {
							$maClasseLien = new $definitionChamp['definition']['ClasseLienDestObjet']();
							$maClasseLien->get_ObjetFromBase(array('idObjet' => $idLien['ClassLienDestID']));
						}
						$this->set_Valeur($definitionChamp['definition']['ClasseLienSourceObjet'],$maClasseLien);
					}
				}
				else {
					foreach ($donneesBase as $nomChampBase => $champBase) {
						if (strcmp($nomChampBase,$definitionChamp['definition']['NomChamp']) === 0) {
							// On va vérifier si le champ ne correspond pas à une objet de type Classe
							if (isset($definitionChamp['definition']['ClasseLien']) && ($definitionChamp['definition']['ClasseLien'])) {
								// On va récupérer la variable et vérifier si elle est nulle ou pas
								$valeurBase = strcmp($donneesBase[$definitionChamp['definition']['NomChamp']],'NULL') === 0 ? null : $donneesBase[$definitionChamp['definition']['NomChamp']];
								// On va charger notre objet en fonction de sa déclaration
								$tableClasseLienChamps = $this->get_ObjetDefinition('classeLien');
								foreach ($tableClasseLienChamps as $definitionClasseLien) {
									// On va charger nos fichiers de classe
									switch ($definitionClasseLien['definition']['Definition']['ciblePlugin']) {
										case 'main':
											$cheminClasseLien = $_SERVER['DOCUMENT_ROOT'] . '/main/class/';
											break;
										default:
											$cheminClasseLien = $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $definitionClasseLien['definition']['Definition']['ciblePlugin'] . '/class/';
											break;
									}
									require_once $cheminClasseLien . $definitionClasseLien['definition']['Definition']['cibleClasse'] . '.php';
									$monObjetClasseLien = new $definitionClasseLien['definition']['Definition']['cibleClasse']();
									switch ($definitionClasseLien['definition']['Type']) {
										case '1<>1':
											$requete = "SELECT * FROM _fichier WHERE " . $definitionClasseLien['definition']['Definition']['cibleChamp'] ." = '" . $valeurBase ."'";
											$monObjetClasseLien->get_ObjetFromBase(array('remoteRequete' => $requete));
											$this->set_Valeur($definitionChamp['champClasse'],$monObjetClasseLien);
											break;
									}
								}
							}
							else {
								// On est dans un champ correspondant à une variable de notre Classe
								$valeurBase = strcmp($donneesBase[$definitionChamp['definition']['NomChamp']],'NULL') === 0 ? null : $donneesBase[$definitionChamp['definition']['NomChamp']];
								$this->set_Valeur($definitionChamp['definition']['NomChamp'],$valeurBase);
							}
						}
					}
				}
			}
		}
		unset($myPDO);
	}

	public function getClass_baseDefinition() {
		$nomFonction = 'fn' . get_class($this) . '_classeBaseDefinition';
		return $nomFonction();
	}

	public function get_ObjetListFromBase($args = null) {
		// On récupère la définition de notre Objet dans la base
		$classe = get_class($this);
		$fonction = 'fn' . $classe . '_classeBaseDefinition';
		$tableChamps = $fonction('base');
		
		// On va d'abord récupérer la liste des ID pour générer notre tableau d'objet
		// Préparation de la requète générique
		$requete = "SELECT " . $tableChamps['nomID'] . " FROM " . $tableChamps['nomTable'];
		if (!isset($args['afficheArchive'])) {
			$requete = $requete . ' WHERE onArchive is null';
		}

		// On execute notre requète et on constitue notre tableau
		$maConnexion = new MyPDO();
		$resultat = $maConnexion->myQuery_arrayList($requete);
		$tableObjet = array();

		if ($resultat) {
			foreach ($resultat as $valeur) {
				$monObjetTable = new $classe();
				$monObjetTable->get_ObjetFromBase(array('idObjet' => (int)$valeur[$tableChamps['nomID']]));
				$tableObjet[] = $monObjetTable;
			}
		}
		return $tableObjet;
	}

	public function get_ObjetPrepareListTableau($args = null) {
		$listObjet = $this->get_ObjetListFromBase();
		$tableChamps = $this->get_ObjetDefinition('table');
		$baseDefinition = $this->getClass_baseDefinition();

		$tableRetour = array();
		foreach ($listObjet as $objetLigne) {
			$tableDonnees = array();
			// On va préparer nos entêtes
			if($tableChamps) {
				foreach ($tableChamps as $champLigne){
					if ($champLigne['definition']['AfficheOn']) {
						$tableDonnees[] = array( 'enTete' => $champLigne['definition']['EnTete'],
							'valeur' => is_object($objetLigne->get_Valeur($champLigne['champClasse'])) ? $objetLigne->get_ValeurClasse($objetLigne->get_Valeur($champLigne['champClasse']),$champLigne['definition']['Valeur']) : $objetLigne->get_Valeur($champLigne['champClasse']),
						);
					}
				}
				$tableRetour[] = array('idObjet' => $objetLigne->get_Valeur($baseDefinition['nomID']),
					'donnees' => $tableDonnees);
			}
		}
		return $tableRetour;
	}

	public function get_ObjetListFromBaseQuery($args) {}

	public function get_Valeur($cle) {
		return $this->$cle;
	}
	
    public function get_ValeurClasse($classe,$cle) {
		return $this->get_Valeur($classe)->get_Valeur($cle);
	}
	
    public function get_FormInput($parametre) {
		$valeurRetour = null;
		// On va extraire les paramètres correspondant à la définiton du Form
		$formTable = $this->get_ObjetDefinition('form');
		// On ne va garder que le paramètre demandé
        foreach($formTable as $definition) {
            if(strcmp($definition['champClasse'],$parametre) === 0) {
				$valeurRetour = $definition['definition'];
				break;
            }
        }
        return $valeurRetour;
	}
	
    public function get_ObjetDefinition($typeDef,$options = null) {
		$retourDefinition = null;
		$fonction = 'fn' . get_class($this) . '_classeParametreDefinition';
		$parametreObjetListe = $fonction($this);
		foreach ($parametreObjetListe as $cleLigne => $parametreLigne) {
			$valeurFiltre = array();
			// On ne va traiter que les champs de la classe et ceux de la classe parent
			if (strcmp(substr($cleLigne,0,2),'[_') === 0) {
				// On va parcourir le paramétrage dans notre classe en cours
				$ajoutTable = true;
				foreach ($parametreLigne as $cleParametreLigne => $valeurParametreLigne) {
					if (strcmp($typeDef,'base') === 0) {
							if (strcmp(substr($cleParametreLigne,strlen($typeDef),strlen($cleParametreLigne)),'ClasseParentRecopieChampParentTableCours')=== 0 && !$valeurParametreLigne) {
							$ajoutTable = false;
						break;
						}
					}
				}
				$fonctionParent = 'fn' . get_parent_class($this) . '_classeParametreDefinition';
				$parametreObjetListeParent = $fonctionParent($this);
				foreach ($parametreObjetListeParent as $cleLigneParent => $parametreLigneParent) {
					$valeurFiltreParent = array();
					foreach ($parametreLigneParent as $cleParametreParent => $parametreParent) {
						if(strcmp(substr($cleParametreParent,0,strlen($typeDef)),$typeDef) === 0) {
							$valeurFiltreParent[substr($cleParametreParent,strlen($typeDef),strlen($cleParametreParent))] = $parametreParent ;
						}
					}
					if ($valeurFiltreParent) {
						$retourDefinition[] = array( 'champClasse' => $cleLigneParent,
							'definition' => $valeurFiltreParent,
							'ajoutTable'  => $ajoutTable,
						);
					}
				}
			}
		// elseif (strcmp(substr($cleLigne,0,2),'__') !== 0 || (strcmp(substr($cleLigne,0,2),'__') === 0 && strcmp($typeDef,'base') !== 0 )) {
			else {
				foreach ($parametreLigne as $cleParametre => $parametre) {
					if(strcmp(substr($cleParametre,0,strlen($typeDef)),$typeDef) === 0) {
						$valeurFiltre[substr($cleParametre,strlen($typeDef),strlen($cleParametre))] = $parametre ;
					}
				}
			}
			if ($valeurFiltre) {
				$retourDefinition[] = array( 'champClasse' => $cleLigne,
					'definition' => $valeurFiltre,
					'ajoutTable'  => true,
				);
			}
		};
		return $retourDefinition;
	}

	public function set_Valeur($cle,$valeur) {
		$this->$cle = $valeur;
	}
	public function set_ValeurClasse($classe,$cle) {
		$this->set_Valeur($classe)->set_Valeur($cle);
	}

	public function set_ObjetDefinitionToBase () {
		$myPDO = new MyPDO();
		$fonction = 'fn' . get_class($this) . '_classeBaseDefinition';
		// On ne va ajouter la définition de la classe dans la BDD que si le fichier
		// fnClasse n'indique pas le contraire
		 if ($fonction()) {
			$myPDO->definitionObjetToBase(array(
				'definitionTable' => $fonction(),
				'definitionChamps' => $this->get_ObjetDefinition('base')
			));
		 }
	}
	public function set_ObjetToBase() {
		// On va vérifier si l'enregistrement se fait depuis un formulaire
		// Si oui, dans ce cas, on va analyser les champs postés
		if (isset($_POST['formulaire'])) {
			$this->set_FormPostToObjet();
		}

		$myPDO = new MyPDO();
		$classeDefinition = $this->get_ObjetDefinition('base');
		$classeLienDefinition = $this->get_ObjetDefinition('classeLien');
		$fonction = 'fn' . get_class($this) . '_classeBaseDefinition';
		$tableDefinition = $fonction();
		$idInsert = null;
		if ($tableDefinition) {
			if ((int)$this->get_Valeur($tableDefinition['nomID']) > 0) {
				$champsUpdate = "";
				$executeArray = array();
				$executeArray['id'] = $this->get_Valeur($tableDefinition['nomID']);
				foreach ($classeDefinition as $champTable){	
					if ($champTable['ajoutTable']) {	
						// On va construire la liste des champs à ajouter sauf l'ID
						if ( isset($champTable['definition']['ClasseParent']) && $champTable['definition']['ClasseParent']) {
							echo 'Cas à traiter dans le fichier class\MyERP';
						}
						// On va également gérer une exception pour les classes liées
						elseif (isset($champTable['definition']['ClasseLien']) && $champTable['definition']['ClasseLien']) {
							$maClasseLien = new MyClassLiens();
							$maClasseLien->set_Valeur('classLienType','2');
							$maClasseLien->set_Valeur('classLienDestObjet',$champTable['definition']['ClasseLienDestObjet']);
							$maClasseLien->set_Valeur('classLienSourceObjet',get_class($this));
							$maClasseLien->set_Valeur('classLienSourceID',(int)$this->get_Valeur($tableDefinition['nomID']));

							if (strcmp($champTable['definition']['ClasseLienCorrespondance'],'1<>1') === 0) {
								// On est dans le cas ou il ne peut y avoir qu'un seul lien, donc il faut vérifier que d'une part, le
								// lien n'existe pas et d'autre part, si le lien existe, le mettre à jour.
								$resultRequete = $maClasseLien->get_list_classLiensFromBase();
								if ($resultRequete) {
									$maClasseLien->get_ObjetFromBase(array('idObjet' => $resultRequete[0]['idClassLiens']));
								}
							}

							// On va peupler notre classe lien avec nos champs
							foreach ($this as $cleObjet => $valeurChampObjet) {
								if (strcmp($champTable['definition']['ClasseLienSourceObjet'],$cleObjet) === 0) {
									// On va vérifier si notre objet a déjà été peuplé et la valeur est un objet lié et en définir l'ID a enregistrer
									if (is_object($valeurChampObjet)) {
										$idObjetDest = $valeurChampObjet->get_Valeur($champTable['definition']['ClasseLienDestObjetID']);
									}
									else {
										$idObjetDest = $valeurChampObjet;
									}
									// On va véfirier si l'ID ne correspond pas, dans ce cas, on met la table à jour
									if ((int)$maClasseLien->get_Valeur('classLienDestID') !== (int)$idObjetDest) {
										$maClasseLien->set_Valeur('classLienDestID',$idObjetDest);
										$maClasseLien->set_ObjetToBase();
									}
								}
							}
						}
						elseif ( $champTable['definition']['NomChamp'] != $tableDefinition['nomID']) {
								// On gère l'exception pour les champs de la classe parent qui sont recopiés dans la table en cours
								if (!isset($champTable['definition']['RecopieEnfant']) || (isset($champTable['definition']['RecopieEnfant']) && $champTable['definition']['RecopieEnfant'])) {
									if ($champTable['definition']['NomChamp'] != $tableDefinition['nomID']) {
										$champsUpdate = $champsUpdate . $champTable['definition']['NomChamp'] . " = :" . $champTable['definition']['NomChamp'] . ", ";
										$executeArray[$champTable['definition']['NomChamp']] = $this->get_Valeur($champTable['definition']['NomChamp']);
									}
								}

						}
					}
				}
				
				// On supprime les virgules dans notre tableau
				$champsUpdate = rtrim($champsUpdate, ", ");
				
				// On va gérer le suivi des modifications
				if ($tableDefinition['suiviModification']) {
					$requete = "UPDATE " . $tableDefinition['nomTable'] ." SET " . $champsUpdate . ", idModification = " . $_SESSION['id'] . ", dateModification = '" . date("Y-m-d G:i:s") . "' WHERE " . $tableDefinition['nomID'] ." = :id";
				}
				else {
					$requete = "UPDATE " . $tableDefinition['nomTable'] ." SET " . $champsUpdate . " WHERE " . $tableDefinition['nomID'] ." = :id";
				}

				$resultRequete = $myPDO->myQueryPrepareExecute(array(
					'requete' => $requete,
					'donnees' => $executeArray,
				));
				$idInsert = (int)$this->get_Valeur($tableDefinition['nomID']);
			}
			else {
				$idInsert = null;
				$executeArray = array();
				$champsDefinition = "";
				$champsValeur = "";

				foreach ($classeDefinition as $champTable){
					if ($champTable['ajoutTable']) {
						if (!isset($champTable['definition']['ClasseParent']) && !isset($champTable['definition']['ClasseLien'])) {
							// On gère l'exception pour les champs de la classe parent qui sont recopiés dans la table en cours
							if (!isset($champTable['definition']['RecopieEnfant']) || (isset($champTable['definition']['RecopieEnfant']) && $champTable['definition']['RecopieEnfant'])) {
								if ($champTable['definition']['NomChamp'] != $tableDefinition['nomID']) {
									$champsDefinition = $champsDefinition . $champTable['definition']['NomChamp'] . ",";
									$champsValeur = $champsValeur . ":" . $champTable['definition']['NomChamp'] . ", ";
									$executeArray[$champTable['definition']['NomChamp']] = ($this->get_Valeur($champTable['definition']['NomChamp']) ? $this->get_Valeur($champTable['definition']['NomChamp']) : null);
								}
							}
						}
					}
				}
				// On va gérer le suivi des modifications
				if ($tableDefinition['suiviModification']) {
					$champsDefinition = $champsDefinition . 'idCreation,dateCreation';
					$champsValeur = $champsValeur . ':idCreation,:dateCreation';
					$executeArray['idCreation'] = (isset($_SESSION['id']) ? $_SESSION['id'] : '0');
					$executeArray['dateCreation'] =  date("Y-m-d G:i:s");
				}
				else {
					// On supprime les virgules dans nos tableaux
					$champsDefinition = rtrim($champsDefinition, ",");
					$champsValeur = rtrim($champsValeur, ", ");
				}
				$resultRequete = $myPDO->myQueryPrepareExecute(array(
					'requete' => "INSERT INTO " . $tableDefinition['nomTable'] . " (" . $champsDefinition . ") VALUES (" . $champsValeur .")",
					'donnees' => $executeArray,
				));
				$idInsert = $myPDO->insertLastID();

				/* On va gérer maintenant les classes liées (parent ou pas) afin de les enregistrer dans la table _classLiens
				qui va nous permettre de gérer tous les liens entres classes (surtout pour la suppression).
				Dans cette table, nous enregistrerons uniquement que des informations sommaires (classes, ID, type lien). La récupération
				des données se fera ou pas au chargement de l'objet. */
				// On va vérifier si la table parent est différente de MyERP
				$classParent = strcmp(get_parent_class($this),'MyERP') === 0 ? false : true;
				foreach ($classeDefinition as $champTable) {
					// On est dans le cas d'une classe parent en mode table lié
					if ($classParent && !$champTable['ajoutTable']) {
						// On va peupler notre classe avec nos champs
						$maClasseParent = get_parent_class($this);
						$maClasseParent = new $maClasseParent();

						foreach ($this as $cleObjet => $valeurChampObjet) {
							foreach ($maClasseParent as $cleObjetParent => $valeurChampObjetParent) {
								if (strcmp($cleObjetParent,$cleObjet) === 0) {
									$maClasseParent->set_Valeur($cleObjetParent,$valeurChampObjet);
								}
							}
						}
						$idClassParent = $maClasseParent->set_ObjetToBase();

						// On ajoute le lien de notre base
						$maClasseLien = new MyClassLiens();
						$maClasseLien->set_Valeur('classLienType','1');
						$maClasseLien->set_Valeur('classLienDestObjet',get_parent_class($this));
						$maClasseLien->set_Valeur('classLienSourceObjet',get_class($this));
						$maClasseLien->set_Valeur('classLienSourceID',$idInsert);
						$maClasseLien->set_Valeur('classLienDestID',$idClassParent);
						if ((int)$idClassParent > 0) {
							$maClasseLien->set_ObjetToBase();
						}
						break;
					}
					// On va également gérer une exception pour les classes liées
					elseif (isset($champTable['definition']['ClasseLien']) && $champTable['definition']['ClasseLien']) {
						$maClasseLien = new MyClassLiens();
						$maClasseLien->set_Valeur('classLienType','2');
						$maClasseLien->set_Valeur('classLienDestObjet',$champTable['definition']['ClasseLienDestObjet']);
						$maClasseLien->set_Valeur('classLienSourceObjet',get_class($this));
						$maClasseLien->set_Valeur('classLienSourceID',$idInsert);
						// On va peupler notre classe lien avec nos champs
						foreach ($this as $cleObjet => $valeurChampObjet) {
							if (strcmp($champTable['definition']['ClasseLienSourceObjet'],$cleObjet) === 0) {
								$maClasseLien->set_Valeur('classLienDestID',$valeurChampObjet);
								if ($valeurChampObjet) {
									$maClasseLien->set_ObjetToBase();
								}
							}
						}
					}
				}
			}
		}
		return $idInsert;
	}
	public function set_FormPostToObjet () {
		require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/fonctions/fnBDD.php';
		$tableChamps = $this->get_ObjetDefinition('base');
		foreach ($tableChamps as $champClasseLigne) {
			$objetNomCours = null;
			if (isset($champClasseLigne['definition']['ClasseParent']) && $champClasseLigne['definition']['ClasseParent']) {
				$objetNomCours = $champClasseLigne['definition']['ClasseParentLienChamp'];
				$champNomCours = $champClasseLigne['definition']['ClasseParentLienChamp'];
			}
			elseif (isset($champClasseLigne['definition']['ClasseLien']) && $champClasseLigne['definition']['ClasseLien']){
				$objetNomCours = $champClasseLigne['definition']['ClasseLienSourceObjet'];
				$champNomCours = $champClasseLigne['definition']['ClasseLienSourceObjetNomChamp'];
				$exceptionLien = strcmp($champClasseLigne['definition']['ClasseLienDestObjet'],'Fichier') === 0 ? 'Fichier' : null;
			}
			if ($objetNomCours) {
				if ($exceptionLien) {
					switch ($exceptionLien) {
						case 'Fichier':
							$valeurTrouve = true;
							foreach ($_FILES as $cle => $valeur) {
								if (strcmp($champClasseLigne['definition']['ClasseLienSourceObjet'],$cle) === 0) {
									// On va créer un fichier uniquement si celui-ci est défini dans le formulaire
									if ($valeur['error'] <> 4) {
										require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/Fichier.php';
										$monFichier = new Fichier();
										$idFichier = $monFichier->set_ObjetToBase(array('type' => 'images'));
										$this->set_Valeur($champClasseLigne['definition']['ClasseLienSourceObjet'],$idFichier);
									}
								}
							}
						break;
					}
				}
				else {
					// Nous ne sommes pas dans une exception fichier donc, on va simplement lié la valeur à l'objet pour l'enregistrer dans la 
					// table _classLiens
					foreach ($_POST as $cle => $valeur) {
						if (strcmp($cle,$champNomCours) === 0) {
							$this->set_Valeur($objetNomCours,$valeur);
						}
					}
				}
			}
			else {
				$valeurTrouve = fnForm_FormPostToObjet($this,$_POST,$champClasseLigne,$FILE = null);
			}
		}
	}

	/* Cette fonction aura pour but de supprimer un objet de la base de données.
	Cependant, avant suppression des vérifications seront effectués pour s'assurer qu'aucun lien ne sera brisé. 
	Elle renverra les valeurs suivantes en fonction du résultat:
	- '1'  : Pas de liens dans la base => suppression de l'objet
	- '2'  : Liens existants => désactivation/archivage de l'objet
	- '-1' : Erreur dans l'execution de la requete */
	public function del_ObjetFromBase ($args) {
		$this->get_ObjetFromBase(array('idObjet' => $args['idObjet']));
		$myPDO = new MyPDO();
		$fonction = 'fn' . get_class($this) . '_classeBaseDefinition';
		$tableDefinition = $fonction();

		$requeteRechercheID = "SELECT ClassLienDestID FROM my_classLiens WHERE " . "classLienDestObjet = '" . get_class($this) . "'";
		$objetAssocie = $myPDO->myQuery($requeteRechercheID);
		
		if (!$objetAssocie) {
			$requete = "DELETE FROM " . $tableDefinition['nomTable'] . " WHERE " . $tableDefinition ['nomID'] . " = " . $args['idObjet'];
			$retourRequete = $myPDO->myQueryExecOnly($requete);
			if ($retourRequete) {
				return 1;
			}
			else {
				return -1;
			}
			return 1;
		}
		else {
			$requete = "UPDATE " . $tableDefinition['nomTable'] . " SET onArchive = 1 WHERE " . $tableDefinition ['nomID'] . " = " . $args['idObjet'];
			$retourRequete = $myPDO->myQueryExecOnly($requete);
			if ($retourRequete) {
				return 2;
			}
			else {
				return -1;
			}
		}
	}
}