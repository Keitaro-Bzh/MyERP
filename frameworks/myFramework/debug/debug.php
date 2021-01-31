
<h1>Mode debug</h1>
<h2> Affichage des variables globales</h2>
<?php
    echo 'Variable $GLOBALS';
    echo '<pre>';
    var_dump($GLOBALS);
    echo '</pre>';

    echo 'Variable $_SESSION';
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
?>