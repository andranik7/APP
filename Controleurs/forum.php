<?php
/*

- Controleur lié aux utilisateurs (connexion,inscription ...): 

*/
include('Modeles/requetesForum.php');
$possibleCat=array('annonces','problemes','actualites','autre','tous');

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
        
        if($categorie=="Tous") $posts=getAllPost($bdd);
        else $posts=getPost($bdd,$categorie);
        $view='subforum';
        break;
    
    case 'post':
        if(isset($_POST['messageReponse'])){
            $answer=htmlspecialchars($_POST['messageReponse']);
            $date=date("Y-m-d H:i:s");
            $postId=$_GET['postid'];
            postAnswer($bdd,$answer,$date,$postId,$_SESSION['idUtilisateur']);
            header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
            exit();
        }
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
            $categorie=str_replace("è","e",$_POST['categorie']);
            createTopic($bdd,strtolower($categorie),$titre,$message,$date,$_SESSION['idUtilisateur']);
/*             header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
            exit();  */
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