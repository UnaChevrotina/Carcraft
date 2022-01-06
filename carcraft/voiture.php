<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>CarCraft</title>
        <link rel="stylesheet" href="css/Style.css">
        <link rel="icon" type="image/png" href="image/logo.png">
    </head>
    <body class='Bodd'>
                <?php 
                include("bdd/connecbdd.php");
                include("php/co.php");

                $voiture = $_GET['V'];

                $requete = "SELECT * FROM vehicules where id = '".$voiture."'";
                $exec_requete = mysqli_query($db,$requete);
                $reponse = mysqli_fetch_array($exec_requete);
                $donnees = $reponse;

                if($donnees['occasion'] == "non"){
                    $etat = "Neuve";
                }

                else if($donnees['occasion'] == "oui"){
                    $etat = "Occasion";
                }

                else{
                    $etat = "Non précisé";
                }
				

                echo
				"
				<div class='boxVoitureMain'>
					<img class='imag' src='image/" . $donnees['id'] . ".jpg'alt='Not image'><br>
					<div class='boxVoitureSub'>
						Marque: ".$donnees['marque']." <br><br>
						Modèle: ".$donnees['modele']." <br><br>
						Etat: ".$etat." <br><br>
						Prix: ".$donnees['prix']."
					</div>
				</div>
				";

                if(!isset($_SESSION['id'])){
                    echo"<p class='texteCentréRouge'>Connectez vous pour passer commande.</p>";
                }
                elseif($donnees['stock'] == 0){
                    echo"<p class='texteCentréRouge'>Rupture de stock.</p>
                        <p class='texteCentré'><a class='boutonNewsletter' href='php/newletter.php?V=".$voiture."'>Me tenir au courant d'un restock</a></p>";
                }

                else{
                    $client = $_SESSION['id'];

                    $requete2 = "SELECT count(*) FROM favoris where clientsId = ".$client." AND vehiculesId = ".$voiture."";
                    $exec_requete = mysqli_query($db,$requete2);
                    $reponse = mysqli_fetch_array($exec_requete);
                    $count = $reponse['count(*)'];

                    if($count == 1){
                        echo"<a href='php/actionRetirer.php?V=".$voiture."&action=defav'>Enlever des favoris</a>";
                    }
                    else if ($count == 0){
                        echo"<a href='php/actionRajouter.php?V=".$voiture."&action=fav'>Ajouter aux favoris</a>";
                    }

                    else{
                        echo"Erreur";
                    }
                    echo"<br>";

                    $requete3 = "SELECT count(*) FROM commandes where clientsId = ".$client." AND vehiculesId = ".$voiture."";
                    $exec_requete = mysqli_query($db,$requete3);
                    $reponse = mysqli_fetch_array($exec_requete);
                    $count = $reponse;

                    if($reponse['count(*)'] == 1){
                            echo"<a href='php/actionRetirer.php?V=".$voiture."&action=annulation'>Annuler la commande</a> <br><br> ";   
                    }
                    else if ($reponse['count(*)'] == 0){
                        $date = date("Y-m-d");
                        echo"<form class='formCommande' action='php/actionRajouter.php?V=".$voiture."&action=commande' method='POST'>
                        
                        <label><b>Commander : Veuillez choisir une date de rendez-vous</b></label> <br> 
                        <input type='date' name='dat' min='".$date."' require><br>

                        <input type='submit' id='submit' value='Passer commande' >
                        
                        </form>";
                    }

                    else{
                        echo"Erreur ";
                    }
                }
                ?>
    </body>