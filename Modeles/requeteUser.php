<?php 
    include('connexionBDD.php');

    $querry='select * from utilisateurs where Prenom like "%'.$_POST['recherche'].'%" OR Nom like "%'.$_POST['recherche'].'%"';
    $ans=$bdd->query($querry);
    $donnees = $ans->fetchall();
    echo json_encode($donnees);
/*     for($i=0;$i<sizeof($donnees);$i++){
        echo $donnees[$i]['Nom'].' '.$donnees[$i]['Prenom'].'</br>';
    } */
 ?>