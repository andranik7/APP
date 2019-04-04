<?php
/*

- Requêtes liées aux utilisateurs  

*/

echo 'connexion ok'.'<br/>';

$query='select * from utilisateurs';


basicQuerry($bdd,$query);

function basicQuerry($bdd,$querry){
    $ans=$bdd->query($querry);
    $donnees = $ans->fetchall();
    return $donnees;
}
?>

