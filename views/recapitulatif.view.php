<?php 
ob_start(); 



?>
<br>
<section title="Article ">
    <h1>Récapitulatif</h1>
    <div class="services-container">
        <div>
            <div name= "image-vehicule"  style="width: 640px; float: left; margin-right: 50px;"  >
                <img style="width: 100%; height: 100%;" src="<?= URL ?>img/<?= $voiture->getImage(); ?>" >

            </div>
            <div >
                <h1><?= $voiture->getMarque(); ?> : <?= $voiture->getModele();?></h1> <br>
                <p style="display: inline-block;"><h4 style="display: inline-block;">nombre de jour de location : </h4> <?=$nbjour?> jours</p>
                <br>
                <p style="display: inline-block;"><h4 style="display: inline-block;">prix total : </h4> <?= $prixtotal?> €</p>
                <br>
                <p style="display: inline-block;"><h4 style="display: inline-block;">date de mise en  circulation :</h4 > <?=$voiture-> getDateCirculation()?> </p>
                <br>
                <div class="header-btn">
                <a href="<?= URL ?>reservation/<?= $voiture->getId(); ?>"><button class="louer"> réserver </button></a>
                </div>
                

            </div>
        </div>

          
       
    </div>    
</section>

        


<?php
$content = ob_get_clean();
require "template.php";
?>


