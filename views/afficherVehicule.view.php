<?php 
ob_start(); 



?>
<br>
<section title="Article ">
    <div class="services-container">
        <div>
            <div name= "image-vehicule"  style="width: 640px; float: left; margin-right: 50px;"  >
                <img style="width: 100%; height: 100%;" src="<?= URL ?>img/<?= $voiture->getImage(); ?>" >

            </div>
            <div >
                <h1><?= $voiture->getMarque(); ?> : <?= $voiture->getModele();?></h1> <br>
                <p style="display: inline-block;"><h4 style="display: inline-block;">prix journalier :</h4> <?= $voiture->getPrixjournalier()?> €</p>
                <br>
                <p style="display: inline-block;"><h4 style="display: inline-block;">kilométrage :</h4 > <?=$voiture->getKilometrage()?> KM</p>
                <br>
                <p style="display: inline-block;"><h4 style="display: inline-block;">date de mise en  circulation :</h4 > <?=$voiture-> getDateCirculation()?> </p>
                <br>
                <?php  if($voiture->getType()=="bateau"):?>
                    <p style="display: inline-block;"><h4 style="display: inline-block;">nombre de passager :</h4 > <?=$voiture->getPassager()?> </p>
                <br>
                <?php endif; ?>

                <div class="header-btn">
                <a href="<?= URL ?>reserver_vehicule/<?= $voiture->getId(); ?>"><button class="louer"> louer le vehicule </button></a>
                </div>
                

            </div>
        </div>

          
       
    </div>    
</section>

        


<?php
$content = ob_get_clean();
require "template.php";
?>

