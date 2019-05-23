<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Vues/css/alice.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="title">
        Mon relevé de consommation
    </div>
    <div id="contentconso">
        <fieldset id="choixhabitat">
            <legend>Choix de l'habitat</legend>
            <div id="listhabitats">
                <div>La liste des capteurs est vide</div>
            </div>
        </fieldset>
        <fieldset id="consommation">
            <legend>Affichage de la consommation</legend>
            <div>Pour commencer, veuillez sélectionner un habitat</div>
            <canvas id="canvas" width="800" height="500"></canvas>
        </fieldset>
    </div>
</body>
</html>