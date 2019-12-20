<?php
require ("voitures.php");
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
                </div>
        </div>
    </body>
</html>