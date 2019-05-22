<?php 
    include('connexionBDD.php');

    $query="update capteurs SET estActif = ".(int)$_POST['newactif'].' where idCapteur='.$_POST['idcapteur'];
    echo $query;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    //echo json_encode($donnees);

 ?>