<?php 
ob_start(); 

?>
<section title="Reservation ">
    <div class="services-container">
        <div>
        <h1> location du Véhicule</h1>
        <h3><?= $voiture->getMarque(); ?> : <?= $voiture->getModele();?></h3> <br>
            <div name= "image-vehicule"  style="width: 640px; float: left; margin-right: 50px;"  >
                <img style="width: 100%; height: 100%;" src="<?= URL ?>img/<?= $voiture->getImage(); ?>" >

            </div>
            <div >
                
                <div class="form-containe">
                    <form action="<?= URL ?>recapitulatif/<?= $voiture->getId(); ?>" method="POST">
                        <div class="input-box">
                            <span>Date de départ</span>
                            <input type="date" name="date-debut" id="" value="<?= $user->getDateDebut(); ?>">
                        </div>
                        <div class="input-box">
                            <span>Date de retour</span>
                            <input type="date" name="date-fin" id="" value="<?= $user->getDateFin(); ?>">
                        </div>
                        <p style="display: inline-block;"><h4 style="display: inline-block;">prix journalier :</h4> <?= $voiture->getPrixjournalier()?> €</p>
                        <br>
                        <div class="header-btn">
                            <button class="louer"> valider les dates </button></a>
                        </div>
                    </form>
                </div>
               

            </div>
        </div>
       
    </div>    
</section>

        


<?php
$content = ob_get_clean();
require "template.php";
?>

