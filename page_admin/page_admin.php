<?php require("gestion.php");?>
<?php require("updtate.php");?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
        <body>
            <div id="update" align="center">
            <div class="titre">
                    <h1>UPDATE</h1>
                </div>
                <div class="gestion">
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
                            
                            $update = new update($_POST ['nom'], $_POST ['marque'], $_POST ['date_constru'], $_POST ['origine'], $_POST ['moteur'], $_POST ['prix'], $_POST ['image']);

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
            </div>
            <div id="delete" align="center">
                <div class="titre">
                    <h1>DELETE</h1>
                </div>
                <div class="gestion"> <!-- affichage de la partie delete -->
                <form action="page_admin.php" method="POST"> 
                    <p><label>quel voiture voulez-vous supprimer de la BDD ?</label></p>
                    <p><input type="text" name="Nom"/></p>
                    <input type="submit" name="valider3" value="cliquer sur valider"/>
                    </form>
<?php
                if(empty($_POST['Nom'])){
                
                    }else{
                    
                    $admin = new gestion();  //appel de la base
                    $admin->adminDelete($_POST['Nom']);
                    
                    echo"voiture supprimée";
                    
                    
                }
?>  
            </div>
            </div>



        </body>
</html>