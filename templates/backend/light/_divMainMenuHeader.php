<header class="header">
    <a href="index.php" class="logo"><i class="ico mdi mdi-cube-outline"></i>
        <span><?php echo ($GLOBALS['Site']->get_Valeur('sousTitre') ? $GLOBALS['Site']->get_Valeur('sousTitre') : $GLOBALS['Site']->get_Valeur('titre')) ; ?></span>
    </a>
    <button type="button" class="button-close fa fa-times js__menu_close"></button>    
        <?php if (isset($_SESSION['id'])) { ?>
        <div class="user">
            <div class="avatar">
            <img src="<?php echo '/ressources/images/avatar.png'; ?>" alt=""><span class="status online"></span>
            </div>         
            <h5 class="name"><a href="index.php?profil.html"><?php echo strtoupper($_SESSION['user']);?></a></h5>
            <h5 class="position">
                Bienvenue
            </h5>
            <!-- /.name -->
            <div class="control-wrap js__drop_down">
                <i class="fa fa-caret-down js__drop_down_button"></i>
                <div class="control-list">
                    <div class="control-item"><a href="index.php?module=profil"><i class="fa fa-user"></i> Profil</a></div>
                    <?php if ($_SESSION['niveauAccesGeneral'] === 9) { ?>
                        <div class="control-item"><a href="index.php?module=parametres"><i class="fa fa-gear"></i> Paramètres</a></div>
                    <?php } ?>
                    <div class="control-item"><a href="index.php?module=logout"><i class="fa fa-sign-out"></i> Déconnexion</a></div>
                    <?php if ((isset($_SESSION['id'])) && $_SESSION['niveauAccesGeneral'] === 9) { ?>
                        <div class="control-item">
                            <hr />
                            <form method=post action=index.php>
                                <button class="btn btn-danger btn-xs" name=reset>Supprimer site</button>
                            </form>
                        </div>
                    </li>
                    <?php } ?>
                </div>
                <!-- /.control-list -->
            </div>
        </div>
        <?php } else { ?>
            <div class='text-center'><a href="index.php?module=login" class='btn btn-bordered'>Connexion</a></div>
        <?php } ?>
    
    <!-- /.user -->
</header>