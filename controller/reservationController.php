<?php 

require_once "model/resevationManager.php";


class ReservationController{

    private $reservationManager;    

    public function __construct(){
      $this->reservationManager = new reservationManager;
      $this->reservationManager->chargementvehicule();
      $this->reservationManager->getUserInformation();
     }


    public function reservervehicule($id,$login){
        $voiture= $this->reservationManager->getVehiculeById($id);
        $user=$this->reservationManager->getuserBylogin($login);
        require "views/reservation.view.php";
  
      }
      public function ajout_datereservation($date_debut,$date_fin,$login){
        $this->reservationManager->ajoutDateReservation($date_debut,$date_fin,$login);
    }
    public function recapitulatif($id,$login){
      $voiture= $this->reservationManager->getVehiculeById($id);
      $user=$this->reservationManager->getuserBylogin($login);
      $nbjour=$this->reservationManager->getnombrejour($login);
      $prix=$voiture->getPrixjournalier();
      $prixtotal= (int)($prix) * (int)($nbjour);
      require "views/recapitulatif.view.php";
    }
    public function reservation($id,$login){
      $voiture= $this->reservationManager->getVehiculeById($id);
      $user=$this->reservationManager->getuserBylogin($login);
      $nbjour=$this->reservationManager->getnombrejour($login);
      $prix=$voiture->getPrixjournalier();
      $prixtotal= (int)($prix) * (int)($nbjour);
      $idvehicule=$voiture->getId();
      $iduser=$user->getId();
      $dateDebut=$user->getDateDebut();
      if($this->reservationManager->ReservationConfirmer($idvehicule,$iduser,$dateDebut,$nbjour,$prixtotal)){
        echo "<script>alert('La Réservation a bien été prise en compte');
    window.location.href='../accueil';
    </script>";
      }
    }

}




?>