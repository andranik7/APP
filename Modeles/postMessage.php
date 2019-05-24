<?php
    session_start();

    include('connexionBDD.php');
    function sendMessage($bdd,$text,$name,$target){
        $sql='insert into chat (Id,Text,Sender,Receiver) VALUES (?,?,?,?)';
        $stmt=$bdd->prepare($sql);
        if(!$stmt->execute([null,$text,$name,$target])){
            echo $stmt->errorCode();
            return;
        }else echo "OK";
    }

    if(isset($_SESSION['nameInvite'])) sendMessage($bdd,$_POST['text'],$_SESSION['nameInvite'],$_SESSION['nameTarget']);
    if(isset($_SESSION['nom'])) sendMessage($bdd,$_POST['text'],$_SESSION['nom'],$_SESSION['nameTarget']);
?>