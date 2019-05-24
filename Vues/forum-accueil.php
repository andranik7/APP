<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Vues/css/forum.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand|PT+Sans" rel="stylesheet">
    <title>Ecomatique | Forum </title>
</head>
<body>
    <div id="title">
        <div id="box">Bienvenue sur le forum d'Ecomatique</div>
    </div>

    <fieldset id="accueil-forum" class="group-forum">
        <legend>Accueil du forum</legend>
        <a class="main-topic" href="/app/index.php?cible=forum&function=subforum&cat=annonces">
            <img src="Vues/images/conversation-grey.png" class="img-forum">
            <p class="main-topic-title">Annonces officielles</p>
            <p class="date">12/12/12</p>
        </a>
        <a class="main-topic" href="/app/index.php?cible=forum&function=subforum&cat=actualites">
            <img src="Vues/images/conversation-grey.png" class="img-forum">
            <p class="main-topic-title">Les actus ecomatiques</p>
            <p class="date">12/12/12</p>
        </a>
        <a class="main-topic" href="/app/index.php?cible=forum&function=subforum&cat=problemes">
            <img src="Vues/images/conversation-grey.png" class="img-forum">
            <p class="main-topic-title">Les problèmes</p>
            <p class="date">12/12/12</p>
        </a>
        <a class="main-topic" href="/app/index.php?cible=forum&function=subforum&cat=autre">
            <img src="Vues/images/conversation-grey.png" class="img-forum">
            <p class="main-topic-title">Autre</p>
            <p class="date">12/12/12</p>
        </a>
        <a class="main-topic" href="/app/index.php?cible=forum&function=subforum&cat=tous">
            <img src="Vues/images/conversation-grey.png" class="img-forum">
            <p class="main-topic-title">Tous les topics</p>
            <p class="date">12/12/12</p>
        </a>
    </fieldset>
    <fieldset id="popular" class="group-forum">
        <legend>Les plus consultés</legend>
        <a class="main-topic" href="#">
            <img src="Vues/images/conversation-grey.png" class="img-forum">
            <p class="main-topic-title">Mes volets sont cassés</p>
            <p class="date">12/12/12</p>
        </a>
        <a class="main-topic" href="#">
            <img src="Vues/images/conversation-grey.png" class="img-forum">
            <p class="main-topic-title">Changement d'adresse</p>
            <p class="date">12/12/12</p>
        </a>
        <a class="main-topic" href="#">
            <img src="Vues/images/conversation-grey.png" class="img-forum">
            <p class="main-topic-title">Réglage du chauffage impossible</p>
            <p class="date">12/12/12</p>
        </a>
    </fieldset>
    
</body>
</html>