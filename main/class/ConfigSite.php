<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/main/class/classFonctions/fnClasse_ConfigSite.php';

// On va définir notre classe
class ConfigSite extends MyERP
{
    // Définition des variables correspondant à notre table dans la base
    protected $id;
    protected $onFrontend;
	protected $onDebug;
	protected $onRefresh;
}