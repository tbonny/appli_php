<?php
class ajout {

//la fonction permettant d'ajouter un véhicule dans le wiki

    public function ajouter($nom, $marque, $date_construction, $pays_origine, $type_moteur, $prix, $image)
    {
        try{
            $BDD = new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
    charset=utf8','admin', 'admin');
            $infoBDD = $BDD ->query('INSERT INTO `voitures`(`nom`, `marque`, `date_construction`, `pays_origine`, `type_moteur`, `prix`, `imagevoiture`) VALUES ("'.$nom.'","'.$marque.'","'.$date_construction.'","'.$pays_origine.'","'.$type_moteur.'","'.$prix.'","'.$image.'")');
           }

           catch (Exception $erreur){
            echo 'Erreur : '.$erreur ->getMessage();
           }
    }
}

?>
