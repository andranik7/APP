<!DOCTYPE html>
<html id="bodymsg">

<head >
	<title>Ecomatique - messagerie sécurisée</title>
	<link type="text/css" rel="stylesheet" href="Vues/css/messagerie.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand|PT+Sans" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
 
<?php
 if(!isset($_SESSION['nameInvite']) and !isset($_SESSION['prenom'])){
    echo '
    <div id="loginform">
    <form action="" method="post">
        <p class="title">Saisissez votre nom pour continuer</p>
        <input type="text" name="name" id="name" class="input_connexion" placeholder="Entrez votre nom"/>
        <input type="submit" name="enter" id="enter" value="Entrer" class="btn-connect"/>
    </form>
    </div>
    ';
}
else if(!isset($_SESSION['nameTarget'])){
    echo '
    <div id="targetform">
        <form action="" method="post">
            <p class="title">Saisissez le nom de votre correspondant</p>
            <p class="subtitle">Un problème? Nos administrateurs sont là pour vous aider n\'hésitez pas à contacter l\'un d\'eux</p>
            <p class="subtitle">'.$techList.'</p>
            <input type="text" name="nameTarget" id="name" class="input_connexion" placeholder="Nom du destinataire"/>
            <input type="submit" name="enterTarget" id="enter" value="Entrer" class="btn-connect"/>
        </form>
    </div>
    ';
}
else{
?>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Bienvenue sur Ecomatique, <b><?php if(isset($_SESSION['prenom'])) echo $_SESSION['prenom'].' '.$_SESSION['nom']; else echo $_SESSION['nameInvite'];?></b></p>
        <p class="receiver">Discussion avec: <?php if(isset($_SESSION['nameTarget'])) echo $_SESSION['nameTarget']; ?> </p>
        <p class="logout"><a id="exit" href="Vues/disconnectChat.php">Déconnexion</a></p>
        <div style="clear:both"></div>
    </div>    
    <div id="chatbox">
    </div>
     
    <form name="message" action="" method="post">
        <textarea name="usermsg" id="usermsg" class="textarea" placeholder="Tapez votre texte ici"></textarea>
        <button name="submitmsg" type="submit"  id="submitmsg" class="btn-connect">Envoyer</button>
    </form>
</div>

<?php
}
?>

</html>