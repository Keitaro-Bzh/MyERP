<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/classFonctions/fnClasse_Tiers.php';

class Tiers extends MyERP
{
	protected $idTiers;
    protected $onArchive;
    
    protected $Banque;
    protected $Titulaire;
    protected $Personne;
    protected $Societe;
}