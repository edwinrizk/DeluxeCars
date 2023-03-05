<?php
session_start();


define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controller/Securite.class.php";
require_once "controller/VehiculeController.php";
require_once "controller/UtilsateurController.php";
require_once "controller/reservationController.php";

$vehiculeController = new VehiculeController;
$usercontroller = new UtilisateurController;
$reservationController = new ReservationController;




try{
    if(empty($_GET['page'])){
        require "views/accueil.view.php";
        
    } else {
        $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);

        switch($url[0]){
            case "accueil" : 
                require "views/accueil.view.php";
            break;
            case"inscription":
                require "views/sign_up.php";  
                  
            break;
            case "validation_inscpriton":
                if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) 
                && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['pass']) 
                && !empty($_POST['date_permis'])){
                    $nom = Securite::secureHTML($_POST['nom']);
                    $prenom = Securite::secureHTML($_POST['prenom']);
                    $login = Securite::secureHTML($_POST['login']);
                    $mail = Securite::secureHTML($_POST['email']);
                    $tel = Securite::secureHTML($_POST['telephone']);
                    $password = Securite::secureHTML($_POST['pass']);
                    $datepermis = Securite::secureHTML($_POST['date_permis']);
                    $usercontroller->validation_creerCompte($nom,$prenom,$login,$mail,$tel,$password,$datepermis);
                } else {
                    echo"<script> alert('tout les champs sont obligatoires');
                    window.location.href='inscription';</script>";
                    
                }
            case"login":
                require "views/login.php";
            break;
            case"validation_login":
                if(!empty($_POST['login']) && !empty($_POST['pass'])){
                    $login = Securite::secureHTML($_POST['login']);
                    $password = Securite::secureHTML($_POST['pass']);
                    $usercontroller->validation_login($login,$password);
                } else{ 
                    echo "<script>
                    window.location.href='login';
                    alert('Login ou mot de pass non renseigné');
                    </script>";
                }

            case "compte" : 
               if(!Securite::estConnecte()){
                header("location:".URL."login");
                
               } else {
                   switch($url[1]){
                       case "profil" : $usercontrollerd->profil();
                       break;
                       case "deconnexion" : $usercontroller->deconnexion();
                       break;
                       default : throw new Exception("La page n'existe pas");
                   }
                    }
                break;
            case "ajout_date":
                if(!empty($_POST['date-debut']) && !empty($_POST['date-fin'])){
                    $date_debut=Securite::secureHTML($_POST['date-debut']);
                    $date_fin=Securite::secureHTML($_POST['date-fin']);
                    $usercontroller->ajout_date($date_debut,$date_fin,$_SESSION['profil']['login']);
                }else{
                    echo "<script>
                    window.location.href='accueil';
                    ;
                    </script>";
                    

                }
                break;
            case "reserver_vehicule":
                if(!Securite::estConnecte()){
                    header("location:".URL."login");
                }else if($url[0]==="reserver_vehicule"){
                
                $reservationController->reservervehicule($url[1],$_SESSION['profil']['login']);
                }
                break;
                case "recapitulatif":
                    if(!empty($_POST['date-debut']) && !empty($_POST['date-fin'])){
                        $date_debut=Securite::secureHTML($_POST['date-debut']);
                        $date_fin=Securite::secureHTML($_POST['date-fin']);
                        $usercontroller->ajout_datereservation($date_debut,$date_fin,$_SESSION['profil']['login']);
                        if($url[0]==="recapitulatif"){
                
                            $reservationController->recapitulatif($url[1],$_SESSION['profil']['login']);
                            }       
                    }else{

                            $reservationController->reservervehicule($url[1],$_SESSION['profil']['login']);

                    }
                break;
                case "reservation":
                    if($url[0]==="reservation"){
                        echo "<script>
                    alert('dates non renseigné');
                    </script>";
                       $reservationController->reservation($url[1],$_SESSION['profil']['login']);
                        }               
                break;

              
            case "vehicules": 
                if(empty($url[1])){
                    $vehiculeController->afficherVehicules();
                }else if($url[1] === "v") {
                    $vehiculeController->afficherVehicule($url[2]);
                }else {
                    throw new Exception("La page n'existe pas");
                }
            break;
           

            case "bateau": 
                if(empty($url[1])){
                    $vehiculeController->afficherbateaux();
                }else if($url[1] === "v") {
                    $vehiculeController->afficherVehicule($url[2]);
                }else {
                    throw new Exception("La page n'existe pas");
                }
            break;
            
        }

    }
}
catch(Exception $e){};