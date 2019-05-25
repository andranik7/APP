<?php 
    include('connexionBDD.php');

    $querry='select typeCapteur,valeur from consommation where idLogement='.$_POST['idLogement'];
   
    //echo "REQUEST:".$querry;
    $ans=$bdd->query($querry);
    $donnees = $ans->fetchall();
    //print_r($donnees);
    echo json_encode($donnees);

 ?>