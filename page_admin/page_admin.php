<?php require("gestion.php");?>
<?php require("liste_admin.php")?>
<?php require("liste_user.php")?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
        <body>
            <div id="update" align="center">
            <div class="titre">
                    <h1>UPDATE</h1>
                </div>
                <div id="gestion1">
                <form action="page_admin.php" method="POST"> <!-- affichage de la partie update -->
                        <p>modifier un véhicule :</p>
                         <p>nom :
                         <input type="text" name="nom"/></p>
                         <p>marque :
                         <input type="text" name="marque"/></p>
                         <p>date de construction :
                         <input type="text" name="date_constru"/></p>
                         <p>pays d'origine :
                         <input type="text" name="origine"/></p>
                         <p>type de moteur :
                         <input type="text" name="moteur"/></p>
                         <p>prix :
                         <input type="text" name="prix"/></p>
                         <p>liens image :
                         <input type="text" name="image"/></p>

                         <input class="bouton" type="submit" name="ajouter" value="modifier"/>
                    </form>

                    <?php
                        if (isset ($_POST ['nom']) && !empty($_POST ['nom']) && ($_POST ['marque']) && !empty($_POST ['marque']) && ($_POST ['date_constru']) && !empty($_POST ['date_constru']) && ($_POST ['origine']) && !empty($_POST ['origine']) && ($_POST ['moteur']) && !empty($_POST ['moteur']) && ($_POST ['prix']) && !empty($_POST ['prix']) && ($_POST ['image']) && !empty($_POST ['image'])){
                            
                            $update = new gestion($_POST ['nom'], $_POST ['marque'], $_POST ['date_constru'], $_POST ['origine'], $_POST ['moteur'], $_POST ['prix'], $_POST ['image']);

                                $nom = $_POST ['nom'];
                                $marque =  $_POST ['marque'];
                                $date = $_POST ['date_constru'];
                                $origine = $_POST ['origine'];
                                $moteur = $_POST ['moteur'];
                                $prix = $_POST ['prix'];
                                $image = $_POST ['image'];
                            
                            $update -> update($nom, $marque, $date,  $origine, $moteur, $prix, $image);
                            echo"vehicule mis à jour";
                            
                        }
                    ?>
                 
                
            </div>
            <div>
            <a href="../index/index.php"><button class="bouton">retour à l'acceuil</button></a>
            </div>
            </div>
            
            <div id="delete" align="center">
                <div class="titre">
                    <h1>DELETE</h1>
                </div>
                <div id="gestion2"> <!-- affichage de la partie delete -->
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
                                if (isset($_POST["cars"])){
                            
                                    foreach($_POST['cars'] as $idUser){
                                       
                                $j=0;
                                    foreach ($TabUser as $objetUser) {
                                        if ($objetUser->getIdvoitures()== $idUser){
                                            $objetUser=new gestion();                                        
                                            $objetUser->adminDelete($idUser);                                      
                                            unset($TabUser[$j]) ;                                      
                                        }    
                                                                     
                                    $j++;
                                     }
                                }echo"le vehicule a ete supprimer, veuillez recharger la page";  
                            }
                    ?>   

                            <FORM action="" method="POST">
                                <p>Qui Supprimer ?</p>
                                <?php
                                foreach ($TabUser as $objetUser) {
                                echo '<p><input type="checkbox" value="'.$objetUser->getIdvoitures().'" name="cars[]" />';
                                echo '<label for="coding">'.$objetUser->getNom().' </label></p>';
                                }
                                ?>
                                <input class="bouton" type="submit" value="delete"></input>
                            </FORM>
                    <?php
                       
                    ?>
                                 
                    

                    
                    -------



                    <FORM action="" method="POST">
                                <p>Qui passer admin?</p>
                                <?php
                                foreach ($TabUser as $objetUser) {
                                echo '<p><input type="radio" value="'.$objetUser->getIduser().'" name="user[]" />';
                                echo '<label for="coding">'.$objetUser->getNomuser().' </label></p>';
                                }
                                ?>
                                <input type="submit" value="delete"></input>
                            </FORM>
                    <?php
                        if (isset($_POST["user"])){
                            
                                foreach($_POST['user'] as $idUser){
                                   
                            $j=0;
                                foreach ($TabUser as $objetUser) {
                                    if ($objetUser->getIduser()== $idUser){
                                        
                                        $objetUser=new gestion();
                                        
                                        $objetUser->adminDelete($idUser);
                                        
                                        
                                        unset($TabUser[$j]) ;
                                        
                                    }
                                    
                                $j++;
                                 }
                            }
                        }

                            ?>

        </body>
</html>