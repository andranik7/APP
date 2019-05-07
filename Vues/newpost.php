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
        <div id="box">Nouveau topic <a href="http://localhost/app/index.php?cible=forum&function=forum"> (retour)</a></div>
    </div>
    <div>
    <div class="group-forum" id="formwrapper">
        <form action="" method="post" id="formmsg">
                <table>
                    <tr>
                        <td><label for="titremsg" required>Sujet</label></td>
                        <td><input type="text" name="titre" id="titremsg"></td>
                    </tr>
                    <tr>
                        <td><label for="catmsg">Categorie</label></td>
                        <td>
                        <?php 
                            if($_SESSION['role']=='admin'){
                                echo '<select name="categorie" id="catmsg">
                                        <option value="annonces">Annonces</option>
                                        <option value="problemes">Problème</option>
                                        <option value="actualite">Actualités</option>
                                        <option value="autre">Autre</option>
                                    </select>';
                            }else{
                                echo '<select name="categorie" id="catmsg">
                                    <option value="problemes">Problème</option>
                                    <option value="autre">Autre</option>
                                </select>';
                            }
                        ?>

                        </td>
                    </tr>
                    <tr>
                        <td><label for="txtmsg">Contenu</label></td>
                        <td><textarea name="message" cols="80" rows="25" placeholder="Votre message ici" id="txtmsg"></textarea></td>
                    </tr>
                </table>
                <input type="submit" value="Poster">
        </form>
    </div>


    </div>

    
</body>
</html>