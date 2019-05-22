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
                    header('Location: http://localhost/app/index.php?cible=utilisateurs&function=connexion');
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
                print_r($userInfo);
                $userId=getClientId($bdd,$email);
                if(sizeOf($userInfo)>0){
                    if($password==$userInfo[0]['mdp']){
                        $error='Connexion ok';
                        $_SESSION['nom']=$userInfo[0]['Nom'];
                        $_SESSION['prenom']=$userInfo[0]['Prenom'];
                        $_SESSION['role']=$userInfo[0]['role'];
                        $_SESSION['email']=$userInfo[0]['email'];
                        $_SESSION['idUtilisateur']=$userInfo[0]['idUtilisateur'];
                        $_SESSION['idClient']=$userId[0]['idClient'];
                        header('Location: http://localhost/app/index.php?cible=utilisateurs&function=user');
                    }else
                        $error="<div> Echec de l'authentification, veuillez vérifier vos informations.</div>";
                }else
                    $error="<div> Cet utilisateur est inconnu.</div>";
        }
        break;
    
    case 'user':
        if(!isset($_SESSION['nom']) || !isset($_SESSION['prenom'])){
            $view="nonconnecte";
        }else{
            switch($_SESSION['role']){
                case 'client':
                    $view='client';
                    $listeLogements=getHomeList($bdd,$_SESSION['idClient']);

                    // ajout de maison
                    if(isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['superficie'])){
                        $adresse=htmlspecialchars($_POST['adresse']);
                        $codePostal=htmlspecialchars($_POST['cp']);
                        $ville=htmlspecialchars($_POST['ville']);
                        $nbHabitants=htmlspecialchars($_POST['nb_habitants']);
                        $_SESSION['adresse']=$adresse;
                        addHome($bdd,$adresse,$codePostal,$ville,$nbHabitants,$_SESSION['idClient']);
                        header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
                        exit();
                    }
                    // affichage des pièces 
                    if(isset($_POST['logements']) || isset($_SESSION['adresse'])){
                        if(isset($_POST['logements'])){
                            $listePieces=getRoomList($bdd,$_SESSION['idClient'],$_POST['logements']);
                            $_SESSION['adresse']=$_POST['logements'];
                            break;
                        }
                        if(isset($_SESSION['adresse']))
                        $listePieces=getRoomList($bdd,$_SESSION['idClient'],$_SESSION['adresse']);
                    }
                    // ajout de piece
                    if(isset($_POST['typePiece']) && isset($_POST['superficie'])){
                        $typePiece=htmlspecialchars($_POST['typePiece']);
                        $superficie=htmlspecialchars($_POST['superficie']);
                        addRoom($bdd,$typePiece,$superficie,$_SESSION['idClient'],$_SESSION['adresse']);
                        header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
                        exit();
                    }
                    // affichage capteurs
                    if(isset($_POST['piece'])){
                        $displayModal=true;
                        $listeCapteur=getSensorList($bdd,$_SESSION['idClient'],$_SESSION['adresse'],$_POST['piece']);
                        $_SESSION['piece']=$_POST['piece'];
                        $_SESSION['idPiece']=getRoomId($bdd,$_SESSION['idClient'],$_SESSION['adresse'],$_POST['piece'])[0]['idPiece'];
                    }

                    break;
                
                case 'technicien':
                    $view='Panneau_technicien';
                    break;
                
                case 'gestionnaire':
                    break;
                
                case 'admin':
                    $donnees=basicQuerry($bdd,'utilisateurs','*');
                    if(isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['remdp']) && isset($_POST['mail']) && isset($_POST['role']) && isset($_POST['nom'])){
                        $nom=htmlspecialchars($_POST['nom']);
                        $prenom=htmlspecialchars($_POST['prenom']);
                        $password=hash("sha256",htmlspecialchars($_POST['mdp']));
                        $repassword=hash("sha256",htmlspecialchars($_POST['remdp']));
                        $role=htmlspecialchars($_POST['role']);
                        $mail=htmlspecialchars($_POST['mail']);
                        $dateNaissance=htmlspecialchars($_POST['date']);
                        $civilite=htmlspecialchars($_POST['sexe']);
                        
                        if($password === $repassword){
                            if(!checkMailExist($bdd,$mail)){
                                addUser($bdd,$nom,$prenom,$password,$mail,$dateNaissance,$role,$civilite);
                                header("Location: " . $_SERVER['REQUEST_URI']); // Post / request / get 
                                exit();
                            }else $error="Ce mail est déjà utilisé";
                                
                        }else $error="Les mots de passe ne correspondent pas";

                    }
                    $view="admin";
                    break;
            }
        }
        break;

        case 'forum':
            $view='forum';
            break;
}

if($function=="user" || $function=="forum" )
    include('Vues/bandeau.php');
include('Vues/'.$view.'.php');


if(isset($error)) echo $error;
?>

<script src="Controleurs/behaviour.js"></script>