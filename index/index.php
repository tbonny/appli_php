<?php require("user.php");?>
<?php require("admin.php");?>
<html>
<head>
  <title>GoFast.com</title>
  <meta charset="utf-8">
  <script type="text/javascript" src="index.js"></script> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="appli.css">
  <link rel="shortcut icon" type="image/x-icon" href="Bugatti_logo.png" />
</head>
<body onload="heure()">

<div class="col-md-12 presentation" align="center">

</div>
  
<div class="container">
  <div class="row">
      
    <div class="col-md-12 heure" align="center">

      <h2 id="time" style="text-decoration: underline;"></h2>
      
    </div>
    <div class="col-md-4 new" align="center">
    <h1 id="modif1">Creer votre compte</h1> 
                <form action="index.php" method="POST"> 
                <p><label><h3>Nouvel Identifiant</h3></label>
                <input type="text" name="NDC_1" class="text"/></p>
                <p> </p> 
                <p><label><h3>Mot De Passe</h3></label>
                <input type="password" name="MDP_1" class="text"/></p>
                <p> </p>
                <input type="submit" name="valider1" value="valider" class="bouton"/><!--Formulaire de connexion-->
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


    
    <div class="col-md-4 connexion" align="center">
    <h1 id="modif2">Vous connectez</h1>
                <form action="index.php" method="POST"> 
                <p><label><h3>Identifiants de Connexion</h3></label>
                <input type="text" name="NDC_2" class="text"/></p>
                <p> </p> 
                <p><label><h3>Mot De Passe</h3></label>
                <input type="password" name="MDP_2" class="text"/></p>
                <p> </p>
                <input type="submit" name="valider2" value="valider" class="bouton"/><!--Formulaire de connexion-->
                </form>
<?php
                if(empty($_POST['NDC_2']) && empty($_POST['MDP_2'])){
                

                    }else{
                    
                    $user = new user();
                    $user->usersCo($_POST['NDC_2'] , $_POST['MDP_2']);
                    $isconnectUS = $user->Compar2($_POST['NDC_2'],$_POST['MDP_2']);
                    if($isconnectUS){?><!--permets de se connecter si les identifiants sont deja présenst dans la BDD--><?php

                    echo"vous etes connectez."; 
                    
                    ?><p><input type="button" name="lien1" value="redirection" onclick="self.location.href='../page_recherche/page_recherche.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick class="bouton"></p><?php
                             
                    }else{ //meesage d'erreur si les Id et Mdp sont incorrects
                        
                        echo"Identifiants ou mot de passe incorrects, veuillez reessayer.";

                    }
                }
?>        
    </div>
    

    <div class="col-md-4 admin" align="center">

    <h1 id="modif3">Admins</h1>
    <form action="index.php" method="POST"> 
                <p><label><h3>Identifiants de Connexion</h3></label>
                <input type="text" name="NDC_3" class="text"/></p>
                <p> </p> 
                <p><label><h3>Mot De Passe</h3></label>
                <input type="password" name="MDP_3" class="text"/></p>
                <p> </p>
                <input type="submit" name="valider2" value="valider" class="bouton"/><!--Formulaire de connexion-->
                </form>
<?php
                if(empty($_POST['NDC_3']) && empty($_POST['MDP_3'])){
                

                    }else{
                    
                    $admin = new admin();
                    $admin->adminCo($_POST['NDC_3'] , $_POST['MDP_3']);
                    $isconnectUS = $admin->Compar1($_POST['NDC_3'],$_POST['MDP_3']);
                    if($isconnectUS){?><!--permets de se connecter si les identifiants sont deja présenst dans la BDD--><?php
                    echo"admin connectez."; 
                    
                    ?><p><input type="button" name="lien1" value="redirection" onclick="self.location.href='../page_admin/page_admin.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick class="bouton"></p><?php
                             
                    }else{ //message d'erreur si les Id et Mdp sont incorrects
                        
                        echo"Identifiants ou mot de passe incorrects, veuillez reessayer.";

                    }
                }
?>        
      
    </div>

  </div>
</div>

</body>
</html>