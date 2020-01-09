<?php
class ajout {
    private $_nom;
    private $_marque;
    private $_date_construction;
    private $_pays_origine;
    private $_type_moteur;
    private $_PRIX;
    private $_image;

    public function ajouter($nom, $marque, $date_construction, $pays_origine, $type_moteur, $prix)
    {
        try{
            $BDD = new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP;
            charset=utf8','admin', 'admin');
            $infoBDD = $BDD ->query('INSERT INTO `voitures`(`nom`, `marque`, `date_construction`, `pays_origine`, `type_moteur`, `prix`) VALUES ('.$nom.','.$marque.','.$date_construction.','.$pays_origine.','.$type_moteur.','.$prix.')');
           }

           catch (Exception $erreur){
            echo 'Erreur : '.$erreur ->getMessage();
           }
    }
}

?>
