<br />
<div class="col-md-3 col-sm-3"></div>
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="jumbotron">
        <?php
        if (isset($_POST['source']) && $_POST['source'] === 'ajax') {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/class/myERP.php';
        }
        require_once $_SERVER['DOCUMENT_ROOT'] . '/frameworks/myFramework/fonctions/fn_myERP.php';
        // On va lister nos dossiers afin de faire la mise à jour des class
        $listeClassePlugin = listeDossiers(array(
            'dossier' => 'classe',
            'plugin' => $_POST['plugin']
        ));
        foreach ($listeClassePlugin as $classe) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $_POST['plugin'] . '/class/' . $classe;
            $classe = str_replace('.php','',$classe);
            $maClasse = new $classe;
            $maClasse->set_ObjetDefinitionToBase();
            echo '<h5>Mise à jour de la classe ' . $classe . ' effectuée</h5>';
        }
        ?>
        <hr>
        <p>Mise à jour du plugin terminée</p>
    </div>
<div class="col-md-6 col-sm-6 col-xs-12"></div>