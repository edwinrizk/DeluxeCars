<?php 
ob_start();
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="validation_login">
					<span class="login100-form-title p-b-32">
						connexion
					</span>

					<span class="txt1 p-b-11">
						login
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "login requis">
						<input class="input100" type="text" name="login"  >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Mot de passe requis">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass"  >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">

						<div>
							<a href="accueil" class="txt3">
							retour
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
					
						<p>&nbsp</p>
						<input type="submit" value="Connecter" name="connect"  class="login100-form-btn">
					</div>
					

				</form>
			</div>
		</div>
	</div>
	<?php
$content= ob_get_clean();
require "templatecreationlogin.php"?>
	
