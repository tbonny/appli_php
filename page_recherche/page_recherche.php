<?php
require ("voitures.php");
require ("ajout.php");
?>

<html>
    <head>
        <title>bienvenue</title>
        <link rel="stylesheet" href="page_recherche_style.css">
    </head>

    <body>
        <div class = "ultradiv">
            <div>
                <p class="title">BIENVENUE</p>
            </div>
                <div class="bigdiv">
                <form action="page_recherche.php" method="POST">
                        recherche : 
                        <input type="text" name="recherche">

                        <input class="bouton" type="submit" name="valider" value="valider">
                    </form>
                        <?php
                        if (isset ($_POST ['recherche']) && !empty($_POST ['recherche'])){
                            $nomvoiture = $_POST ['recherche'];
                        
                            $vehicule = new voitures($nomvoiture);
                            $vehicule -> afficherinfo();
                            $vehicule->afficherimage();
                        } 
                    ?>

                    <div class="bigdiv2">
                    <form action="page_recherche.php" method="POST">
                        <p>insérer un nouveau véhicule :</p>
                         <p>nom :
                         <input type="text" name="nom"></p>
                         <p>marque :
                         <input type="text" name="marque"></p>
                         <p>date de construction :
                         <input type="text" name="date_constru"></p>
                         <p>pays d'origine :
                         <input type="text" name="origine"></p>
                         <p>type de moteur :
                         <input type="text" name="moteur"></p>
                         <p>prix :
                         <input type="text" name="prix"></p>

                         <input class="bouton" type="submit" name="ajouter" value="ajouter">
                    </form>
                        <?php
                        if (isset ($_POST ['nom']) && !empty($_POST ['nom']) && ($_POST ['marque']) && !empty($_POST ['marque']) && ($_POST ['date_constru']) && !empty($_POST ['date_constru']) && ($_POST ['origine']) && !empty($_POST ['origine']) && ($_POST ['moteur']) && !empty($_POST ['moteur']) && ($_POST ['prix']) && !empty($_POST ['prix'])){
                            $ajout = new ajout();
                            $ajout -> ajouter($_POST ['nom'], $_POST ['marque'], $_POST ['date_constru'], $_POST ['origine'], $_POST ['moteur'], $_POST ['prix']);        
                        } 
                    ?>
                    </div>
                </div>


        </div>
    </body>
</html>