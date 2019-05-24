<?php 

function sendMessage($bdd,$text,$name){
    $sql='insert into chat (Id,Text,Sender,Receiver) VALUES (?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    //echo $adresse.' type '.gettype($adresse).' | '.$codePostal.' type '.gettype($codePostal);
    if(!$stmt->execute([null,$text,$name,'Administrateur'])){
        echo $stmt->errorCode();
        return;
    }
}

function getMessage($bdd,$name){
    $sql="select * from chat where habitea.idClient=".$name;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}



?>