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
            <form action="php/rSouhait.php" method="POST">
                <h1>Formulaire de souhait</h1>
                
                <label><b>Marque </b></label>
                <input type="text" placeholder="Entrer la marque" name="marque" required>

                <label><b>Modele</b></label>
                <input type="text" placeholder="Entrer le modèle" name="modele" required>

                <label><b>Etat</b></label>
                <input type="text" placeholder="Entrer l'état" name="etat" required>

                <label><b>Prix Minimum</b></label>
                <input type="number" step= "0.01" placeholder="Entrer le prix minimum" name="prixMin" required>
                
                <label><b>Prix Maximum</b></label>
                <input type="number" step= "0.01" placeholder="Entrer le prix maximum" name="prixMax" required>

                <input type="submit" id='submit' value="S'IDENTIFIER" >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>Aucun résultat. Votre souhait a été enregistré</p>";
                    }

                }
                        
                ?>
                <br>              
            </form>
        </div>
    </body>
</html>