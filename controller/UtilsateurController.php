<?php


require_once "model/utilisateurManager.class.php";
class UtilisateurController{

    private $userManager;

    public function __construct(){
        $this->userManager= new UtilisateurManager;
        
    }
    public function ajout_date($date_debut,$date_fin,$login){
        $this->userManager->ajoutDateReservation($date_debut,$date_fin,$login);
        header("location: vehicules");
    }
    public function ajout_datereservation($date_debut,$date_fin,$login){
        $this->userManager->ajoutDateReservation($date_debut,$date_fin,$login);
        
    }
    

    public function validation_creerCompte($nom,$prenom,$login,$mail,$tel,$password,$datepermis){
        if($this->userManager->verifLoginDisponible($login)){
            if($this->userManager->verifLoginDisponiblemail($mail)){
                if($this->userManager->verifLoginDisponibletel($tel)){
                    $passwordCrypte = password_hash($password,PASSWORD_DEFAULT);
                    if($this->userManager->createUser($nom,$prenom,$login,$mail,$tel,$passwordCrypte,$datepermis)){
                        echo "<script>alert('La compte a été créé');
                    window.location.href='login';
                    </script>";
                    } else {
                        echo "<script>alert('Erreur lors de la création du compte, recommencez !');
                        window.location.href='inscription';
                        </script>";     
                    }
                } else {
                    echo "<script>alert('Le téléphone est déjà utilisé !');
                    window.location.href='inscription';
                    </script>";   
                }
            } else {
                echo "<script>alert('email est déjà utilisé !');
                window.location.href='inscription';
                </script>";     
            }
        } else {
            echo "<script>alert('Le login est déjà utilisé !');
                window.location.href='inscription';
                </script>";     
        }
    }
    
    public function validation_login($login,$password){
        if($this->userManager->isCombinaisonValide($login,$password)){
            $_SESSION['profil']= ["login"=>$login,];
            echo "<script>alert('Conbinaison Login/Mot de passe valide');
            window.location.href='accueil';
            </script>";
        }else{  
            echo "<script>alert('Conbinaison Login/Mot de passe non valide');
            window.location.href='login';
            </script>";
               
        }

         
     }
     public function deconnexion(){
        unset($_SESSION['profil']);
        header("Location: ".URL."accueil");
    }
  
}

   




?>	