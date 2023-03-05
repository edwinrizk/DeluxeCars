<?php
  require_once "model/VehiculeManager.class.php";



class VehiculeController{
    private $vehiculeManager;    

    public function __construct(){
      $this->vehiculeManager = new VehiculeManager;
      $this->vehiculeManager->chargementvehicule();
      
 
     }
    public function afficherVehicules(){

      $voitures=$this->vehiculeManager->getVehicule();
      require "views/vehicule.view.php";
    }
    
    public function afficherbateaux(){
      $voitures=$this->vehiculeManager->getVehicule();
      require "views/bateau.view.php";
    }

    public function afficherVehicule($id){
      $voiture = $this->vehiculeManager->getVehiculeById($id);
      require "views/afficherVehicule.view.php";
    }
    

  
  
 }


 

?>