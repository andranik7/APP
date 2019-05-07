<?php
/*

- Requêtes liées aux utilisateurs  

*/

function basicQuerry($bdd,$table,$desiredField){
    $query='select '.$desiredField.' from '.$table;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

function createTopic($bdd,$categorie,$titre,$message,$date,$idUtilsateur){
    $sql='insert into postforum (idPostForum,categorie,titre,message,date,idUtilisateur) VALUES (?,?,?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$categorie,$titre,$message,$date,$idUtilsateur])){
        echo $stmt->errorCode();
        return;
    }
}

function postAnswer($bdd,$message,$date,$postId,$idUtilsateur){
    $sql='insert into reponseforum (idReponseForum,message,date,idPostForum,idUtilisateur) VALUES (?,?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$message,$date,$postId,$idUtilsateur])){
        echo $stmt->errorCode();
        return;
    }
}
function getSpecificPost($bdd,$postId){
    $query='select nom,prenom,role,idPostForum,categorie,titre,message,date,postforum.idUtilisateur FROM postforum JOIN utilisateurs on postforum.idUtilisateur=utilisateurs.idUtilisateur where postforum.idPostForum='.$postId;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}
function getAnswer($bdd,$postId){
    $query='select nom,prenom,role,idPostForum,message,date,reponseforum.idUtilisateur FROM reponseforum JOIN utilisateurs on reponseforum.idUtilisateur=utilisateurs.idUtilisateur where reponseforum.idPostForum='.$postId;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

function getPost($bdd,$categorie){
    $query='select nom,prenom,role,idPostForum,categorie,titre,message,date,postforum.idUtilisateur FROM postforum JOIN utilisateurs on postforum.idUtilisateur=utilisateurs.idUtilisateur where postforum.categorie="'.$categorie.'"';
    //echo $query;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

function getAllPost($bdd){
    $query='select nom,prenom,role,idPostForum,categorie,titre,message,date,postforum.idUtilisateur FROM postforum JOIN utilisateurs on postforum.idUtilisateur=utilisateurs.idUtilisateur';
    //echo $query;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

?>

