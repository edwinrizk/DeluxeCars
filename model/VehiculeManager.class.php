<?php
require_once "Model.class.php";
require_once "class.Vehicule.php";


class VehiculeManager extends Model{
    private $vehicules;

    public function ajoutvehicule($voiture){
        $this->vehicules[] = $voiture;
    }
    public function getVehicule(){
        return $this->vehicules;
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


}
?>