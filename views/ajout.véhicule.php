<?php 
ob_start();
?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">

				<form class="login100-form validate-form flex-sb flex-w" method="POST" action=" validation_inscpriton"> 
					<span class="login100-form-title p-b-32">
						ajout de Véhicule
					</span>
                    <span class="txt1 p-b-11">
						model
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "  nom requis">
						<input class="input100" type="txt" name="model" required >
						<span class="focus-input100"></span>
					</div>
                    <span class="txt1 p-b-11">
						marque
					</span>
					<div class="wrap-input100 validate-input m-b-36"  data-validate = " prénom requis">
						<input class="input100" type="txt" name="marque" required >
						<span class="focus-input100"></span>
					</div>
                    <span class="txt1 p-b-11">
						image
					</span>
					<div class="wrap-input100 validate-input m-b-36"  data-validate = " pseudo requis">
						<input class="input100" type="file" name="image" required 
                        accept="image/png, image/jpeg">
						
                        <span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						kilometrage
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = " telephone requis">
						<input class="input100" type="number" name="kilometre" required >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						prix journalier
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = " date  requis">
						<input class="input100" type="number" name="prix_journalier" required >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
                        prix PRIX JEUNE CONDUCTEUR
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "email requis">
						<input class="input100" type="number" name="prix_jeune" required >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Type
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "mot de passe requis">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="radio" name="type" value="voiture" >
                        <input class="input100" type="radio" name="type" value="bateau"  required>
						<span class="focus-input100"></span>
					</div>
                    
					
					<span class="txt1 p-b-11">
						passager
					</span>
					<div class="wrap-input100 validate-input m-b-12" >
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="number" name="passager"  required>
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