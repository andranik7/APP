<?php gettype($postInfo[0])?>
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
        <div id="box"> <a href="http://localhost/app/index.php?cible=forum&function=forum" >Forum</a> > <a href=<?php echo "http://localhost/app/index.php?cible=forum&function=subforum&cat=".ucfirst($postInfo[0]['categorie']).' > '. ucfirst($postInfo[0]['categorie']); ?></a> > Topic</div>
    </div>
    <div class="group-forum topic origin">
        <div class="userinfo">
            <img src="Vues/images/profil.jpg" alt="">
            <div> 
                <p><?php echo $postInfo[0]['prenom'].' '.$postInfo[0]['nom'];?></p>
                <p><?php echo $postInfo[0]['role'];?></p>
                <p><?php echo 'Posté le: '.$postInfo[0]['date'];?></p>
            </div>
        </div>
        <div class="message">
            <?php echo $postInfo[0]['message'];?>
        </div>
        
    </div>
    <?php
        if(sizeof($ansInfo)<=0) echo '<div class="group-forum topic"> Pas encore de réponses à ce message </div>';
        for($i=0;$i<sizeof($ansInfo);$i++){
            echo '<div class="group-forum topic"><div class="userinfo"><img src="Vues/images/profil.jpg" alt="">';
            echo "<div> 
                    <p>".$ansInfo[$i]['prenom'].' '.$ansInfo[$i]['nom']."</p>
                    <p>".$ansInfo[$i]['role']."</p>
                    <p>Posté le: ".$ansInfo[$i]['date']."</p>
                 </div></div>";
            echo "<div class='message'>".$ansInfo[$i]['message']."</div></div>";
        }
    ?>

</body>
</html>