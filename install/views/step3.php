<div id="wrapper">
        <div class="main-content">
                <div class='row'>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="box-content">
                                        <h4 class="box-title">
                                        Bienvenue dans l'appliance MyERP
                                        <small>Personnalisation du site</small>
                                        </h4>
                                        <form method=post action="index.php" class="form-horizontal form-label-left">
                                                <h1>Bienvenue dans l'appliance MyERP</h1>
                                                <input type=hidden value=3 name=step />
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="siteName">Nom du site <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="text" name=siteName id="siteName" required="required" class="form-control controlForm-sitename" value=MyERP>
                                                        </div>
                                                </div>
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="siteAdmin">Identifiant de l'administrateur <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="text" name=siteAdmin id="siteAdmin" required="required" class="form-control controlForm-username" value=admin>
                                                        </div>
                                                </div>
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="siteAdminPass">Mot de passe de l'administrateur <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="password" name=siteAdminPass id="siteAdminPass" required="required" class="form-control controlForm-pass" value=password>
                                                        </div>
                                                </div>
                                                <div class="item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="siteAdminEmail">Email de l'administrateur <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 ">
                                                                <input type="text" name=siteAdminEmail id="siteAdminEmail" required="required" class="form-control controlForm-email" value="admin@domain.com">
                                                        </div>
                                                </div>
                                                <button class='btn btn-dark'>Suivant</button>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</div>