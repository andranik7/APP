<?php
	
	include('../Modeles/modeleCapteur.php');

	// Ajout des capteurs
	if(isset($_POST)){
		if(isset($_POST['c_temperature'])){
			writeSensorQuerry($bdd,"Capteur de temperature",$_SESSION['idClient'],$_SESSION['adresse'],$_SESSION['piece']);
		}
		if(isset($_POST['c_distance'])){
			writeSensorQuerry($bdd,"Capteur de distance",$_SESSION['idClient'],$_SESSION['adresse'],$_SESSION['piece']);
		}
		if(isset($_POST['c_luminosite'])){
			writeSensorQuerry($bdd,"Capteur de luminosite",$_SESSION['idClient'],$_SESSION['adresse'],$_SESSION['piece']);
		}
		if(isset($_POST['c_sonore'])){
			writeSensorQuerry($bdd,"Capteur sonore",$_SESSION['idClient'],$_SESSION['adresse'],$_SESSION['piece']);
		}
		if(isset($_POST['c_camera'])){
			writeSensorQuerry($bdd,"Camera",$_SESSION['idClient'],$_SESSION['adresse'],$_SESSION['piece']);
		}
		$listeCapteur=getSensorList($bdd,$_SESSION['idClient'],$_SESSION['adresse'],$_POST['piece']);
	}
	

?>