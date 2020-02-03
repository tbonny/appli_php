<?php require("user.php");?>
<?php require("admin.php");?>
<html>
    <head>
        <title>GoFast</title>
        <link rel="stylesheet" type="text/css" href="appli.css">
        <script type="text/javascript" src="index.js"></script> 
    </head>
        <body>
            <div id="connexion">
            <div id="left">
            <div class="CoUsers" align="center" onclick="modif_1()" > <!-- Creation d'un nouveau compte client de base-->
                <h1 id="modif1">Creer votre compte</h1> 
                <form action="index.php" method="POST"> 
                <p><label><h3>Nouvel Identifiant</h3></label>
                <input type="text" name="NDC_1"/></p>
                <p> </p> 
                <p><label><h3>Mot De Passe</h3></label>
                <input type="password" name="MDP_1"/></p>
                <p> </p>
                <input type="submit" name="valider1" value="cliquer sur valider"/><!--Formulaire de connexion-->
                </form>
<?php
                if(empty($_POST['NDC_1']) && empty($_POST['MDP_1'])){
      
                }else{ //creer le compte via la function UserNv
                    
                    $user = new user();
                    $user->UsersNv($_POST['NDC_1'] , $_POST['MDP_1']);
                    echo"nouvelle utilisateur creer veuillez renter a nouveau vos identifiants.";


                }
?>        
            </div>
            </div>
            <div id="center">
            <div id="presentation" align="center"><!-- texte de presentation de l'appli-->
                <h2><p>Bonjour, bienvenue sur notre appli de recherche de voiture</p><p>Si vous etes nouveau veuillez vous creer un compte. <p>Sinon, vous pouvez vous connecter.</p></h2>
            </div>
            <div id="CoAdmin" align="center" onclick="modif_3()">  <!-- Connexion en tant qu'administrateur-->
                <h3 id="modif3">ADMINS</h3>
                <form action="index.php" method="POST"> 
                <p><label>Identifiants de Connexion</label>
                <input type="text" name="NDC_3"/></p>
                <p><label>Mot De Passe</label>
                <input type="password" name="MDP_3"/></p>
                <input type="submit" name="valider2" value="cliquer sur valider"/><!--Formulaire de connexion-->
                </form>
<?php
                if(empty($_POST['NDC_3']) && empty($_POST['MDP_3'])){
                

                    }else{
                    
                    $admin = new admin();
                    $admin->adminCo($_POST['NDC_3'] , $_POST['MDP_3']);
                    $isconnectUS = $admin->Compar1($_POST['NDC_3'],$_POST['MDP_3']);
                    if($isconnectUS){?><!--permets de se connecter si les identifiants sont deja présenst dans la BDD--><?php
                    echo"admin connectez."; 
                    
                    ?><p><input type="button" name="lien1" value="redirection" onclick="self.location.href='../page_admin/page_admin.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick></p><?php
                             
                    }else{ //message d'erreur si les Id et Mdp sont incorrects
                        
                        echo"Identifiants ou mot de passe incorrects, veuillez reessayer.";

                    }
                }
?>        
            </div>
            
            </div>
            <div id="right">
            <div class="CoUsers" align="center" onclick="modif_2()">  <!-- Connexion client de base-->
                <h1 id="modif2">Vous connectez</h1>
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
                    $isconnectUS = $user->Compar2($_POST['NDC_2'],$_POST['MDP_2']);
                    if($isconnectUS){?><!--permets de se connecter si les identifiants sont deja présenst dans la BDD--><?php

                    echo"vous etes connectez."; 
                    
                    ?><p><input type="button" name="lien1" value="redirection" onclick="self.location.href='../page_recherche/page_recherche.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick></p><?php
                             
                    }else{ //meesage d'erreur si les Id et Mdp sont incorrects
                        
                        echo"Identifiants ou mot de passe incorrects, veuillez reessayer.";

                    }
                }
?>        
            </div>
            </div>
            </div>
        </body>
</html>
