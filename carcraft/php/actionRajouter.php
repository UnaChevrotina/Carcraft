<?php 
    include("../bdd/connecbdd.php");
    session_start();

    $action = $_GET['action'];

    if($action == "fav"){ 
        $id = $_SESSION['id'];
        $voiture = $_GET['V'];

        $requete = "INSERT INTO `favoris`(`clientsId`, `vehiculesId`) 
        VALUES ('".$id."','".$voiture."')";
        $exec_requete = mysqli_query($db,$requete) or die("Foobar");

        header('Location: ../voiture.php?V='.$voiture.'');
    }

    if($action == "commande"){
        $id = $_SESSION['id'];
        $voiture = $_GET['V'];
        $date = $_POST['dat'];

        $requete = "INSERT INTO `commandes`(`clientsID`, `vehiculesID`, `dat`) 
        VALUES ('".$id."','".$voiture."','".$date."')";
        $exec_requete = mysqli_query($db,$requete) or die("Foobar");

        $requete = "UPDATE `vehicules` SET `stock` = stock - 1 WHERE `vehicules`.`id` = ".$voiture.""; 
        $exec_requete = mysqli_query($db,$requete) or die("Foobar");
        header('Location: ../index.php');
}

?>