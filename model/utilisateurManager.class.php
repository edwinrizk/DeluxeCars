<?php
require_once "Model.class.php";
require_once "class.Utilisateur.php";


class UtilisateurManager extends Model{
    private $utilisateur;
    
    // creation d'utilasteur en base de donnée
    public function createUser( $nom,$prenom,$login,$email,$tel,$passwordCrypte,$datepermis){  

            $req=" insert into utilisateur_deluxe ( nom, prenom,login, adresse_mail, no_telephone,mot_passe,date_permis )
                    value( :nom,:prenom,:login,:email,:tel,:mdp,:datepermis)";           
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":tel",$tel,PDO::PARAM_STR);
        $stmt->bindValue(":mdp",$passwordCrypte,PDO::PARAM_STR);
        $stmt->bindValue(":datepermis",$datepermis,PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }
    public function ajoutDateReservation($date_debut,$date_fin,$login){  

        $req=" update utilisateur_deluxe 
                set DATE_DEBUT= :date_debut,
                    DATE_FIN = :date_fin
                    where login =:login";         
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindValue(":date_debut",$date_debut,PDO::PARAM_STR);
    $stmt->bindValue(":date_fin",$date_fin,PDO::PARAM_STR);
    $stmt->bindValue(":login",$login,PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
}

    public function UpdateUser($id,$nom,$prenom,$email,$tel,$mdp,$datepermis){

        $req=" UPDATE utilisateur_deluxe set nom=':nom',
        prenom=':prenom',
        adresse_mail=':mail',
        no_telephone=':tel',
        mot_pass =':pass',
        date_permis=':datepermis'
        where id = ':id' ";;
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":tel",$tel,PDO::PARAM_STR);
        $stmt->bindValue(":mdp",$mdp,PDO::PARAM_STR);
        $stmt->bindValue(":datepermis",$datepermis,PDO::PARAM_STR);
        $stmt->bindValue(":id",$id,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();    

    }
    
    
    //information login
    public function getUserInformation($login){
        $req = "SELECT * FROM utilisateur_deluxe WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
    public function verifLoginDisponible($login){ 
        $utilisateur = $this->getUserInformation($login);
        return empty($utilisateur);
    }

    //information email
    public function getUserInformationmail($mail){
        $req = "SELECT * FROM utilisateur_deluxe WHERE adresse_mail = :mail";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":mail",$mail,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
    public function verifLoginDisponiblemail($mail){ 
        $email= $this->getUserInformationmail($mail);
        return empty($email);
    }
    //information telephone
    public function getUserInformationtel($tel){
        $req = "SELECT * FROM utilisateur_deluxe WHERE no_telephone = :tel";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":tel",$tel,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
    public function verifLoginDisponibletel($tel){ 
        $telephone = $this->getUserInformationtel($tel);
        return empty($telephone);
    }

    //section login.php
    private function getPassworduser($login){
        $req = "SELECT mot_passe FROM utilisateur_deluxe WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['mot_passe'];

    } 
    public function isCombinaisonValide($login,$password){
        $passwordBd = $this->getPasswordUser($login);
        return password_verify($password,$passwordBd);
    }
    
    
}


?>