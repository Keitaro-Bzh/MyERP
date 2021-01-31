<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_Action.php';

class Action extends MyERP {
	protected $idAction;
	protected $valeur;
	protected $qte;
	protected $prixRevient;
	protected $fraisAchat;
	protected $MontantTotal;

	protected $Compte;
}