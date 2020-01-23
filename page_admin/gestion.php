<?php
class gestion{
    //propriétes:
    private $_delete;

    public function adminDelete($delete){

        try
        {
            $maBase=new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','siteweb1', 'siteweb1');
            $LesNVusers=$maBase->query('DELETE FROM `voitures` WHERE `id_voiture`= "'.$delete.'"');   
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
}
?>