<?php 
    include("../bdd/connecbdd.php");
    session_start();

    $action = $_GET['action'];

    if($action == "annulation"){ 
        echo"Bonjour";
    $id = $_SESSION['id'];
    $voiture = $_GET['V'];

    $requete = " DELETE FROM `commandes` 
    WHERE clientsId = ".$id." AND vehiculesID = ".$voiture."";
    $exec_requete = mysqli_query($db,$requete) or die("Foobar");

    $requete = "UPDATE `vehicules` SET `stock` = stock + 1 WHERE `vehicules`.`id` = ".$voiture.""; 
    $exec_requete = mysqli_query($db,$requete) or die("Foobar");
    header('Location: ../compte.php');
    }


    if($action == "defav"){ 
        $id = $_SESSION['id'];
        $voiture = $_GET['V'];

        $requete = " DELETE FROM `favoris` 
        WHERE clientsId = ".$id." AND vehiculesId = ".$voiture."";
        $exec_requete = mysqli_query($db,$requete) or die("Foobar");

        header('Location: ../voiture.php?V='.$voiture.'');
    }
?>