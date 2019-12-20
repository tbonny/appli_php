<?php
class user{
    //propriétes:
    private $_nom;
    private $_MDP;
    private $_requete;
    private $_p1;
    private $_p2;
    private $_id;

    //méthodes:
    public function __construct(){

        
     
    }
    public function AfficherUsers(){

        echo"<p>Votre Nom de connexion est : ".$this->_nom."</p>";
        
    }
    public function UsersNv($NDC, $MDP){

        try
        {
            $maBase=new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','siteweb1', 'siteweb1');
            $LesNVusers=$maBase->query('INSERT INTO `Users`(`Nom`, `Mot_de_passe`) VALUES ("'.$NDC.'","'.$MDP.'")') ;
        }    
    
            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
        
    }
    public function usersCo($NDC, $MDP){

        try
        {
            $maBase=new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','siteweb1', 'siteweb1');
            $LesNVusers=$maBase->query('SELECT `Nom`,`Mot_de_passe` FROM `Users` WHERE "'.$NDC.'"=`Nom` && "'.$MDP.'"=`Mot_de_passe');
            $admin = $LesNVusers->fetch();
            $this->_nom = $admin['Nom'];
            $this->_MDP = $admin['Mot_de_passe'];
        }    
    
            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
        
    }
    public function Compar($NDC, $MDP){
        if($NDC == $this->_nom){
            if($MDP == $this->_MDP){
                return true;
            }
        }
        return false;
    }
    
    
    

}