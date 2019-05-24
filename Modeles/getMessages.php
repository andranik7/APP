<?php
session_start();

include('connexionBDD.php');

function getMessage($bdd,$name,$target){
	$sql="select * from chat where Sender='".$name."' and Receiver='".$target."' or Sender='".$target."' and Receiver='".$name."'";
	//echo $sql;
    $ans=$bdd->query($sql);
	$donnees = $ans->fetchall();
	for($i=0;$i<sizeof($donnees);$i++){
		if($donnees[$i]['Sender']==$name) echo "<div class='messageMe'>(8:01 AM) <b>".$donnees[$i]['Sender']."</b>: ".$donnees[$i]['Text']."<br></div><br/>";
		if($donnees[$i]['Sender']==$target) echo "<div class='messageOther'>(8:01 AM) <b>".$donnees[$i]['Sender']."</b>: ".$donnees[$i]['Text']."<br></div><br/>";
	}
/* 	$sql="select * from chat where Sender='".$target."' and Receiver='".$name."'";
	//echo $sql;
    $ans=$bdd->query($sql);
	$donnees = $ans->fetchall();
	for($i=0;$i<sizeof($donnees);$i++){
		echo "<div class='messageOther'>(8:01 AM) <b>".$donnees[$i]['Sender']."</b>: ".$donnees[$i]['Text']."<br></div><br/>";
	} */
}

if(isset($_SESSION['nameInvite'])) getMessage($bdd,$_SESSION['nameInvite'],$_SESSION['nameTarget']);
if(isset($_SESSION['nom'])) getMessage($bdd,$_SESSION['nom'],$_SESSION['nameTarget']);

?>