<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Vues/css/consommation.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="title">
        Mon relevé de consommation
    </div>
    <div id="contentconso">
        <fieldset id="choixhabitat">
            <legend class="lgd">Choix de l'habitat</legend>
            <div id="listhabitats">
                <div>La liste des capteurs est vide</div>
            </div>
        </fieldset>
        <fieldset id="consommation">
            <legend class="lgd">Affichage de la consommation</legend>
            <div id="infoConso">Pour commencer, veuillez sélectionner un habitat</div>
            <canvas id="canvas" width="800" height="400"></canvas>
        </fieldset>
    </div>
</body>
</html>
