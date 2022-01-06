<?php 
    include("../bdd/connecbdd.php");
    session_start();

    $action = $_GET['action'];

    if($action == "inscri"){
        if(isset($_POST['nom']) && isset($_POST['prenom'])&& isset($_POST['mail']) && isset($_POST['mdp'])){
            $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom']));
            $prenom = mysqli_real_escape_string($db,htmlspecialchars($_POST['prenom']));
            $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail']));
            $mdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp']));
            $pseudo = mysqli_real_escape_string($db,htmlspecialchars($_POST['pseudo']));
        
            $requete = "INSERT INTO `clients`(`nom`, `prenom`, `mail`, `mdp`, `pseudo`) VALUES ('".$nom."','".$prenom."','".$mail."','".$mdp."','".$pseudo."')";
            $exec_requete = mysqli_query($db,$requete) or die("Foobar");
        
            header('Location: ../login.php'); 
        }
        else {
            header('Location: ../inscri.php?erreur');
        }
        mysqli_close($db);
    }
    
    if($action == "deco"){ 
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: ../index.php');
    }       

    if($action == "login"){
        if(isset($_POST['mail']) && isset($_POST['password'])){
            // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
            // pour éliminer toute attaque de type injection SQL et XSS
            $mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['mail']));
            $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
            
            if($nom !== "" && $prenom !== "" && $password !== ""){
                $requete = "SELECT count(*) FROM clients where 
                        mail = '".$mail."' and mdp = '".$password."' ";
                    $exec_requete = mysqli_query($db,$requete);
                    $reponse      = mysqli_fetch_array($exec_requete);
                    $count = $reponse['count(*)'];
                    if($count!=0) // nom d'utilisateur et mot de passe correctes
                    {
                        $requete = "SELECT id FROM clients where 
                        mail = '".$mail."' and mdp = '".$password."' ";
                        $exec_requete = mysqli_query($db,$requete);
                        $reponse      = mysqli_fetch_array($exec_requete);

                        $_SESSION['id'] = $reponse['id'];
                        header('Location: ../index.php');
                    }
                    else{
                    header('Location: ../login.php?erreur=1'); // utilisateur ou mot de passe incorrect
                    }
                }
                else{
                header('Location: ../login.php?erreur=2'); // utilisateur ou mot de passe vide
                }
        }
        else{
            header('Location: ../login.php');
        }
         mysqli_close($db); // fermer la connexion 
    }

?>