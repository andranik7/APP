<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="Vues/css/bandeau.css" />
    </head>

    <header>

      <div class="menulangue"> 
        <span>Français</span>
        <div class="menulanguehidden">
          <div class="submenulangue"> 
            <img src="Vues/images/Français.jpg"> 
            <span>Français</span> 
          </div>

          <div class="submenulangue"> 
            <img src="Vues/images/Anglais.jpg">
            <span>Anglais</span> 
          </div>

          <div class="submenulangue"> 
            <img src="Vues/images/Chinois.jpg">
            <span>Chinois</span>
          </div> 
        </div>
      </div>



       <a href="http://localhost/app/index.php?cible=utilisateurs&function=user" class="profil"><img src="Vues/images/profil.jpg" class="imgprofil" alt="Profil"></a>
       <a href="http://localhost/app/index.php?cible=forum&function=forum" class="profil"><img src="Vues/images/conversation-grey.png" class="imgprofil"></a>
       <a href="http://localhost/app/index.php" class="profil"><img src="Vues/images/home_header.png" class="imgprofil"></a>
       <div id="infoClient">
          <div><?php echo $_SESSION['prenom'].' '.$_SESSION['nom'].' ('.$_SESSION['role'].')';?></div>
          <a name="login" class="login" href="Vues/deconnexion.php">Se déconnecter</a>
       </div>
       
    </header>
</html>