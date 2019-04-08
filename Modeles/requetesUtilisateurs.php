<?php
/*

- Requêtes liées aux utilisateurs  

*/

function basicQuerry($bdd,$querry){
    $ans=$bdd->query($querry);
    $donnees = $ans->fetchall();
    return $donnees;
}


function updateUserInfo($bdd,$alteredParam,$newValue,$targetId,$targetTable){
    $query='update '.$targetTable.' SET '.$alteredParam.'='.$newValue.' WHERE '.''.'='.$targetId;
    $ans=$bdd->query($query);
}


function addCustomer($bdd,$nom,$prenom,$password){
    $queryUser=$bdd->prepare('insert into utilisateurs (idUtilisateurs,Nom,Prenom,mdp,linkPhoto,role) values(:idUtilisateurs,:Nom,:Prenom,:mdp,:linkPhoto,:role)');
    $queryUser->execute(array(
        'idUtilisateur' => null,
        'Nom' => $nom,
        'Prenom' => $prenom,
        'mdp' => $password,
        'linkPhoto' => 'none',
        'role' => 'client',
    ));
}
?>

