<section class="my_account_area pt--80 pb--55 bg--white">
	<div class="container">
		<div class="row">
			<div class='col-lg-3'></div>
			<div class="col-lg-6 col-12">
				<div class="my__account__wrapper">
					<?php if (isset($erreurLogin) && ($erreurLogin)) { ?>
                        <div class="alert alert-danger alert-dismissible " role="alert">
                            <?php echo $erreurLogin; ?>
                        </div>
                    <?php } ?>
					<form method=post action="#">
						<div class="account__form">
							<div class="input__box">
								<label>E-mail <span>*</span></label>
								<input type="text" name='username' >
							</div>
							<div class="input__box">
								<label>Mot de passe<span>*</span></label>
								<input type="password" name='password' >
							</div>
							<div class="form__btn">
								<button name=login >Inscription</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>