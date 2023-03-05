<?php

require_once "Model.class.php";

class Vehicule extends Model{

    private $id,
            $dateCirculation,
            $modele,
            $marque,
            $image,
            $kilometrage,
            $prixjournalier,
            $prixjeunejournalier,
            $type,
            $passager;


    public function __construct($id,$dateCirculation,$modele,$marque,$image,$kilometrage,$prixjournalier,$prixjeunejournalier,$type,$passager){
        $this->id=$id;
        $this->dateCirculation=$dateCirculation;
        $this->modele=$modele;
        $this->marque=$marque;
        $this->image=$image;
        $this->kilometrage=$kilometrage;
        $this->prixjournalier=$prixjournalier;
        $this->prixjeunejournalier=$prixjeunejournalier;
        $this->type=$type;
        $this->passager=$passager;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this-> id =$id;}

    public function getDateCirculation(){return $this->dateCirculation;}
    public function setDateCirculation($dateCirculation){$this-> dateCirculation =$dateCirculation;}

    public function getModele(){return $this->modele;}
    public function setModele($modele){$this-> modele =$modele;}

    public function getMarque(){return $this->marque;}
    public function setMarque($marque){$this->marque =$marque;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image =$image;}

    public function getKilometrage(){return $this->kilometrage;}
    public function setKilometrage($kilometrage){$this->kilometrage =$kilometrage;}

    public function getPrixjournalier(){return $this->prixjournalier;}
    public function setPrixjournalier($prixjournalier){$this->prixjournalier =$prixjournalier;}

    public function getPrixjeunejournalier(){return $this->prixjeunejournalier;}
    public function setPrixjeunejournalier($prixjeunejournalier){$this->prixjeunejournalier =$prixjeunejournalier;}

    public function getType(){return $this->type;}
    public function setType($type){$this->type =$type;}

    public function getPassager(){return $this->passager;}
    public function setPassager($passager){$this-> passager =$passager;}

}