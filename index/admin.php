<?php
class admin{
    //propriétes:
    private $_nom;
    private $_MDP;
    private $_requete;
    private $_p1;
    private $_p2;

    //méthodes:
    public function __construct($NDC, $MDP){

        try{
            $maBase=new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','admin', 'admin');
            $LesNVusers=$maBase->query('INSERT INTO `admin`(`Nom`, `Mot_de_passe`) VALUES ('.$NDC.','.$MDP.')') ;
            $Users = $LesNVusers->fetch();
            $this->_nom = $Users['Nom'];
            $this->_MDP = $Users['Mot_De_passe'];
        }
    
            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
            
    }
    

}