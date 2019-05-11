<?php 
    include('connexionBDD.php');
    $query='insert into capteurs (idCapteur, valeur, type, estActif, idPiece) values (?,?,?,?,?)';
    $stmt=$bdd->prepare($query);
    if(!$stmt->execute([NULL,0,$_POST['typecapteur'],0,$_SESSION['idPiece']])){
        echo $stmt->errorCode();
        return;
    }
 ?>