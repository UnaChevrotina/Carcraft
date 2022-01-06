<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>CarCraft</title>
        <link rel="stylesheet" href="">
        <link rel="icon" type="image/png" href="logo.png">
    </head>
    <body>

                <?php 
                    include("bdd/connecbdd.php");

                    session_start();
                    $id = $_SESSION['id'];
                    $voiture = $_GET['V'];

                    $requete = "INSERT INTO `newletter`(`clientsID`, `vehiculesID`) 
                    VALUES ('".$id."','".$voiture."')";
                    $exec_requete = mysqli_query($db,$requete) or die("Foobar");
                    header('Location: ../index.php');

                ?>
    </body>
