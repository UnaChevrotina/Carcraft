<?php
	include('../bdd/connecbdd.php');
	
	session_start();
	
	$marque = $_POST["marque"];
	$modele = $_POST["modele"];
	$etat = $_POST["etat"];
	$prixMin = $_POST["prixMin"];
	$prixMax = $_POST["prixMax"];


	
	$queryInsert ="	INSERT INTO souhait (marque, modele, occasion, prixMin, prixMax, clientId)
					VALUES ('".$marque."', '".$modele."', '".$etat."', ".$prixMin.", ".$prixMax.", ".$_SESSION['id'].")
				";
    $InsertSet = mysqli_query($db,$queryInsert);

	$querySelect ="	SELECT * FROM vehicules
					WHERE marque LIKE '".$marque."' 
					AND modele LIKE '".$modele."'
					AND occasion LIKE '".$etat."' 
					AND prix BETWEEN ".$prixMin." AND ".$prixMax."
				";
	$resultSet = mysqli_query($db,$querySelect);
    $result = mysqli_fetch_assoc($resultSet);
	if($result != ""){
		echo "Résultats de la recherche";
		//while ($searchResult = mysqli_fetch_assoc($resultSet)){
            $searchResult = $result;
			echo"
				<a href='../voiture.php?V=" . $searchResult['id'] . "'><img class='imag' src='../image/" . $searchResult['id'] . ".jpg'alt='Not image'></a>
				";
                echo "salut";
		//}
	}
	else if($result == ""){
		header('Location: ../fSouhait.php?erreur=1');
	}
?>