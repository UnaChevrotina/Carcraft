<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>CarCraft</title>
        <link rel="stylesheet" href="css/Style.css">
        <link rel="icon" type="image/png" href="image/logo.png">
    </head>
    <body class="Bodd">
                <?php 

                    include("bdd/connecbdd.php");
                    include("php/co.php");
                    $requete = "SELECT vehicules.id, marque, modele, commandes.dat FROM vehicules
                    INNER JOIN commandes ON vehicules.id = commandes.vehiculesID
                    WHERE clientsId ='".$id."'";
                    $exec_requete = mysqli_query($db,$requete);
                    $i = 1;
                    echo"<label><b>Vos commandes</b></label> <br>
                    <div class='box'>";
                    while ($row = mysqli_fetch_assoc($exec_requete)){
                        echo" <a href='voiture.php?V=" . $row['id'] . "'><img class='imag' src='image/" . $row['id'] . ".jpg'alt='Not image'>
                        ";
                    }
                ?>
    </body>
