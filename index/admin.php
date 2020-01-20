<?php
class admin{
    //propriétes:
    private $_nom;
    private $_MDP;
    

    //méthodes:
    public function AfficherAdmins(){

        echo"<p>Votre Nom de connexion est : ".$this->_nom."</p>";
        echo"<p>Votre Nom de connexion est : ".$this->_MDP."</p>";
        
    }
    public function adminCo($NDC, $MDP){//Fonction qui permet au admins de se connecter

        try
        {
            $maBase=new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','siteweb1', 'siteweb1');
            $LesNVusers=$maBase->query('SELECT `Nom`,`Mot_de_passe` FROM `Admins` WHERE "'.$NDC.'"=`Nom` && "'.$MDP.'"=`Mot_de_passe');
            $admin = $LesNVusers->fetch();
            $this->_nom = $admin['Nom'];
            $this->_MDP = $admin['Mot_de_passe'];
        }    
    
            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
        
    }
    public function Compar1($NDC, $MDP){//compare les id et mdp recuperer avec ceux present en BDD
        if($NDC == $this->_nom){
            if($MDP == $this->_MDP){
                return true;
            }
        }
        return false;
    }    

}