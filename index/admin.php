<?php
class admin{
    //propriétes:
    private $_nom;
    private $_MDP;
    private $_requete;
    private $_p1;
    private $_p2;

    //méthodes:
    public function AfficherAdmins(){

        echo"<p>Votre Nom de connexion est : ".$this->_nom."</p>";
        echo"<p>Votre Nom de connexion est : ".$this->_MDP."</p>";
        
    }
    public function adminCo($NDC, $MDP){

        try
        {
            $maBase=new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','siteweb1', 'siteweb1');
            $LesNVusers=$maBase->query('SELECT `Nom`,`Mot_de_passe` FROM `admin` WHERE "'.$NDC.'"=`Nom` && "'.$MDP.'"=`Mot_de_passe');
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