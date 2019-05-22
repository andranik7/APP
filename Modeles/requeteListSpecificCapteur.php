<?php 
    include('connexionBDD.php');

    $query="select * from capteurs where idPiece=".$_SESSION['idPiece'].' and type="'.$_POST['typecapteur'].'"';
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    echo json_encode($donnees);

 ?>