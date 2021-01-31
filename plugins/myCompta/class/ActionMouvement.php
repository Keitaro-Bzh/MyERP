<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_ActionMouvement.php';

class ActionMouvement extends Action {
	protected $idActionMouvement;
	protected $typeMouvement;
	protected $typeReglement;
	protected $qte;
	protected $prixAchat;
	protected $montantAchat;
}