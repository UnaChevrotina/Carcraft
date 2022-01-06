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
            <form action="php/actionProfil.php?action=inscri" method="POST">
                <h1>Inscription</h1>
                
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer votre nom" name="nom" required>

                <label><b>Prenom</b></label>
                <input type="text" placeholder="Entrer votre prenom" name="prenom" required>

                <label><b>Pseudonyme</b></label>
                <input type="text" placeholder="Entrer votre prenom" name="pseudo" maxlength="20" required>

                <label><b>Mail</b></label>
                <input type="text" placeholder="Entrer votre mail" name="mail" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="mdp" required>

                <input type="submit" id='submit' value="S'INSCRIRE">

                <?php
                if(isset($_GET['erreur'])){
                    echo"<p style='color:red'>Veuillez remplir tous les champs</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>