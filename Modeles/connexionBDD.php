<?php
	if(!isset($_SESSION)) {
		session_start();
   }
	try {
		$bdd = new PDO('mysql:host=213.32.20.55;dbname=ecomatique', 'user', 'ke5NtcN$*9aLCL_cJLKGh%T#*+gbML7PhfU#U#8fbrEuYw555zGvFKtLHC4&Bpz-');
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
?>