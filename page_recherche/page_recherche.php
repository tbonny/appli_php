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
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.css"> 
        <link rel="shortcut icon" type="image/x-icon" href="Bugatti_logo.png" />
    </head>

    <body onload="API()"> 

    <div class="col-lg-12 presentation" align="center">

    </div>

<div class="container">

            <div class="col-lg-12" align="center">
                <p><h1>Bienvenue</></p>
            </div>
    
    <div class="col-lg-12" align="center">
    <div id="text">  
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
                        }else{echo"<p><h3>Aucune voiture selectionné</h3></p>";}
                    ?>

    </div>
    </div>
<p> </p>
    <div class="col-lg-12" align="center" >
    <div id="text">                    
    <form action="page_recherche.php" method="POST"> <!-- on recupere les infos du nouveau vehicule -->
                        <p><h3>insérer un nouveau véhicule :</h3></p>
                         <p><h4>Nom :
                         <input type="text" name="nom"></h4></p>
                         <p><h4>Marque :
                         <input type="text" name="marque"></h4></p>
                         <p><h4>Date de construction :
                         <input type="text" name="date_constru"></h4></p>
                         <p><h4>Pays d'origine :
                         <input type="text" name="origine"></h4></p>
                         <p><h4>Type de moteur :
                         <input type="text" name="moteur"></h4></p>
                         <p><h4>Prix :
                         <input type="text" name="prix"></h4></p>
                         <p><h4>Liens image :
                         <input type="text" name="image"></h4></p>

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

    <div id="text" class="col-lg-12" align="center">
    <p> </p>
        <button onclick="API()" class="bouton">do NOT touch</button>
        <div id="f" align="center"></div>
        <p> </p> 
    </div>

     <div id="text" class="col-lg-12" align="center">
     <p> </p>
         <a href="../index/index.php"><button class="bouton">retour à l'accueil</button></a>
         <p> </p>
        </div>



</div>
    </body>
</html>  