<?php 
    include('connexionBDD.php');

    if(isset($_POST['newactif'])) $query="update capteurs SET estActif = ".(int)$_POST['newactif'].' where idCapteur='.$_POST['idcapteur'];
    if(isset($_POST['valchauffage'])) $query="update capteurs SET valeur = ".(int)$_POST['valchauffage'].' where idCapteur='.$_POST['idcapteur'];
    echo $query;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    //echo json_encode($donnees);

 ?>