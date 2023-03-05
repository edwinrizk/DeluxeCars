<?php
require_once "Model.class.php";
require_once "class.Vehicule.php";
require_once "class.Utilisateur.php";


class reservationManager extends Model{
    private $vehicules;
    private $users;

    public function ajoutvehicule($voiture){
        $this->vehicules[] = $voiture;
        
    }
    public function getVehicule(){
        return $this->vehicules;
    }

    public function ajoutuser($user){
        $this->users[]=$user;
    }
    public function getuser(){
        return $this->users;
    }
    
    public function chargementvehicule(){
        $req = $this->getBdd()->prepare("SELECT * FROM vehicule_deluxe ");
        $req->execute();
        $vehicules = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($vehicules as $voiture){
            
            $v = new Vehicule($voiture['NO_vehicule'],$voiture['DATE_CIRCULATION'],$voiture['modele'],$voiture['marque'],
                $voiture['image'],$voiture['KILOMETRAGE'],$voiture['PRIX_JOURNALIER'],$voiture['PRIX_JEUNE_CONDUCTEUR'],$voiture['type'],$voiture['Passager']);
            $this->ajoutvehicule($v);  
        }

    }

    public function getVehiculeById($id){
        for($i=0; $i < count($this->vehicules);$i++){
            if($this->vehicules[$i]->getId() === $id){
                return $this->vehicules[$i];
               
            }
        }
        
    }
    public function getUserInformation(){
        $req = $this->getBdd()->prepare("SELECT * FROM utilisateur_deluxe ");
        $req->execute();
        $users = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($users as $user){ 
            $v = new Utilisateur($user['NO_UTILISATEUR'],$user['login'],$user['ADRESSE_MAIL'],$user['MOT_PASSE'],$user['NOM'],
                $user['PRENOM'],$user['NO_TELEPHONE'],$user['DATE_PERMIS'],$user['DATE_DEBUT'],$user['DATE_FIN']);
            $this->ajoutuser($v);  
        }
    }
    public function getuserBylogin($login){
        
        for($i=0; $i <count($this->users);$i++){
            if($this->users[$i]->getLogin() === $login){
                return $this->users[$i];
               
            }
        }
        
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
    public function getnombrejour($login){
        $req = "SELECT DATEDIFF(DATE_FIN,DATE_DEBUT)FROM utilisateur_deluxe WHERE login = :login";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":login",$login,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['DATEDIFF(DATE_FIN,DATE_DEBUT)'];

    }

    public function ReservationConfirmer($idvehicule,$iduser,$date_debut,$nbjour,$prixtotal){
        $req=" insert into reservation_deluxe ( RESERVE_NO_UTILISATEUR , RESERVE_NO_VEHICULE ,DATE_DEBUT, NBRE_JOURS, PRIX_TOTAL )
        value( :iduser,:idvehicule,:datedebut,:nbjour,:prix)";           
$stmt = $this->getBdd()->prepare($req);
$stmt->bindValue(":iduser",$iduser,PDO::PARAM_STR);
$stmt->bindValue(":idvehicule",$idvehicule,PDO::PARAM_STR);
$stmt->bindValue(":datedebut",$date_debut,PDO::PARAM_STR);
$stmt->bindValue(":nbjour",$nbjour,PDO::PARAM_STR);
$stmt->bindValue(":prix",$prixtotal,PDO::PARAM_STR);
$stmt->execute();
$estModifier = ($stmt->rowCount() > 0);
$stmt->closeCursor();
return $estModifier;
    }

}
?>