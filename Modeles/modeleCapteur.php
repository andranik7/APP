<?php 

	include('requetesUtilisateurs.php');

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=ecomatique;charset=utf8', 'root', '');
	}
	 catch (Exception $e)
    {
        echo 'erreur </br>';
        die('Erreur : ' . $e->getMessage());
    }
	
	$lCapteurs=equalQuery($bdd,"capteurs","type","idPiece",1);
	$capteurs = array();

	for ($i=0; $i < sizeof($lCapteurs); $i++)
	{ 
		$capteurs[$i] = $lCapteurs[$i][0];
	}


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    	if(isset($_POST['addCT']))
    	{
    		ajouterCapteurTemp($bdd,1); // <- valeur fixe pour $idPiece fixé a 1 /!\ à changer /!\
    	}
    	if(isset($_POST['addCD']))
    	{
    		ajouterCapteurDist($bdd,1); // <- valeur fixe pour $idPiece fixé a 1 /!\ à changer /!\
    	}
    	if(isset($_POST['addCL']))
    	{
    		ajouterCapteurLum($bdd,1); // <- valeur fixe pour $idPiece fixé a 1 /!\ à changer /!\
    	}
    	if(isset($_POST['addCS']))
    	{
    		ajouterCapteurSon($bdd,1); // <- valeur fixe pour $idPiece fixé a 1 /!\ à changer /!\
    	}
        if(isset($_POST['addC']))
    	{
    		ajouterMoteur($bdd,1); // <- valeur fixe pour $idPiece fixé a 1 /!\ à changer /!\
    	}
    	if(isset($_POST['addM']))
    	{
    		ajouterCamera($bdd,1); // <- valeur fixe pour $idPiece fixé a 1 /!\ à changer /!\
    	}
    }

    function ajouterCapteurTemp($bdd,$idPiece)
    {
        writeSensorQuerry($bdd,'capteurs','Capteur de température',$idPiece);
    }

    function ajouterCapteurDist($bdd,$idPiece)
    {
        writeSensorQuerry($bdd,'capteurs','Capteur de distance',$idPiece);
    }

    function ajouterCapteurLum($bdd,$idPiece)
    {
        writeSensorQuerry($bdd,'capteurs','Capteur de luminosité',$idPiece);
    }

    function ajouterCapteurSon($bdd,$idPiece)
    {
        writeSensorQuerry($bdd,'capteurs','Capteur de son',$idPiece);
    }

    function ajouterMoteur($bdd,$idPiece)
    {
        writeSensorQuerry($bdd,'capteurs','Moteur',$idPiece);
    }

    function ajouterCamera($bdd,$idPiece)
    {
        writeSensorQuerry($bdd,'capteurs','Camera',$idPiece);
    }

?>