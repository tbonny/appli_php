<?php
require ("voitures.php");
require ("liste.php");
require ("ajout.php");
?>

<html>
    <head>
        <title>Gofast_Search</title>
        <link rel="stylesheet" href="page_recherche_style.css">
        <script type="text/javascript" src="page_recherchejs.js"></script> 
    </head>

    <body>
        <div class = "ultradiv"> <!-- div principale -->
            <div>
            
                <p class="title"> <text href="page_recherchejs.js" >BIENVENUE</text><br><img id="imgchange" src='symbole_voiture_2.jpg'  onmouseover="src='symbole_voiture_1.jpg'" onmouseout="src='symbole_voiture_2.jpg'"></p>
            </div>
                <div class="bigdiv" >
                <div id="text" >
                <a href="../index/index.php"><button class="bouton">retour à l'acceuil</button></a>
                <p><h1 name="search">Selectionner une voiture pour afficher ses informations.</h1></p>
                    <?php
                            try {
                                $base = new PDO('mysql:host=192.168.64.116; dbname=AppliWebPHP; charset=utf8','admin', 'admin');
                                $DonneeBruteUser = $base->query("select * from voitures");
                                $TabUserIndex = 0;
                                while ($tab = $DonneeBruteUser->fetch()){
                                $TabUser[$TabUserIndex++] = new cars($tab['id_voiture'],$tab['nom']);
                                }
                                }
                                catch(exception $e) {
                                $e->getMessage();
                                }
                    ?>   

                        <FORM action="" method="POST" >
                        <select name="cars" id="pet-select" >
                        <?php 
                        foreach ($TabUser as $objetUser) {
                        echo '<option value="'.$objetUser->getIdvoitures().'">'.$objetUser->getNom().'</option>';
                        }
                        ?>
                        </select>
                        <input type="submit" id="button" ></input>
                        </FORM>

                    <?php                    
                        if (isset($_POST["cars"])){
                            
                            foreach ($TabUser as $objetUser) {
                            if ($objetUser->getIdvoitures()==$_POST["cars"]){
                                    $objetUser=new voitures($_POST["cars"]);
                                    $objetUser->afficherinfo();
                                    $objetUser->afficherimage();
                                }
                            }  
                        }else{echo"Aucune voiture selectionné";}
                    ?>
                </div>
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
                    <div id="api">

                        <button onclick="API()">do NOT touch</button>
                        <div id="f">random</div>
                    </div>
            
                </div>
        </div>
    </body>
</html>