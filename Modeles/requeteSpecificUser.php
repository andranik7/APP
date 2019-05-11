<?php 
    include('connexionBDD.php');

    $querry='select idUtilisateur,nom,prenom,email,role from utilisateurs where idUtilisateur='.$_POST['userid'];
    $ans=$bdd->query($querry);
    $donnees = $ans->fetchall();
    echo json_encode($donnees);

 ?>