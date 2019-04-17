<?php
/*

- Controleur lié aux utilisateurs (connexion,inscription ...): 

*/
include('Modeles/requetesUtilisateurs.php');

if(isset($_GET['function']) || !empty($_GET['function'])){
    $function=$_GET['function'];
}
else{
    $function='accueil';
}

switch($function){
    
    case 'accueil':
        $view='accueil';
        break;
    
    case 'inscription':
        $view='inscription';
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['email'])){
            // si un formulaire a ete post
            // une fois l'inscription terminée, on re dirige vers la page de connexion
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $password=hash("sha256",htmlspecialchars($_POST['password']));
            $date=htmlspecialchars($_POST['date']);
            $codePostal=htmlspecialchars($_POST['cp']);
            $adresse=htmlspecialchars($_POST['adresse']);
            $email=htmlspecialchars($_POST['email']);
            $dateNaissance=htmlspecialchars($_POST['date']);
            $civilite=htmlspecialchars($_POST['civilite']);
            
            if($_POST['email']==$_POST['email_confirm']){
                if(is_numeric($codePostal)){
                    addCustomer($bdd,$nom,$prenom,$password,$email,$adresse,$codePostal,'a modifier',$dateNaissance,$civilite);
                    $view='connexion';
                }
                else
                    $error="Code postal non valide";
            }else
                $error="Les adresses mails doivent être identiques";
        }
        break;
    
    case 'connexion':
        if(isset($_SESSION))
            print_r($_SESSION);
        $view='connexion';
            if(isset($_POST['email']) && isset($_POST['password'])){
            // si un formulaire a ete post
            $email=htmlspecialchars($_POST['email']);
            $password=hash("sha256",htmlspecialchars($_POST['password']));
            $userInfo=speficQuery($bdd,'utilisateurs','*','email',$email);
            if($password==$userInfo[0]['mdp']){
                $error='Connexion ok';
                $_SESSION['nom']=$userInfo[0]['Nom'];
                $_SESSION['prenom']=$userInfo[0]['Prenom'];
                $_SESSION['role']=$userInfo[0]['role'];
                $_SESSION['email']=$userInfo[0]['email'];
                header('Location: http://localhost/app/index.php?cible=utilisateurs&function=user');
            }else
                $error="<div> Echec de l'authentification, veuillez vérifier vos informations.</div>";
        }
        break;
    
    case 'user':
        if(!isset($_SESSION['nom']) || !isset($_SESSION['prenom'])){
            $view="nonconnecte";
        }else{
            switch($_SESSION['role']){
                case 'client':
                    $view='client';
                    
                    break;
                
                case 'technicien':
                    break;
                
                case 'gestionnaire':
                    break;
                
                case 'admin':
                    $donnees=basicQuerry($bdd,'utilisateurs','*');
                    $view="admin";
                    break;
            }
        }
        break;
}

if($function=="user")
    include('Vues/bandeau.php');
include('Vues/'.$view.'.php');


if(isset($error)) echo $error;
?>

