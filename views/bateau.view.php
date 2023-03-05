<?php 
ob_start();
$content= ob_get_clean();
require "template.php"; 
?>

  <!-- Véhicules -->
  <section class="vehicule" id="vehicule">
    
    <div class="heading">s
        <span> Meilleur service</span>
        <h1> Explorez nos Locations</h1>
    </div>
    <div class="services-container">
        <?php
        for($i=0; $i <count($voitures);$i++): 
            if($voitures[$i]->getType()=="bateau"):
        ?>
        <div class="box">
            <div class="box-img">
              <a href="<?= URL ?>vehicules/v/<?= $voitures[$i]->getId(); ?>">  <img src="img/<?= $voitures[$i]->getImage(); ?>" alt=""></a>
            </div>
            <p><?= $voitures[$i]->getDateCirculation(); ?></p>
            <h3><?= $voitures[$i]->getMarque();?> <?= $voitures[$i]->getModele(); ?></h3>
            <h2><?= $voitures[$i]->getPrixjournalier(); ?> euros<span>/jour</span></h2>
            <a href=" <?= URL ?>vehicules/v/<?= $voitures[$i]->getId(); ?>" class="btn">Details</a>
        </div>
        <?php endif; ?>
        <?php endfor; ?>

        </div>
    </section>

    <div class="copyright">
        <p>&#169; Deluxe Cars tout droits réservés</p>
        <div class="social">
            <a href="#"><i class='bx bxl-facebook' ></i></a>
            <a href="#"><i class='bx bxl-twitter' ></i></a>
            <a href="#"><i class='bx bxl-instagram' ></i></a>
        </div>
    </div>
    <!-- Lien vers JS-->
    <script src="js/main.js"></script>

</body>

</html>