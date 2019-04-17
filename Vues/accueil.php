<?php
/*

- Controleur lié aux utilisateurs (connexion,inscription ...): 

*/
?>

<!-- <h1> C'est l'accueil -  TALHA</h1>
<a href="index.php?cible=utilisateurs&function=inscription">Inscription</a>
<a href="index.php?cible=utilisateurs&function=connexion">Connexion</a>
 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel= "stylesheet" href= "Vues/css/accueil.css"/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand|PT+Sans" rel="stylesheet">
    <title>Page d'accueil Ecomatique</title>
</head>

<body>
    <header>
        <div id="header">
            <a href="http://localhost/app/index.php?cible=utilisateurs&function=inscription" class="btn">Inscription</a>
            <a href="http://localhost/app/index.php?cible=utilisateurs&function=connexion" class="btn">Connexion</a>
            <a href="#" class="btn">Messagerie</a>
            <input type="text" name="recherche" class="search-bar" placeholder="Adresse, arrondissement..">
            <button class="btn-search">Chercher</button>
        </div>   
    </header>
    <div class="block">
        <div style="flex:1">
            <section>
                <h1>ECOMATIQUE</h1>
            </section>
            <p class="presentation">Dans un monde en perpétuelle innovation, la révolution des technologies du numérique engendre de grands défis notamment dans le domaine environnemental.</p>

            <button class="btn-search" style="background-color: #FFA500">
                Voir les offres
            </button>
        </div>

        <div style="flex:1; text-align:center;">
            <img src="home.jpg" style="width:80%; margin:30px; border-radius:10px">
        </div>
    </div>


    <div class="block" style="margin-top:100px;">


        <div style="flex:1; text-align:center;">
            <img src="home2.jpg" style="width:95%; margin:30px; border-radius:10px">
        </div>

        <div style="flex:1; padding-left:30px;">
            <section>
                <h2>Notre équipe travaille avec passion, détermination, attention et motivation</h2>
            </section>
            <p class="presentation">C’est dans cette optique que notre société, EcoMatique, situé au cœur d’Issy les Moulineaux tout près de Paris, se soucie de votre quotidien chez vous.</p>

            <button class="btn-search" style="background-color: #FF0000">
                Faire un devis
            </button>
        </div>
    </div>


    <div class="block" style="margin-top:100px; margin-bottom: 100px;">


        <div style="flex:1; text-align:center;">
            <div class="rectangle">
                <img src="mail.png">
                <div style="font-weight:bold;">Contactez-nous par Mail</div>
                <div style="color:gray; margin-top:10px;">mail: <a href="mailto:contact@ecomatique.fr">contact@ecomatique.fr</a></div>
                
            </div>
            <div class="rectangle">
                <img src="phone.png">
                <div style="font-weight:bold;">Par téléphone</div>
                <div style="color:gray; margin-top:10px;">07 77 77 77 77</div>
                
            </div>
            <div class="rectangle">
                <img src="location.png">
                <div style="font-weight:bold;">Localisation</div>
                <div style="color:gray; margin-top:10px;">35 rue Rouget de l'Isle 92100 Issy</div>
                
            </div>
        </div>

        <div style="flex:1; padding-left:30px;">
            <div class="rectangle2">
                <input type="text" name="nom" class="input" placeholder="Nom complet">
                <input type="email" name="email" class="input" placeholder="Email">
                <input type="text" name="phone" class="input" placeholder="Numéro de téléphone">

                <textarea class="textarea" placeholder="Votre question ici">
                    
                </textarea>


                <button class="submit">Soumettre</button>
            </div>
        </div>
    </div>


    <footer>
        <div id="header">
            <a href="FAQ.html" class="btn">FAQ</a>
            <a href="Apropos.html" class="btn">A propos</a>
        </div>   
    </footer>
</body>
</html>

