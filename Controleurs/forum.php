<?php
/*

- Controleur lié aux utilisateurs (connexion,inscription ...): 

*/
include('Modeles/requetesForum.php');
$possibleCat=array('Annonces','Problèmes','Actualités','Tous','Autres');

if(isset($_GET['function']) || !empty($_GET['function'])){
    $function=$_GET['function'];
}
else{
    $function='forum-accueil';
}

switch($function){
    case 'forum':
        $view='forum-accueil';
        break;
    
    case 'subforum':
        $categorie=$_GET['cat'];
        if(!in_array($categorie,$possibleCat)){
            $view='404';
            break;
        }
        $posts=getPost($bdd,$categorie);
        $view='subforum';
        break;
    
    case 'post':
        $postId=$_GET['postid'];
        $postInfo=getSpecificPost($bdd,$postId);
        $ansInfo=getAnswer($bdd,$postId);
        if(sizeof($postInfo)==0){
            $view='404';
            break;
        }
        $view='post';
        break;

    case 'newtopic':
        $view='newpost';
        if(isset($_POST['titre']) && isset($_POST['message'])){
            $titre=htmlspecialchars($_POST['titre']);
            $message=htmlspecialchars($_POST['message']);
            $date=date("Y-m-d H:i:s");
            createTopic($bdd,strtolower($_POST['categorie']),$titre,$message,$date,$_SESSION['idUtilisateur']);
            header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
            exit();
        }
        break;

    default:
        $view='forum-accueil';
        break;
    
}

//if($function=="user" || $function=="forum" )
include('Vues/bandeau.php');
include('Vues/'.$view.'.php');


if(isset($error)) echo $error;
?>

<script src="Controleurs/behaviour.js"></script>