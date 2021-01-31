<?php
/* Va nous permettre d'afficher le contenu d'une variable via le var_dump
directement mis en forme */
function fnDebug_varDump($args,$filtre = null) {
    if (isset($filtre)) {
            if (strcmp($filtre['classFiltre'],$filtre['classCours']) === 0) {
                fnDebug_afficheDump($args);
            }
    }
    else {
        fnDebug_afficheDump($args);
    }
}

function fnDebug_afficheDump($args) {
    echo '<pre>';
    var_dump($args);
    echo '</pre>';
}