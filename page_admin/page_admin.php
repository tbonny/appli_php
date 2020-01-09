<?php require("gestion.php");?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
        <body>
            <div id="update">
                
            </div>
            <div id="delete" align="center">
                <div class="titre">
                    <h1>DELETE</h1>
                </div>
                <div class="gestion">
                <form action="page_admin.php" method="POST"> 
                    <p><label>quel voiture voulez-vous supprimer de la BDD ?</label></p>
                    <p><input type="text" name="Nom"/></p>
                    <input type="submit" name="valider3" value="cliquer sur valider"/>
                    </form>
<?php
                if(empty($_POST['Nom'])){
                
                    }else{
                    
                    $admin = new gestion();
                    $admin->adminDelete($_POST['Nom']);
                    
                    echo"voiture supprimer"; 
                    
                    
                }
?>  
            </div>
            </div>



        </body>
</html>