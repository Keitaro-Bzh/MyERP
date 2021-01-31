<?php
function fnIconHeader_User ($args = null) { ?>
    <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
    <?php if (isset($args)) { ?>
        <div class="searchbar__content setting__block">
            <div class="content-inner">
                <div class="switcher-currency">
                    <strong class="label switcher-label">
                        <span>Mon Compte</span>
                    </strong>
                    <div class="switcher-options">
                        <div class="switcher-currency-trigger">
                            <div class="setting__menu">
                                <span><a href="index.php?module=profil">Paramètres</a></span>
                                <span><a href="index.php?module=logout">Déconnexion</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="searchbar__content setting__block">
            <div class="content-inner">
                <div class="switcher-currency">
                    <strong class="label switcher-label">
                        <span>Identification</a></span>
                    </strong>
                    <div class="switcher-options">
                        <div class="switcher-currency-trigger">
                            <div class="setting__menu">
                                <span><a href="index.php?module=login">Connexion</a></span>
                                <span><a href="index.php?module=register">S'inscrire</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </li>
<?php }