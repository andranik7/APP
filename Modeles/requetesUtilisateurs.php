<?php
/*

- Requêtes liées aux utilisateurs  

*/

function basicQuerry($bdd,$querry){
    $ans=$bdd->query($querry);
    $donnees = $ans->fetchall();
    return $donnees;
}

function speficQuery($bdd,$colName,$value){
    
    $donnees = $ans->fetchall();
    return $donnees;
}
function updateUserInfo($bdd,$alteredParam,$newValue,$targetId,$targetTable){
    $query='update '.$targetTable.' SET '.$alteredParam.'='.$newValue.' WHERE '.''.'='.$targetId;
    $ans=$bdd->query($query);
}


function addCustomer($bdd,$nom,$prenom,$password,$telephone,$email){
    // on ajoute en deux temps: a la table utilisateurs classique et à la table clients
    $userQuery='insert into utilisateurs (idUtilisateur,Nom,Prenom,mdp,linkPhoto,role) VALUES (?,?,?,?,?,?)';
    $stmt=$bdd->prepare($userQuery);
    $stmt->execute([null,$nom,$prenom,$password,'photo','role']);
    
    // on récupère l'idUtilisateur qui vient d'être créé pour qu'il serve de clé étrangère pour le client
    $query='select idUtilisateur from utilisateurs where Prenom like "%'.$prenom.'%" and Nom like "%'.$nom.'%"';
    $ans=$bdd->query($query);
    $donnees = $ans->fetchall();

    $sql='insert into clients (idClient,telephone,email,privilege,idUtilisateur) VALUES (?,?,?,?,?)';
    $stmt=$bdd->prepare($sql);
    $stmt->execute([null,'0605022999','lmercier.78@gmail.com',1,$donnees[0]['idUtilisateur']]);
    
    echo 'Utilisateur créé avec l\'id '.$donnees[0]['idUtilisateur'];

}
?>

