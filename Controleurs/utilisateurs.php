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
            

            if($_POST['email']==$_POST['email_confirm']){
                if(is_numeric($codePostal)){
                    addCustomer($bdd,$nom,$prenom,$password);
                    $view='connexion';
                }

                else
                    $error="Code postal non valide";
            }else
                $error="Les adresses mails doivent être identiques";

            
        }
        break;
    
    case 'connexion':
        $view='connexion';
        //if(isset($_POST['mail']) && isset($_POST['mdp'])){
            // si un formulaire a ete post


            // une fois la connexion établie
            $connexionSucces=TRUE;
            if($connexionSucces)
                $view='admin';
                
            else
                $error="<div> Echec de l'authentification, veuillez vérifier vos informations.</div>";
        //}
        break; 
}

include('Vues/'.$view.'.php');

if(isset($error)) echo $error;
?>

