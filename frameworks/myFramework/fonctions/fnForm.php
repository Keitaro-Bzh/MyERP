<?php

/* ---------------------------------------------------------------------------------------------------------------------
 * ---------------------------------------------------------------------------------------------------------------------
 *		FONCTIONS DE MISE EN FORME SPECIFIQUES AUX FORMULAIRES
 * ---------------------------------------------------------------------------------------------------------------------
 * --------------------------------------------------------------------------------------------------------------------- */

/* Fonction utilisée dans le fichier de class MyERP qui va analyser les champs
    issus d'un formulaire de saisie */
function fnForm_FormPostToObjet($objet,$POST,$champClasseLigne,$FILE = null) {
    $valeurTrouve = false;
    foreach ($POST as $cle => $valeur) {
        if (strcmp($champClasseLigne['champClasse'],$cle) === 0) {
            $valeurTrouve = true;
            switch ($champClasseLigne['definition']['TypeChamp']){
                case 'radio':
                    if (strcmp($valeur,'null') === 0){
                        $objet->set_Valeur($cle,null);
                    }
                    break;
                case 'Double' :
                    $objet->set_Valeur($cle,fnBDD_formToBaseDouble($valeur));
                    break;
                case 'int' :
                    $objet->set_Valeur($cle,fnBDD_formToBaseInt($valeur));
                    break;
                case 'tinyint':
                    $objet->set_Valeur($cle,fnBDD_formToBaseCheckBox($valeur));
                    break;
                default:
                    $objet->set_Valeur($cle,$valeur);
                    break;
            }
        }
    }
    return $valeurTrouve;
}