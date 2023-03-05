<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DELUXE CAR</title>
    <!-- lien css-->
    <link rel="stylesheet" href="<?= URL ?>css/style.css" />
    <!-- Box Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
    
</head>

<body>

    <!-- Header-->
    <header>
        <a href="<?= URL ?>accueil" class="logo"><img src="<?= URL ?>img/jeep.png" alt=""></a>

        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="<?= URL ?>accueil">Accueil</a></li>
            <li><a href="<?= URL ?>accueil#service">Services</a></li>
            <li><a href="<?= URL ?>vehicules">Véhicule</a></li>
           <li><a href="<?= URL ?>accueil#about">A propos </a></li>
            
        </ul>
        <div class="header-btn">
        <?php if(empty($_SESSION['profil'])) : ?>
            <a href="<?= URL ?>inscription" class="sign-up"> s'inscrire</a>
            <a href="<?= URL ?>login" class="sign-in"> se connecter </a>
        <?php else : ?>
            <a href="<?= URL ?>profil" class="sign-up"> Profil</a>
            <a href="<?= URL ?>compte/deconnexion" class="sign-in"> Deconnexion </a>
        <?php endif; ?>
        </div>
    </header>
    <div><?= $content ?></div>
        
      
           
    </div>
    <!-- Lien vers JS-->
    <script src="js/main.js"></script>
    

</body>

</html>