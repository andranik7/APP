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

function speficQuery($bdd,$table,$desiredField,$identifier,$value){
    $query='select '.$desiredField.' from '.$table.' where '.$identifier.' like "%'.$value.'%"';
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

function getClientId($bdd,$email){
    $query="select idClient from utilisateurs join clients on utilisateurs.idUtilisateur=clients.idClient where email='".$email."'";
    echo $query;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}
function updateUserInfo($bdd,$alteredParam,$newValue,$targetId,$targetTable){
    $query='update '.$targetTable.' SET '.$alteredParam.'='.$newValue.' WHERE '.''.'='.$targetId;
    $ans=$bdd->query($query);
}

function getHomeList($bdd,$idClient){
    $query="select * from (habitea join logement on logement.idLogement=habitea.idLogement) join clients on clients.idClient=habitea.idClient where habitea.idClient=".$idClient;
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

function getLogementId($bdd,$idClient,$adresse){
    // Double vérification: adresse + id client pour éviter les adresse redondantes
    $query="select * from (habitea join logement on logement.idLogement=habitea.idLogement) join clients on clients.idClient=habitea.idClient where habitea.idClient=".$idClient.' and adresse like "%'.$adresse.'%"';
    $ans=$bdd->query($query);
    $infoLogement = $ans->fetchall();
    return $infoLogement;
}
function getRoomList($bdd,$idClient,$adresse){
    // on récupère l'id du logement
    $infoLogement=getLogementId($bdd,$idClient,$adresse);
    $query="select * from pieces where idLogement=".$infoLogement[0]["idLogement"];
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();

    return $donnees;
}

function getLastInsertId($bdd){
    $query='select LAST_INSERT_ID();';      // récupère le dernier id créé
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();
    return $donnees;
}

function addRoom($bdd,$descriptif,$superficie,$idClient,$adresse){
    $idLogement=getLogementId($bdd,$idClient,$adresse)[0]['idLogement'];
    $sql='insert into pieces (idPiece,descriptif,superficie,idLogement) VALUES (?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$descriptif,$superficie,$idLogement])){
        echo $stmt->errorCode();
        return;
    }
}
function addHome($bdd,$adresse,$codePostal,$ville,$nbHabitants,$idClient){
    $sql='insert into logement (idLogement,adresse,codePostal,ville,nbHabitants,idResidence) VALUES (?,?,?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    //echo $adresse.' type '.gettype($adresse).' | '.$codePostal.' type '.gettype($codePostal);
    if(!$stmt->execute([null,$adresse,$codePostal,$ville,$nbHabitants,-1])){
        echo $stmt->errorCode();
        return;
    }
    $logementId=getLastInsertId($bdd)[0]['LAST_INSERT_ID()'];

    $sql='insert into habiteA (idHabiteA,idLogement,idClient) VALUES (?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$logementId,$idClient])){
        echo $stmt->errorCode();
        return;
    }

}
function addCustomer($bdd,$nom,$prenom,$password,$email,$adresse,$codePostal,$ville,$dateNaissance,$civilite){
    // on ajoute en deux temps: a la table utilisateurs classique et à la table clients
    $userQuery='insert into utilisateurs (idUtilisateur,Nom,Prenom,mdp,email,linkPhoto,role,dateNaissance,civilite) VALUES (?,?,?,?,?,?,?,?,?)';
    $stmt=$bdd->prepare($userQuery);
    if(!$stmt->execute([null,$nom,$prenom,$password,$email,'no','client',$dateNaissance,$civilite])){
        echo "Taille date: ".strlen($dateNaissance).'<br>';
        echo "Taille civilite: ".strlen($civilite).'<br>';
        echo "Impossible d'ajouter dans la table utilisateur, CODE ERREUR: ".$stmt->errorCode();
        return;
    }
    
    // on récupère l'idUtilisateur qui vient d'être créé pour qu'il serve de clé étrangère pour le client
    $query='select idUtilisateur from utilisateurs where Prenom like "%'.$prenom.'%" and Nom like "%'.$nom.'%"';
    $ans=$bdd->query($query);
    $infoUtilisateur = $ans->fetchall();

    $sql='insert into clients (idClient,telephone,idUtilisateur) VALUES (?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,'a compléter',$infoUtilisateur[0]['idUtilisateur']])){
        echo $stmt->errorCode();
        return;
    }
        
    // on lui ajoute directement un logement
    $sql='insert into logement (idLogement,adresse,codePostal,ville,nbHabitants,idResidence) VALUES (?,?,?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    //echo $adresse.' type '.gettype($adresse).' | '.$codePostal.' type '.gettype($codePostal);
    if(!$stmt->execute([null,$adresse,$codePostal,'a préciser',1,-1])){
        echo $stmt->errorCode();
        return;
    }

    // on récupère l'idLogement qui vient d'être créé pour qu'il serve de clé étrangère pour le habitea
    $query='select idLogement from logement where adresse like "%'.$adresse.'%"';
    $ans=$bdd->query($query);
    $infoLogement= $ans->fetchall();
    // on récupère l'idClient qui vient d'être créé pour qu'il serve de clé étrangère pour le habitea
    $query='select idClient from clients where idUtilisateur ='.$infoUtilisateur[0]['idUtilisateur'];
    $ans=$bdd->query($query);
    $infoClient= $ans->fetchall();

    // on relie le logement au client
    $sql='insert into habiteA (idHabiteA,idLogement,idClient) VALUES (?,?,?)';
    $stmt=$bdd->prepare($sql);
    if(!$stmt->execute([null,$infoLogement[0]['idLogement'],$infoClient[0]['idClient']])){
        echo $stmt->errorCode();
        return;
    }
    
    echo 'Utilisateur créé avec l\'id '.$infoUtilisateur[0]['idUtilisateur'];

}
?>

