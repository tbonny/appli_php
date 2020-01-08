<?php require("user.php");?>
<?php require("admin.php");?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="appli.css">
    </head>
        <body>
            <div id="connexion">
            <div id="CoUsers" align="center">
                <form action="index.php" method="POST"> 
                <p><label><h3>Nom De Connexion</h3></label>
                <input type="text" name="NDC_1"/></p>
                <p> </p> 
                <p><label><h3>Mot De Passe</h3></label>
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

                    echo"vous etes connectez."; 
                    
                    ?><input type="button" name="lien1" value="redirection" onclick="self.location.href='http://192.168.64.116/Valentin/appli_php/page_recherche/page_recherche.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick><?php
                    
                    }else{

                        $user->UsersNv($_POST['NDC_1'] , $_POST['MDP_1']);
                        echo"nouvelle utilisateur creer veuillez renter a nouveau vos identifiants.";
                        
                    }
                }
?>

          
            </div>
            </div>
        </body>
</html>
