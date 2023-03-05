<?php 
ob_start();
$content= ob_get_clean();
require "template.php"; 
?>

    <!--Home-->
    <section class="home" id="home">
        <div class="text">
            <h1> <span>Louez</span> votre <br>Véhicule haut de gamme</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Doloremque, hic deserunt?.</p>
            <div class="app-stores">
                <img src="img/ios.png" alt="">
                <img src="img/play.png" alt="">
            </div>
        </div>
        <?php if(empty($_SESSION['profil'])) : ?>

        <?php else : ?>
        <div class="form-container">
            <form action="<?= URL ?>ajout_date" method="POST">
                <div class="input-box">
                    <span>Date de départ</span>
                    <input type="date" name="date-debut" id="">
                </div>
                <div class="input-box">
                    <span>Date de retour</span>
                    <input type="date" name="date-fin" id="">
                </div>
                <input type="submit" name="" id="" class="btn">
            </form>
        </div>
        <?php endif; ?>
    </section>
    <!-- services -->
    <section class="service" id="service">
        <div class="heading">
            <span>Comment ça marche</span>
            <h1> Réserver facilement en 3 étapes</h1>
        </div>
        <div class="ride-container">
            <div class="box">
                <i class='bx bxs-map'></i>
                <h2>Choisir une Lieu</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos nulla totam fuga officia vitae cum
                    magnam, sint iusto expedita eaque, illum deleniti modi quasi soluta, nostrum placeat exercitationem
                    et consectetur.</p>
            </div>
            <div class="box">
                <i class='bx bxs-calendar-check'></i>
                <h2>Choisir une Date</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos nulla totam fuga officia vitae cum
                    magnam, sint iusto expedita eaque, illum deleniti modi quasi soluta, nostrum placeat exercitationem
                    et consectetur.</p>
            </div>
            <div class="box">
                <i class='bx bxs-calendar-star'></i>
                <h2>Réserver un Véhicule</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos nulla totam fuga officia vitae cum
                    magnam, sint iusto expedita eaque, illum deleniti modi quasi soluta, nostrum placeat exercitationem
                    et consectetur.</p>
            </div>
        </div>
    </section>

   
    <!-- A propos de -->
    <section class="about" id="about">
        <div class="heading">
            <span>A Propos de Nous</span>
            <h1> La Meilleure Expérience Client 
        </div>
        <div class="about-container">
            <div class="about-img">
                <img src="img/about.png" alt="">
            </div>
            <div class="about-text">
                <span>A Propos de Nous</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore nemo necessitatibus saepe? Modi ad, quas repellendus ea quasi totam deleniti consectetur tenetur soluta labore reiciendis quaerat similique earum deserunt. Minima placeat expedita cumque minus!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque non, sapiente necessitatibus accusantium animi autem itaque possimus mollitia!</p>
                <a href="#" class="btn">Plus d'informations</a>
            </div>
        </div>
    </section>
    <!-- Copyright -->
    <div class="copyright">
        <p>&#169; DeluxeCars tout droits réservés</p>
        <div class="social">
        <a href="#"><i class='bx bxl-facebook' ></i></a>
            <a href="#"><i class='bx bxl-twitter' ></i></a>
            <a href="#"><i class='bx bxl-instagram' ></i></a>
        </div>


 

   