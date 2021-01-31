<?php
// Liste des fichiers nécessaires au fontionnement du plugin
//require_once($_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/MyERP.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Banque.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Compte.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Action.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/ActionMouvement.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Famille.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Categorie.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Operation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Titulaire.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/class/Tiers.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/views/fonctions/fnWidget_compteDetail.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fnBanque.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fnCompte.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fnTiers.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fnOperation.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fnCategorie.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugins/myCompta/fonctions/fn_myCompta.php');