<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myECommerce/class/classFonctions/fnClasse_Vendeur.php';

class Client extends Societe
{
	protected $idVendeur;
	protected $onArchive;
}