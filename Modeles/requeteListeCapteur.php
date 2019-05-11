<?php 
    include('connexionBDD.php');

    $query="select * from capteurs where idPiece=".$_SESSION['idPiece'];
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    echo json_encode($donnees);

 ?>