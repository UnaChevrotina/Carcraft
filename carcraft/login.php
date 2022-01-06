<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>CarCraft</title>
        <link rel="stylesheet" href="css/loginstyle.css">
        <link rel="icon" type="image/png" href="image/logo.png">
    </head>
    <body>
        <div id="container">            
            <form action="php/actionProfil.php?action=login" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Adresse mail </b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="mail" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value="S'IDENTIFIER" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2){
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    if($err==3){
                        echo "<p style='color:green'>Connectez-vous</p>";
                    }

                }
                        
                ?>
                <br>

                <a class="Inscriptionlien" href = "inscri.php">Inscrivez-vous</a>
                
            </form>
        </div>
    </body>
</html>