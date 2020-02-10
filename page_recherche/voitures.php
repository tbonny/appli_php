<?php

class voitures {

    private $_nom;
    private $_marque;
    private $_date_construction;
    private $_pays_origine;
    private $_type_moteur;
    private $_PRIX;
    private $_image;
    //
    public function __construct($nom)
    {
        try{
            $BDD = new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','admin', 'admin');
            $infoBDD = $BDD ->query('select * from voitures where id_voiture="'.$nom.'"');
            $infoBDD = $infoBDD->fetch();

            $this->_nom = $infoBDD['nom'];
            $this->_marque = $infoBDD['marque'];
            $this->_date_construction = $infoBDD['date_construction'];
            $this->_pays_origine = $infoBDD['pays_origine'];
            $this->_type_moteur = $infoBDD['type_moteur'];
            $this->_PRIX = $infoBDD['prix'];
            $this->_image = $infoBDD['imagevoiture'];

           }

           catch (Exception $erreur){
            echo 'Erreur : '.$erreur ->getMessage();
           }

           
    }

    public function update($nom, $marque, $date_construction, $pays_origine, $type_moteur, $prix, $image) //mise à jour véhicule, appel de la base de donnée
    {
        try{
            $BDD = new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP; charset=utf8','admin', 'admin');
            $BDD ->query('UPDATE `voitures` SET `nom`="'.$nom.'",`marque`="'.$marque.'",`date_construction`="'.$date_construction.'",`pays_origine`="'.$pays_origine.'",`type_moteur`="'.$type_moteur.'",`prix`="'.$prix.'",`imagevoiture`="'.$image.'" WHERE `nom`="'.$nom.'"');
           }

           catch (Exception $erreur){
            echo 'Erreur : '.$erreur ->getMessage();
           }
    }

    public function getnom(){
        return $this->_nom;
    }

    public function getmarque(){
        return $this->_marque;
    }

    public function getdate(){
        return $this->_date_construction;
    }

    public function getorigine(){
        return $this->_pays_origine;
    }

    public function getmoteur(){
        return $this->_type_moteur;
    }

    public function getprix(){
        return $this->_PRIX;
    }

    public function getimage(){
        return $this->_image;
    }

    //
    public function afficherinfo(){

        echo "<p> nom du véhicule : ".$this->getnom()."</p>";
        echo "<p> marque du véhicule : ".$this->getmarque()."</p>";
        echo "<p> date de construction du véhicule : ".$this->getdate()."</p>";
        echo "<p> pays d'origine du véhicule : ".$this->getorigine()."</p>";
        echo "<p> type de moteur du véhicule : ".$this->getmoteur()."</p>";
        echo "<p> prix du véhicule : ".$this->getprix()." €</p>";
        
    }

    //
    public function afficherimage(){
        echo "<img src = '".$this->getimage()."'>";
    }

    public function randomcar(){
       $randomcar = require("api.php");

        try{
            $BDD = new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP; charset=utf8','admin', 'admin');
            $BDD ->query('SELECT * from voitures');
           }

           catch (Exception $erreur){
            echo 'Erreur : '.$erreur ->getMessage();
           }
    }
}
?>

