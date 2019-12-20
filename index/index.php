<?php require("user.php");?>
<?php require("admin.php");?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="appli.css">
    </head>
        <body>
            <div id="connexion">
            <div id="CoUsers">
                <form action="index.php" method="POST"> 
                <p><label>Nom De Connexion</label>
                <input type="text" name="NDC_1"/></p> 
                <p><label>Mot De Passe</label>
                <input type="password" name="MDP_1"/></p>
                <input type="submit" name="valider" value="cliquer sur valider"/>
                </form>
<?php
                if(isset($_POST['NDC_1']) && isset($_POST['MDP_1'])){
                    
                    $user = new user($_POST['NDC_1'] , $_POST['MDP_1']);
                    
                }
?>

            </div>
            <div id="image_1" >
                
            
            </div>
            <div id="CoAdmin">
                <form action="index.php" method="POST"> 
                <p><label>Nom De Connexion</label>
                <input type="text" name="NDC_2"/></p> 
                <p><label>Mot De Passe</label>
                <input type="text" name="MDP_2"/></p>
                <input type="submit" name="valider" value="cliquer sur valider"/>
                </form>
<?php
                if(isset($_POST['NDC_2']) && isset($_POST['MDP_2'])){
                    
                    $user = new admin($_POST['NDC_2'] , $_POST['MDP_2']);
                    
                }
?>




            </div>
            </div>
        </body>
</html>