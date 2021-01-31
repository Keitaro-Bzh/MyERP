<!-- On va afficher un cadre dans le cas d'une démo reprenant le nom d'utilisateur et le mot de passe !-->
<?php if (isset($demoLogin) && ($demoLogin)) { ?>
<div class="row">
    <div class="login_wrapper">
        <div class=" login_form">
            <section class="">
                <div class="alert alert-success alert-dismissible " role="alert">
                    <p class="text-justify">Pour pouvoir tester l'application, voici les identifiants à utiliser : </p>
                    <br />
                    <ul>
                        <li>Accès administateur: admin / password </li>
                        <li>Accès Utilisateur: user / password </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </section>
        </div>
    </div> 
</div><br /><br /><br />
<?php } ?>
<div class="row">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form class='formulaire' method=post action='index.php?module=login'>
                    <h1>Identification</h1>
                    <?php 
                        if (isset($erreurLogin) && ($erreurLogin)) {
                    ?>
                        <div class="alert alert-danger alert-dismissible " role="alert">
                            <?php echo $erreurLogin; ?>
                        </div>
                    <?php } ?>
                    <div>
                        <input type="text" name='user' class="form-control controlForm-username" placeholder="Nom d'utilisateur" required="" />
                    </div>
                    <div>
                        <input type="password" name='password' class="form-control controlForm-pass" placeholder="Mot de passe" required="" />
                    </div>
                    <div>
                        <button class="btn btn-default submit" name=login>Log in</button>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            </section>
        </div>
    </div>  
</div>
                        </div>