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
        <div class = "ultradiv"> <!-- div principale -->
            <div>
                <p class="title">BIENVENUE</p>
            </div>
                <div class="bigdiv">
                <FORM action="" methode="POST">
 <select name="pets" id="pet-select">
 <?php
 //parcours du tableau de User pour afficher les options de la liste déroulante
 foreach ($TabUser as $objetUser) {
 echo '<option value="'.$objetUser->getId().'">'.$objetUser->getnom().'</option>';
 }
 ?>
 </select>
 <input type="submit"></input>
 </FORM>
                        <?php
                        if (isset($_POST["user"])){
                            //recherche de l'id dans le tableau de user
                            foreach ($TabUser as $objetUser) {
                            if ($objetUser->getId()==$_POST["user"]){
                            $objetUser->getnom();
                            }
                            }
                           
                            }else{echo"Aucun user selectionné";}
                        ?>

                    <div class="bigdiv2"> <!-- ajouter un vehicule -->
                    <form action="page_recherche.php" method="POST"> <!-- on recupere les infos du nouveau vehicule -->
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

                         <p>liens image :
                         <input type="text" name="image"></p>

                         <input class="bouton" type="submit" name="ajouter" value="ajouter">
                    </form>
                        <?php
                        if (isset ($_POST ['nom']) && !empty($_POST ['nom']) && ($_POST ['marque']) && !empty($_POST ['marque']) && ($_POST ['date_constru']) && !empty($_POST ['date_constru']) && ($_POST ['origine']) && !empty($_POST ['origine']) && ($_POST ['moteur']) && !empty($_POST ['moteur']) && ($_POST ['prix']) && !empty($_POST ['prix']) && ($_POST ['image']) && !empty($_POST ['image'])){
                            $ajout = new ajout();
                            $ajout -> ajouter($_POST ['nom'], $_POST ['marque'], $_POST ['date_constru'], $_POST ['origine'], $_POST ['moteur'], $_POST ['prix'], $_POST ['image']);
                        } 
                    ?>
                    </div>
                </div>


        </div>
    </body>
</html>