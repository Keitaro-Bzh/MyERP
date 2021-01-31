<?php
// On va définir notre classe
class MyConfig
{
	// Définition des variables correspondant à notre table dans la base
	private $sqlConfig = array();
	
	/* On va créer notre fonction qui va établir la connexion
	 * Celle-ci sera renvoyé pour être réutilisé dans d'autres fonctions 
	 * ou endroit sur le site
	 */
	public function getSQLConfig(){
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.xml')){
			$this->sqlConfig['baseType'] = $this->parcoursConfigXML('type');
			$this->sqlConfig['baseAddress'] = $this->parcoursConfigXML('address');
			$this->sqlConfig['baseName'] = $this->parcoursConfigXML('name');
			$this->sqlConfig['baseUser'] = $this->parcoursConfigXML('username');
			$this->sqlConfig['basePass'] = $this->parcoursConfigXML('password');
			$this->sqlConfig['basePort'] = $this->parcoursConfigXML('port');
			//fclose('config.xml');
		}
		else {
			$this->sqlConfig = null;
		}
		return($this->sqlConfig);
	}
	
	/* On va créer une fonction qui va récupérer la valeur d'un node XML dé
	 * définit en paramètre
	 */
	private function parcoursConfigXML($remoteParam) {
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.xml')){
			$dom = new DomDocument;
			$dom->load($_SERVER['DOCUMENT_ROOT'] . '/config.xml');
			$paramSQL = $dom->getElementsByTagName($remoteParam);
			if ($paramSQL) {
				foreach ($paramSQL as $param) {
					return $param->firstChild->nodeValue;
				}
			}
		}
	}
}
?>