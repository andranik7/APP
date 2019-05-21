<?php 

    include('connexionBDD.php');
    function delInprogram($bdd,$idCapteur){
        $query='delete from capteurs where idCapteur='.$idCapteur;
        $ans=$bdd->query($query);
        $donnees = $ans->fetchall();
        echo json_encode($donnees);
    }

    delInprogram($bdd,$_POST['idcapteur']);

 ?>