<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/classFonctions/fnClasse_Fichier.php';

class Fichier extends MyERP
{
	protected $idFichier;
	protected $date;
	protected $type;
	protected $nomFichier;
	protected $chemin;
	
	public function __construct($args = null) {
		parent::__construct($args);
	}
	
	// On va surcharger la fonction qui va uploader le ficher après la création due l'entrée base
	function set_ObjetToBase($args = null) {
		foreach ($_FILES as $cle => $fichier){
			if ($fichier['error'] !== 4) {
				// On va vérifier la présence de notre fichier et on va créer celuic-i si besoin
				$repertoireBase = strtolower('/ressources/' . $args['type'] . '/' . $cle . '/');
				if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $repertoireBase)) { mkdir($_SERVER['DOCUMENT_ROOT'] . $repertoireBase,0777,true); }
				
				// On transfère notre fichier dans le dossier désiré
				$extension = new SplFileInfo($fichier['name']);
				$nomFichier = time() . '-' . $_SESSION['id'] . '.' .  $extension->getExtension();
				$resultat = move_uploaded_file($fichier['tmp_name'],$_SERVER['DOCUMENT_ROOT'] . $repertoireBase . strtolower($nomFichier));
				
				// On enregistre notre fichier dans la base
				$this->date = date('Y-m-d');
				$this->type = $cle;
				$this->nomFichier = $nomFichier;
				$this->chemin = $repertoireBase;
				$this->idFichier = parent::set_ObjetToBase();
				return $this->idFichier;
			}
		}
	}
}

