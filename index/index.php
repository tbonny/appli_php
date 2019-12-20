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
                <p> </p> 
                <p><label>Mot De Passe</label>
                <input type="password" name="MDP_1"/></p>
                <p> </p>
                <input type="submit" name="valider" value="cliquer sur valider"/>
                </form>
<?php
                if(isset($_POST['NDC_1']) && isset($_POST['MDP_1'])){

                    $user = new user();
                    $user->usersCo($_POST['NDC_1'] , $_POST['MDP_1']);
                    $isconnectUS = $user->Compar($_POST['NDC_1'],$_POST['MDP_1']);
                    if($isconnectUS){

                    echo"vous etes connectez";  
                    }else{

                        $user->UsersNv($_POST['NDC_1'] , $_POST['MDP_1']);
                        echo"nouvelle utilisateur créer";
                        
                    }
                }
?>

            </div>
            <div id="image_1" >
                
            </div>
            <div id="CoAdmin">
                <form action="index.php" method="POST"> 
                <p><label>Nom De Connexion</label>
                <input type="text" name="NDC_2"/></p>
                <p> </p> 
                <p><label>Mot De Passe</label>
                <input type="password" name="MDP_2"/></p>
                <p> </p>
                <input type="submit" name="valider" value="cliquer sur valider"/>
                </form>
<?php
                if(isset($_POST['NDC_2']) && isset($_POST['MDP_2'])){
                    
                    $user = new admin();
                    $user->adminCo($_POST['NDC_2'] , $_POST['MDP_2']);
                    $isconnectAD = $user->Compar($_POST['NDC_2'],$_POST['MDP_2']);
                    if($isconnectAD){

                    echo"vous etes connectez";  
                    }else{

                        echo"Mot de passe ou Nom incorrect, veuillez reessayer.";
                    }
                }
?>
            </div>
            </div>
        </body>
</html>
