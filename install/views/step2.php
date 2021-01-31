<div id="wrapper">
        <div class="main-content">
                <div class='row'>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="box-content">
                                        <h4 class="box-title">
                                        Bienvenue dans l'appliance MyERP
                                        <small>Définition de la base de données</small>
                                        </h4>
                                        <?php
                                        if ($msgErreur) { ?>
                                        <div class=error>
                                        <div class="alert alert-danger alert-dismissible " role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        </button>
                                        Erreur de connexion: <br />
                                        <?php echo $msgErreur; ?>
                                        </div>
                                                
                                        </div>
                                        <?php } ?>
                                        <form method=post action="index.php" class="form-horizontal form-label-left">
                                                <input type=hidden value=2 name=step />
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="baseAddress">Adresse <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="text" name=baseAddress id="baseAddress
                                                        " required="required" class="form-control controlForm-baseaddress" value=localhost>
                                                        </div>
                                                </div>
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="basePort">Port <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="text" name=basePort id="basePort" required="required" class="form-control controlForm-entier" value=3306>
                                                        </div>
                                                </div>
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="baseName">Nom de la base <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="text" name=baseName id="baseName" required="required" class="form-control controlForm-basename" value=MyERP>
                                                        </div>
                                                </div>
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="baseUser">Utilisateur <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="text" name=baseUser id="baseUser" required="required" class="form-control controlForm-username" value=user>
                                                        </div>
                                                </div>
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="basePass">Mot de passe <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="password" name=basePass id="basePass" required="required" class="form-control controlForm-pass" value=pass>
                                                        </div>
                                                </div>
                                                <button class='btn btn-dark'>Suivant</button>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</div>