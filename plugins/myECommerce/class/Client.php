<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/myECommerce/class/classFonctions/fnClasse_Client.php';

class Client extends User
{
	protected $idClient;
	protected $User;

	/* Fonctions issues de la class MyERP surchargées */
	public function get_ObjetDefinition($typeDef,$options = null) {
		return parent::get_ObjetDefinition($typeDef,array('insertChampClasseParentTableCours' => false));
	}
}