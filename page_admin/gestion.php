<?php
class gestion{
    //propriétes:
    private $_delete;

    public function adminDelete($delete){

        try
        {
            $maBase=new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','siteweb1', 'siteweb1');
            $LesNVusers=$maBase->query('DELETE FROM `voitures` WHERE `nom`= "'.$delete.'"');   
        }    
            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }

    }
}