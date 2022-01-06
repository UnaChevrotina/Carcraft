<?php
    
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'carcraft'; // nom de la base de donnée 
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');// sinon message d'erreur
?>