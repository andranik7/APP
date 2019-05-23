<?php 
    include('connexionBDD.php');

    $query="select * from (habitea join logement on logement.idLogement=habitea.idLogement) join clients on clients.idClient=habitea.idClient where habitea.idClient=".$_SESSION['idClient'];
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    echo json_encode($donnees);

 ?>    