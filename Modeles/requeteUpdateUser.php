<?php 
    include('connexionBDD.php');

    $userQuery='update utilisateurs SET Nom ="'.$_POST['nom'].'",Prenom="'.$_POST['prenom'].'",email="'.$_POST['mail'].'" WHERE idUtilisateur = '.$_POST['userid'];
    $stmt=$bdd->prepare($userQuery);
    if(!$stmt->execute()){
        echo "Erreur lors de la modification";
        echo $userQuery;
        return;
    }
    echo "succes";
 ?>