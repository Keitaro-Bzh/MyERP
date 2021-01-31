<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/classFonctions/fnClass_ClassLiens.php';

class MyClassLiens extends MyERP {

    protected $idClassLiens;
    protected $classLienType;
    protected $classLienSourceObjet;
    protected $classLienSourceID;
    protected $classLienDestObjet;
    protected $classLienDestID;
    protected $classLienUnique;

    public function get_list_classLiensFromBase ($args = null) {
      $reqSourceObjet = isset($args['classeCours']) ? $args['classeCours'] : $this->classLienSourceObjet;
      $reqSourceObjetID = isset($args['classeCoursID']) ? $args['classeCoursID'] : $this->classLienSourceID;
      $reqDestObjet = isset($args['classDest']) ? $args['classDest'] : $this->classLienDestObjet;
      $myPDO = new MyPDO();
          $requeteRechercheID = "SELECT idClassLiens,ClassLienDestID FROM my_classLiens WHERE " .
            "classLienSourceObjet = '" . $reqSourceObjet . "'  AND " .
            "classLienSourceID = '" . $reqSourceObjetID . "'  AND " .
            "classLienDestObjet = '" . $reqDestObjet . "'";
          $resultRequete = $myPDO->myQuery_arrayList($requeteRechercheID,'assoc');
          return $resultRequete;
    }
}
