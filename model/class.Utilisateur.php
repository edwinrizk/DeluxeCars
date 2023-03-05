<?php

require_once "Model.class.php";

class Utilisateur extends Model{
        private $id,
                $nom,
                $prenom,
                $login,
                $email,
                $tel,
                $mdp,   
                $datepermis,
                $dateDebut,
                $dateFin;

        public function __construct($id,$login,$email,$mdp,$nom,$prenom,$tel,$datepermis,$dateDebut,$dateFin){
                $this->id=$id;
                $this->nom=$nom;
                $this->prenom=$prenom;
                $this->login=$login;
                $this->email=$email;
                $this->tel=$tel;
                $this->mdp=$mdp;
                $this->datepermis=$datepermis;
                $this->dateDebut=$dateDebut;
                $this->dateFin=$dateFin;
                
        }
        public function getId(){return $this->id;}
        public function setId($id){$this->id =$id;}
        
        public function getNom(){return $this->nom;}
        public function setNom($nom){$this->nom =$nom;}
        
        public function getPrenom(){return $this->prenom;}
        public function setPrenom($prenom){$this->prenom=$prenom;}

        public function getLogin(){return $this->login;}
        public function setLogin($login){$this->login=$login;}
        
        public function getEmail(){return $this->email;}
        public function setEmail($email){$this-> email =$email;}
        
        public function getTEL(){return $this->tel;}
        public function setTEL($tel){$this->tel =$tel;}

        public function getMdp(){return $this->mdp;}
        public function setMdp($mdp){$this->mdp =$mdp;}

        public function getdatepermis(){return $this->datepermis;}
        public function setdatepermis($datepermis){$this->datepermis =$datepermis;}

        public function setDateDebut($dateDebut){$this->dateDebut =$dateDebut;}
        public function getDateDebut(){return $this->dateDebut;}

        public function getDateFin(){return $this->dateFin;}
        public function setDateFin($dateFin){$this->dateFin =$dateFin;}

        
        
      
}



?>