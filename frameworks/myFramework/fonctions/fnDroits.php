<?php
/* Cette fonction va nous renvoyer le niveau d'accès
 accordé à l'utilisateur. Il renverra la valeur en 
 fonction des droits ci-dessous.

-- Sur l'intégralité de la base --
    0- Aucun accès (par défaut)
    9- Droits super-admin
-- Sur Entité uniquement --
    1- Lecture seule
    2- Modification sans droit de suppression
    3- Accès complet

*/

function fnDroits_getTypeAccesPage ($args = null) {
    $niveauDroit = 0;
    if ((int)$_SESSION['niveauAccesGeneral'] === 9 ) {
        $niveauDroit = 9;
    }
    else {

    }

    return $niveauDroit;
}