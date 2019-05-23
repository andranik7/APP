<?php 
    include('../Modeles/connexionBDD.php');
    echo gettype(null);
    $sql='insert into consommation (idconso,idLogement,typeCapteur,dateDebut,dateFin,consommation) VALUES (?,?,?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,3,"Lumiere",null,date("H:i:s"),10])){
        echo $stmt->errorInfo();
        return;
    }
