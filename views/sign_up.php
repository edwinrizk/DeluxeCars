<?php 
ob_start();
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">

				<form class="login100-form validate-form flex-sb flex-w" method="POST" action=" validation_inscpriton"> 
					<span class="login100-form-title p-b-32">
						création de compte
					</span>
                    <span class="txt1 p-b-11">
						Nom
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "  nom requis">
						<input class="input100" type="txt" name="nom" required >
						<span class="focus-input100"></span>
					</div>
                    <span class="txt1 p-b-11">
						Prénom
					</span>
					<div class="wrap-input100 validate-input m-b-36"  data-validate = " prénom requis">
						<input class="input100" type="txt" name="prenom" required >
						<span class="focus-input100"></span>
					</div>
                    <span class="txt1 p-b-11">
						Pseudo
					</span>
					<div class="wrap-input100 validate-input m-b-36"  data-validate = " pseudo requis">
						<input class="input100" type="txt" name="login" required >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						n° de telephone
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = " telephone requis">
						<input class="input100" type="number" name="telephone" required >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						date d'obtention de permis 
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = " date  requis">
						<input class="input100" type="date" name="date_permis" required >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "email requis">
						<input class="input100" type="email" name="email" required >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						mot de passe 
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "mot de passe requis">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass"  required>
						<span class="focus-input100"></span>
					</div>
                    
					
					
					<div class="flex-sb-m w-full p-b-48">
<!--
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
-->                      
						<div>
							<a href="<?= URL?>login" class="txt3">
								déja un compte? connecter vous 
							</a>
						</div>
                    </div>


					<div class="container-login100-form-btn">
						<input type="submit" value="Créer" name="creer"  class="login100-form-btn">
						<p>&nbsp</p>
						
						<a href="<?= URL?>accueil"	<button class="login100-form-btn">
							retour
						</button> </a>
					</div>

				</form>
			</div>
		</div>
	</div>

<?php
$content= ob_get_clean();
require "templatecreationlogin.php"?>