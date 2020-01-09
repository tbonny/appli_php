<?php
class update {
    private $_nom;
    private $_marque;
    private $_date_construction;
    private $_pays_origine;
    private $_type_moteur;
    private $_PRIX;
    private $_image;

    public function update($nom, $marque, $date_construction, $pays_origine, $type_moteur, $prix, $image)
    {
        try{
            $BDD = new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
    charset=utf8','admin', 'admin');
            $infoBDD = $BDD ->query('UPDATE `voitures` SET `nom`="'.$nom.'",`marque`="'.$marque.'",`date_construction`="'.$date_construction.'",`pays_origine`="'.$pays_origine.'",`type_moteur`="'.$type_moteur.'",`prix`="'.$prix.'",`imagevoiture`="'.$image.'" WHERE 1');
           }

           catch (Exception $erreur){
            echo 'Erreur : '.$erreur ->getMessage();
           }
    }
}

?>
