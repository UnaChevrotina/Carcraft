<?php
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
        else
        {
           header('Location: ../login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
?>