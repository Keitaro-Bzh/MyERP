<div class="content">
    <div class="navigation">
        <ul class="menu js__accordion">
            <li class="current">
                <a class="waves-effect" href="index.php"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Accueil</span></a>
            </li>
            <?php if (isset($_SESSION['id'])) { ?>
                <li>
                    <a class="waves-effect" href="index.php?module=calendrier"><i class="menu-icon fa fa-calendar"></i><span>AGENDA</span></a>
                </li>

                <?php
                // On va intégrer de manière dynamique le menu de nos plugins
                $listePlugin = listeDossiers(array('dossier' => 'plugins'));
                foreach($listePlugin as $definitionPlugin) {
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/plugins/' . $definitionPlugin . '/' . $definitionPlugin .'.php';
                    $nomFonction = $definitionPlugin . "GetMenuPersonnalisation";
                    $personnalisationMenu = $nomFonction();
                // On va aficher le titre du plugin récupéré dans le fichier de conf
                ?>
                <li>
                    <a class="waves-effect parent-item js__control" href="#">
                    <i class="menu-icon <?php if (isset($personnalisationMenu['icone'])) { echo $personnalisationMenu['icone']; } else { echo 'fa fa-folder-open'; }?>"></i> <?php echo $personnalisationMenu['titre']; ?></i>
                    </a>
                    <ul class="sub-menu js__content">
                        <?php
                            $nomFonction = $definitionPlugin . "GetListeRubrique";
                            $listeRubrique = $nomFonction();
                            foreach ($listeRubrique as $rubrique) { 
                                if (!isset($rubrique['masqueMenu'])) {?>
                                    <li>
                                        <?php if (is_array($rubrique)) { ?>
                                            <a href="index.php?module=<?php echo $definitionPlugin; ?>&rubrique=<?php echo $rubrique['nom']; ?>">
                                                <?php echo $rubrique['nom']; ?>
                                            </a>
                                        <?php } else {
                                            echo '__________________';
                                        } ?>
                                    </li>
                            <?php }
                            }
                            if ($GLOBALS['Site']->get_Valeur('onDebug')) {
                                echo '<li>__________________</li>' ?>
                                <li>
                                    <a href="index.php?module=<?php echo $definitionPlugin; ?>&rubrique=infoPlugin">Info Plugin</a>
                                </li>
                            <?php }
                        ?>
                    </ul>
                </li>
                <?php } ?>
                <!-- On ne va afficher le module DEBUG que si ceci est activé dans les paramètres généraux -->
                <?php if ($GLOBALS['Site']->get_Valeur('onDebug')) { ?>
                    <li>
                        <a class="waves-effect" href="index.php?module=debug"><i class="menu-icon fa fa-bug"></i><span>DEBUG</span></a>    
                    </li>
                <?php } ?>
        </ul>




            <?php 
            /* FIN MENU USER */
            } else { 
            /* DEBUT MENU INVITE */   
            ?>
            <li>
                <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-file-code-o"></i><span>DOCUMENTATION</span><span class="menu-arrow fa fa-angle-down"></span></a>
                <ul class="sub-menu js__content">
                    [Fonctionnement]
                    <li><a href="index.php?module=doc&rubrique=install">Installation</a></li>
                    [Développement]
                    <li><a href="index.php?module=doc&rubrique=routage">Gestion du Routage</a></li>
                    <li><a href="index.php?module=doc&rubrique=plugins">Gestion des Plugins</a></li>
                    <li><a href="index.php?module=doc&rubrique=class">Gestion des Classes</a></li>
                </ul>
            </li>
            <li>
                <a class="waves-effect" href="index.php?module=demo"><i class="menu-icon fa fa-gamepad"></i><span>DEMONSTRATION</span></a>
            </li>
            <li>
                <a class="waves-effect" href="https://github.com/Keitaro-Bzh/MyERP"><i class="menu-icon fa fa-download"></i><span>TELECHARGEMENT</span></a>
            </li>
            <?php } 
            /* FIN MENU INVITE */ ?>
        </ul>
    </div>
</div>