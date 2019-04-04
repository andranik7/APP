<?php
	session_start();
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=ecomatique', 'root', '');
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
?>