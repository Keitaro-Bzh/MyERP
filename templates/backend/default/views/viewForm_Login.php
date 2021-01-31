<!-- On va afficher un cadre dans le cas    d'une démo reprenant le nom d'utilisateur et le mot de passe !-->
<div id="single-wrapper">
	<form action="index.php?module=login" method=post class="frm-single">
		<div class="inside">
			<div class="title"><strong>MyERP</strong></div>
			<div class="frm-title">Connexion</div>

			<div class="frm-input"><input type="text" name='username' placeholder="Nom d'utilisateur" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<div class="frm-input"><input type="password" name='password' placeholder="Mot de passe" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>

			<button type="submit" name=login class="frm-submit">Entrer<i class="fa fa-arrow-circle-right"></i></button>
            <?php 
                if (isset($erreurLogin) && ($erreurLogin)) {
            ?>
                <div class="alert alert-danger alert-dismissible " role="alert">
                    <?php echo $erreurLogin; ?>
                </div>
            <?php } ?>
			<!--<a href="#" class="a-link"><i class="fa fa-key"></i>Création d'un compte</a>-->
		</div>
	</form>
</div>

