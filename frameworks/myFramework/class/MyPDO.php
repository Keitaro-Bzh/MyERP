<?php
class MyPDO
{
	protected $myDonnees;
	protected $myConnexion;

	public function __construct() {
		require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyConfig.php';
		$maConfig = new MyConfig();
		$tabSqlParam = $maConfig->getSQLConfig();
		switch ($tabSqlParam['baseType']) {
			case 'MariaDB' :	try {
				$this->myConnexion = new PDO('mysql:host='. $tabSqlParam['baseAddress'] .';dbname=' . $tabSqlParam['baseName'] .
						';charset=utf8',$tabSqlParam['baseUser'],$tabSqlParam['basePass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}
			catch (Exception $e)
			{
				$this->myConnexion = null;
				die('bdd.php => Erreur SQL: ' . $e->getMessage());
			}
				break;
			default:
				$this->myConnexion = null;
				break;
		}
		unset($maConfig);
	}
	
	public function insertLastID() {
		return $this->myConnexion->lastInsertId();
	}
	public function myQueryPrepareExecute($args) {
		return $this->myConnexion->prepare($args['requete'])->execute($args['donnees']);
	}

	public function myQuery($requeteRemote){
		$this->myDonnees = null;
		$resultatRequete = $this->myConnexion->query($requeteRemote);
		if ($resultatRequete) {
			$donnees = $resultatRequete->fetch(PDO::FETCH_ASSOC);
			$resultatRequete->closeCursor();
			if($donnees) {
				foreach ($donnees as $cle => $valeur) {
					$this->myDonnees[$cle] = $valeur;
				}
			}
		}
		return $this->myDonnees;
	}

	public function myQueryExecOnly($requeteRemote){
		$this->myConnexion->query($requeteRemote);
	}

	public function myQuery_arrayList($requeteRemote,$typeTableau = null){
		$this->myDonnees = null;
		$resultatRequete = $this->myConnexion->query($requeteRemote);
		if ($resultatRequete) {
			if (isset($typeTableau)) {
				switch ($typeTableau) {
					case 'assoc':
						$this->myDonnees = $resultatRequete->fetchAll(PDO::FETCH_ASSOC);
						break;
					case 'num':
						$this->myDonnees = $resultatRequete->fetchAll(PDO::FETCH_NUM);
						break;
				}
			}
			else {
				$this->myDonnees = $resultatRequete->fetchAll();
			}
		}
		return $this->myDonnees;
	}

	public function videTable($nomTable) {
		$requete = 'TRUNCATE TABLE ' . $nomTable;
		$requete = $this->myConnexion->prepare($requete);
		$requete->execute();
		$requete->closeCursor();
	}

	public function resetBase() {
		$this->myDonnees = array();
		$resultRequete = $this->myConnexion->query("SHOW TABLES");
		if ($resultRequete) {
			$this->myDonnees = $resultRequete->fetchAll();
			$resultRequete->closeCursor();
			foreach ($this->myDonnees as $cle => $valeur) {
				$resultRequete = $this->myConnexion->query("DROP TABLE " . $valeur[0]);
			}
		}
	}

	public function installBase() {
        /* On va récupérer les classes de base
            dans le dossier main */
		$listeClasse = scandir($_SERVER['DOCUMENT_ROOT'] . '/main/class');
		
        foreach ($listeClasse as $classe) {
			if (isset($MyERPClass)) {
				if ($classe != '.' && $classe != '..' && $classe != 'classFonctions' ) {
					// On prépare les classes de notre plugins
					require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/' . $classe;
					$classe = rtrim($classe,'.php');
					$maClasse = new $classe;
	
					$maClasse->set_ObjetDefinitionToBase();
					unset($maClasse); 	
				}
			}
        }
	}

	/* Fonction qui va analyser notre classe et la comparer à la base de données
	 * Elle créera automatique les tables & champs dans la base. Cela permet ainsi
	 * de se dédouaner des outils SQL et surtout de pouvoir être à jour facilement
	 * après un changement de version
	 */
	public function definitionObjetToBase($args) {
		$nomTable = $args['definitionTable']['nomTable'];
		$tableDefinition = $args['definitionChamps'];

		$maConnexion = $this->myConnexion;
		// On va récupérer le nom des tables présentes dans la base
		$requete = $this->myConnexion->query("SHOW TABLES") or die(print_r($maConnexion->errorInfo()));
		$resultatListTables = $requete->fetchAll();
		$requete->closeCursor();
		// On va d'abord vérifier que la table existe et si nous avons déjà ajouté les champs pour le suivi des modifications
		$tableExiste = false;
		if ($resultatListTables) {
			//On va parcourir notre résultat à la recherche de notre table
			foreach ($resultatListTables  as $baseNomTable) {
				if (strcmp($baseNomTable[0],$nomTable) === 0) {
					$tableExiste= true;
				}
			}
		}

		if($tableExiste) {
			// La table existe, on va vérifier le contenu de chaque ligne
			$requete = $maConnexion->query("SHOW COLUMNS FROM " . $nomTable);
			$listeTables = $requete->fetchall();
			$requete->closeCursor();
			/* On va analyser dans un premier temps la définition de la table dans le fichier
			* des classes afin d'ajouter ou modifier des lignes
			*/
			foreach ($tableDefinition as $champDefinition){
				$champExiste = false;
				if ($champDefinition['ajoutTable']) {
					// On va définir une règle pour gérer les fichiers dans la définition des champs qui pointent vers un id
					// On transorme donc le type de champ en int
					if (!isset($champDefinition['definition']['ClasseParent']) && !isset($champDefinition['definition']['ClasseLien']) && strcmp($champDefinition['definition']['TypeChamp'],'image') === 0 ) {
						$champDefinition['definition']['TypeChamp'] = 'int';
					}
					foreach ($listeTables as $champBase) {
							if (!isset($champDefinition['definition']['ClasseParent']) && !isset($champDefinition['definition']['ClasseLien'])) {
								if (strcmp($champDefinition['definition']['NomChamp'],$champBase['Field']) === 0) {
									$champExiste = true;
									$modificationLigne = false;
									// On va vérifier que chaque information de la table est à jour
									// On va extraire le type de champ de la base au format de notre classe
									if (substr($champBase['Type'],0,7) === "varchar") {
										$valeurType = $champBase['Type'];
									}
									else {
										$valeurType = preg_replace('#[(0-9)]+#i','', $champBase['Type']);
									}
									if ($champDefinition['definition']['TypeChamp'] !== $valeurType) { $modificationLigne = true; }
									
									// On vérifie les paramètres de la clé primaire
									if ($champDefinition['definition']['PrimaryKey'] AND $champBase['Key'] !== 'PRI') { $modificationLigne = true; }
									if ($champDefinition['definition']['PrimaryKey'] AND $champBase['Extra'] !== 'auto_increment') { $modificationLigne = true; }
									
									// On vérifie les options
									//if ($$champDefinition['definition']['NotNull'] AND $champBase['Null'] === 'YES') { $modificationLigne = true; }
									if ($champDefinition['definition']['NotNull'] AND $champBase['Null'] === 'YES') { $modificationLigne = true; }
									
									if (!$champDefinition['definition']['PrimaryKey'] AND $champDefinition['definition']['Unique'] AND $champBase['Key'] !== 'UNI') { $modificationLigne = true; }
									
									// On va préparer la requete de mise à jour du champ
									if ($modificationLigne) {
										$requete = "ALTER TABLE " . $nomTable . " CHANGE COLUMN `" . $champDefinition['definition']['NomChamp'] . "` " .
												"`" . $champDefinition['definition']['NomChamp'] . "` " . $champDefinition['definition']['TypeChamp'] . " " .
												(($champDefinition['definition']['AutoIncrement']) ? "AUTO_INCREMENT" : "") . " " .
												(($champDefinition['definition']['NotNull']) ? "NOT NULL" : "NULL") . ",";
												// On supprime la dernière virgule et on assemble la requete
												$requete = rtrim($requete, ",");
									}
									break;
								}
								// On va vérifier si le nom du champ n'a pas été modifié
								elseif ($champDefinition['definition']['AncienNom'] === $champBase['Field']) {
									$champExiste = true;
									$modificationLigne = true;

									// On va modifier le champ
									$requete = "ALTER TABLE " . $nomTable . " CHANGE COLUMN `" . $champDefinition['definition']['AncienNom']. "` " .
											"`" . $champDefinition['definition']['NomChamp'] . "` " . $champDefinition['definition']['TypeChamp'] . " " .
											(($champDefinition['definition']['AutoIncrement']) ? "AUTO_INCREMENT" : "") . " " .
											(($champDefinition['definition']['NotNull']) ? "NOT NULL" : "NULL") . ",";
											// On supprime la dernière virgule et on assemble la requete
											$requete = rtrim($requete, ",");
											
											break;
								}
							}
					}
					if($champExiste) {
						if ($modificationLigne) {
							// On exécute la modification
							$requete = $maConnexion->prepare($requete);
							$requete->execute();
						}
					}
					else {
						if (!isset($champDefinition['definition']['ClasseParent']) && !isset($champDefinition['definition']['ClasseLien'])) {
							// On va ne recopier les champs de la classe parent sauf les champs noté "false" sur la variable
							if (!isset($champDefinition['definition']['RecopieEnfant']) || (isset($champDefinition['definition']['RecopieEnfant']) && $champDefinition['definition']['RecopieEnfant'])) {
								// On va ajouter le champ à la table
								$requete = "ALTER TABLE " . $nomTable . " ADD COLUMN " .
									"`" . $champDefinition['definition']['NomChamp'] . "` " . $champDefinition['definition']['TypeChamp'] . " " .
									(($champDefinition['definition']['AutoIncrement']) ? "AUTO_INCREMENT" : "") . " " .
									(($champDefinition['definition']['NotNull']) ? "NOT NULL" : "NULL") . ",";
									// On supprime la dernière virgule et on assemble la requete
									$requete = rtrim($requete, ",");
									// On exécute la modification
									$requete = $maConnexion->prepare($requete);
									$requete->execute();
							}
						}
					}
				}
			}
				
			// On va remettre à jour la définition de la table
			$requete = $maConnexion->query("SHOW COLUMNS FROM " . $nomTable);
			$listeTables = $requete->fetchAll();
			$requete->closeCursor();
			/* On va ensuite refaire le parcours inverse pour vérifier la présence d'un champ
			* dans la base mais supprimé ou modifié dans la table
			*/
			foreach ($listeTables as $champ){
				$champExiste = false;
				foreach ($tableDefinition as $champLigne) {
					if ($champLigne['ajoutTable']) {
						if (!isset($champLigne['definition']['ClasseParent']) && !isset($champLigne['definition']['ClasseLien'])) {
							if ($champLigne['definition']['NomChamp'] === $champ['Field']) {
								$champExiste = true;
								break;
							}
						}
						// On ne supprime pas les champs si le suivi des modifications est activé
						if ($args['definitionTable']['suiviModification']) {
							if ( $champ['Field']=== 'idCreation' || $champ['Field']=== 'dateCreation' || $champ['Field']=== 'idModification' || $champ['Field']=== 'dateModification') {
								$champExiste = true;
								break;
							}
						}
					}
				}
				// Le champ n'existe pas dans la classe, on supprime
				if (!$champExiste) {
					// On va supprimer le champ
					$requete = "ALTER TABLE " . $nomTable . " DROP COLUMN `" . $champ['Field']. "` ";
					// On supprime la dernière virgule et on assemble la requete
					$requete = rtrim($requete, ",");
					// On exécute la modification
					$requete = $maConnexion->prepare($requete);
					$requete->execute();
				}
			}
			
			// On va ajouter dans la table la gestion des dates de creation/modification
			$ajoutMod = true;
			foreach ($listeTables as $nomChamp) {
				if ( $nomChamp['Field'] === 'dateModification') {
					$ajoutMod = false;
					break;
				}
			}
			if ($args['definitionTable']['suiviModification'] && $ajoutMod) {
				$requete = "ALTER TABLE " . $nomTable . " ADD COLUMN idCreation int NOT NULL";
				$requete = $maConnexion->prepare($requete);
				$requete->execute();
				
				$requete = "ALTER TABLE " . $nomTable . " ADD COLUMN dateCreation datetime NOT NULL AFTER idCreation";
				$requete = $maConnexion->prepare($requete);
				$requete->execute();
				
				$requete = "ALTER TABLE " . $nomTable . " ADD COLUMN idModification int NULL AFTER dateCreation";
				$requete = $maConnexion->prepare($requete);
				$requete->execute();
				
				$requete = "ALTER TABLE " . $nomTable . " ADD COLUMN dateModification datetime NULL AFTER idModification";
				$requete = $maConnexion->prepare($requete);
				$requete->execute();
			}
			
		}
		else {
			// On préparer la requête de création
			$champsRequete = null;
			// On va définir nos champs
			foreach ($tableDefinition as $definitionChamp) {
				if ($definitionChamp['ajoutTable']) {
					if (!isset($definitionChamp['definition']['ClasseLien']) && !isset($definitionChamp['definition']['ClasseParent'])) {
						// On va gérer le cas ou il y a recopie des champs de la table Parent et ne pas recopier les champs ID
						if (($definitionChamp['definition']['PrimaryKey'])) {
							// On va vérifier que le champ correspond bien à l'ID défini dans notre classe en cours et pas notre classe parent
							// On va définir notre PIRMARY KEY
							if (strcmp($definitionChamp['definition']['NomChamp'],$args['definitionTable']['nomID']) === 0) {
								$primaryKey = $definitionChamp['definition']['NomChamp'];
								$champsRequete =  $champsRequete . "`" . $definitionChamp['definition']['NomChamp'] . "` " . $definitionChamp['definition']['TypeChamp'] . " " .
								(($definitionChamp['definition']['AutoIncrement']) ? "AUTO_INCREMENT" : "") . " " .
								(($definitionChamp['definition']['NotNull']) ? "NOT NULL" : "NULL") . ",";
							}
						}
						else {
							$champsRequete =  $champsRequete . "`" . $definitionChamp['definition']['NomChamp'] . "` " . $definitionChamp['definition']['TypeChamp'] . " " .
								(($definitionChamp['definition']['AutoIncrement']) ? "AUTO_INCREMENT" : "") . " " .
								(($definitionChamp['definition']['NotNull']) ? "NOT NULL" : "NULL") . ",";
						}
					}
				}
			}

			// On supprime la dernière virgule et on assemble la requete
			$champsRequete = rtrim($champsRequete, ",");
			// On assemble notre requete finale
			$requete = "CREATE TABLE " . $nomTable . " (" . $champsRequete;

			// On va ajouter dans la table la gestion des dates de creation/modification
			if ($args['definitionTable']['suiviModification']) {
				$requete = $requete . ' ,' .
					' `idCreation` int NOT NULL, ' . 
					' `dateCreation` datetime NOT NULL, ' .
					' `idModification` int NULL, ' .
					' `dateModification` datetime NULL ';
			}
			
			// On ajoute la PIRMARY KEY si elle existe
			if ($args['definitionTable']['nomID']) {
				$requete = $requete . ', PRIMARY KEY (`' . $primaryKey . '`));';
			}
			// On ajoute notre table
			$requete = $this->myConnexion->prepare($requete)->execute();
		}
	}
}