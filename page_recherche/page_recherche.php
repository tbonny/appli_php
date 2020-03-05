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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
        <link rel="shortcut icon" type="image/x-icon" href="Bugatti_logo.png" />
    </head>

    <body onload="API()"> 

    <div class="col-md-12 presentation" align="center">

    </div>

    <div class="container">
        <div class = "ultradiv"> <!-- div principale -->
        <div class="col-md-12" align="center">
            <p><h1>Bienvenue</></p>
        </div>
                <div class="bigdiv" >
                <dv id="text" class="col-md-12" align="center">
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
                        <select name="cars" class="custom-select" style="width:200px;">
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
                                ?><p> </p><?php
                                    $objetUser->afficherimage(); 
                                }
                            }  
                        }else{echo"Aucune voiture selectionné";}
                    ?>

                </div>
                    <div class="col-md-12">
                    <div class="bigdiv2" > <!-- ajouter un vehicule -->
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
                    <div id="api" class="col-md-12" align="center">
                         <button onclick="API()" class="bouton">do NOT touch</button> 
                        <div id="f" align="center"></div>
                    </div>

                    

            
                
        </div>
       </div> <div id="text" class="col-md-12" align="center">
                <a href="../index/index.php"><button class="bouton">retour à l'accueil</button></a>
        </div>
    </div>
    </body>
</html>