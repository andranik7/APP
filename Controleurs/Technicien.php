<?php
	include("../Modeles/connexionBDD.php");
	include("../Modeles/requetesUtilisateurs.php");



	$adresse=htmlspecialchars($_POST['adresse']);
    $codePostal=htmlspecialchars($_POST['cp']);
    $ville=htmlspecialchars($_POST['ville']);
    $nbHabitants=htmlspecialchars($_POST['nb_habitants']);

	addHome($bdd,$adresse,$codePostal,$ville,$nbHabitants,$_SESSION['idClient']);

	echo $adresse;
?>