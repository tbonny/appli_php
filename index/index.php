<?php require("user.php");?>
<?php require("admin.php");?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="appli.css">
    </head>
        <body>
            <div id="connexion">
            <div id="left">
            <div class="CoUsers" align="center"> 
                <h1>Creer votre compte</h1> 
                <form action="index.php" method="POST"> 
                <p><label><h3>Nouvelle Identifiants</h3></label>
                <input type="text" name="NDC_1"/></p>
                <p> </p> 
                <p><label><h3>Mot De Passe</h3></label>
                <input type="password" name="MDP_1"/></p>
                <p> </p>
                <input type="submit" name="valider1" value="cliquer sur valider"/><!--Formulaire de connexion-->
                </form>
<?php
                if(empty($_POST['NDC_1']) && empty($_POST['MDP_1'])){
      
                }else{
                    
                    $user = new user();
                    $user->UsersNv($_POST['NDC_1'] , $_POST['MDP_1']);
                    echo"nouvelle utilisateur creer veuillez renter a nouveau vos identifiants.";


                }
?>        
            </div>
            </div>
            <div id="center">
            
            </div>
            <div id="right">
            <div class="CoUsers" align="center">  
                <h1>Vous connectez</h1>
                <form action="index.php" method="POST"> 
                <p><label><h3>Identifiants de Connexion</h3></label>
                <input type="text" name="NDC_2"/></p>
                <p> </p> 
                <p><label><h3>Mot De Passe</h3></label>
                <input type="password" name="MDP_2"/></p>
                <p> </p>
                <input type="submit" name="valider2" value="cliquer sur valider"/><!--Formulaire de connexion-->
                </form>
<?php
                if(empty($_POST['NDC_2']) && empty($_POST['MDP_2'])){
                

                    }else{
                    
                    $user = new user();
                    $user->usersCo($_POST['NDC_2'] , $_POST['MDP_2']);
                    $isconnectUS = $user->Compar($_POST['NDC_2'],$_POST['MDP_2']);
                    if($isconnectUS){?><!--permets de se connecter si les identifiants sont deja présenst dans la BDD--><?php

                    echo"vous etes connectez."; 
                    
                    ?><p><input type="button" name="lien1" value="redirection" onclick="self.location.href='../page_recherche/page_recherche.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick></p><?php
                             
                    }else{
                        
                        echo"Identifiants incorrects, veuillez reessayer.";

                    }
                }
?>        
            </div>
            </div>
            </div>
        </body>
</html>
