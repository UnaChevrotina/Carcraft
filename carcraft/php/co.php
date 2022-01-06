<?php
    session_start();
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $requete = "SELECT pseudo FROM clients where 
        id = '".$id."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        echo
		"
		<div class='divBarreMenu'>
			<a class='boutonMenu' href='php/actionProfil.php?action=deco'>Déconnexion</a>
			<a class='boutonMenu' href='compte.php'>Profil</a>
			<a class='boutonMenu' href='favoris.php'>Favoris</a>
			<a class='boutonMenu' href='index.php'>Acceuil</a>
			<a class='boutonMenu' href='fSouhait.php'>Formulaire</a>
			<span class='nomUtilisateur'>".$reponse['pseudo']."</span>
		</div>
		";
    }
    else{
        echo
		"
		<div class='divBarreMenu' >
			<a class='boutonMenu' href='inscri.php'>Inscription</a>
			<a class='boutonMenu' href='login.php'>Connexion</a>
			<a class='boutonMenu' href='index.php'>Acceuil</a>
		</div>
		";
    }
?>