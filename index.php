<?php
/*

- Début du site: 
si rien n'est définis on renvoie vers l'accueil
sinon en include la page correspondante

*/

include('Modeles/connexionBDD.php');

if(isset($_GET['cible']) && !empty($_GET['cible'])){
    $url=$_GET['cible'];
}
else{
    $url='utilisateurs';
}

include('Controleurs/'.$url.'.php');

?>