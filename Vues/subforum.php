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
        <div id="box"> <a href="http://localhost/app/index.php?cible=forum&function=forum">Forum</a> > <?php echo $categorie?> </div>
    </div>
    <div class="group-forum">
        <?php
            if(sizeof($posts)<=0) echo 'Pas encore de topics dans cette catégorie';
            for($i=0;$i<sizeof($posts);$i++){
                echo '<a class="main-topic" href="http://localhost/app/index.php?cible=forum&function=post&postid='.$posts[$i]['idPostForum'].'">
                <img src="Vues/images/conversation-grey.png" class="img-forum">
                <p class="main-topic-title">'.$posts[$i]['titre'].'</p>
                <p class="date">'.$posts[$i]['date'].'</p>
                </a>';
            }
        ?>
    </div>
    <a href="http://localhost/app/index.php?cible=forum&function=newtopic" id="newtopic"> Créer un topic </a>
</body>
</html>