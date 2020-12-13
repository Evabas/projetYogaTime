<?php
session_start();
require __DIR__ . '/vendor/autoload.php';
require('controller/frontend.php');

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader, [
    'cache' => false,
]);

$twig->addGlobal('session', $_SESSION);

// barre de navigation

if (isset($_GET['p'])) {
    $page= $_GET['p'];


    switch ($page) {
        case 'home':
            echo $twig->render('home.twig');
        break;
        case 'lessons':
            echo $twig->render('lessons.twig');
        break;
        case 'planning':
            echo $twig->render('planning.twig');
        break;
        case 'team':
            echo $twig->render('team.twig');
        break;
        case 'price':
            echo $twig->render('price.twig');
        break;
        case 'contact':
            echo $twig->render('contact.twig');
        break;
        case 'connection':
            echo $twig->render('connection.twig');
        break;
        case 'registration':
            echo $twig->render('registration.twig');
        break;
        case 'responsivePlayer':
            echo $twig->render('responsivePlayer.twig');
        break;
        case 'logOut':
              session_unset ();
              session_destroy();
              header('location:index.php?p=home');
        break;
        case 'admin':
            //  if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {}
             echo $twig->render('admin.twig');
        break;
        default : 
            header('HTTP/1.0 404 Not Found');
            echo $twig->render('404.twig');
        break;
    }
}
// form
            try {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] == 'newMember') {  
     
                        if (isset($_POST['form_inscription'])){
                            $pwd = htmlspecialchars($_POST['pwd']);
                            $pwd2 = htmlspecialchars($_POST['pwd2']);
                        
                            if (!empty($_POST['pseudo']) AND !empty($_POST['pwd']) AND !empty($_POST['pwd2']) AND !empty($_POST['mail'])) {  
                                $pseudoexist = pseudoExist();

                                if (isset($pseudoexist) && ($pseudoexist == 0)) {
                                    if ($pwd == $pwd2) {
                                        $req = newMember(); 
                                        header('location:index.php?p=connection');
                                    }
                                    else
                                    {
                                        throw new Exception('Les mots de passe sont différents. Retapez votre mot de passe.');
                                    }
                                }
                                else
                                {
                                    throw new Exception('Ce pseudonyme est déjà utilisé.');
                                }   
                            }    
                            else
                            {
                                throw new Exception('Tous les champs doivent être complétés!');
                            } 
                        }
                    }
                
                      
                    elseif ($_GET['action'] == 'member') {
                        if (isset($_POST['pseudoconnect']) && isset($_POST['pwdconnect'])) {
                            $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
                            $pwdconnect = htmlspecialchars($_POST['pwdconnect']);
                        
                            if(!empty($pseudoconnect) && !empty($pwdconnect)){
                               $resultat = member();
                               $isPasswordCorrect = password_verify($pwdconnect, $resultat['pass']);
                                if (isset($resultat) && ($resultat && $isPasswordCorrect)) {
                    
                                        $_SESSION['pseudo'] = $resultat['pseudo'];
                                        $_SESSION['role'] = $resultat['role'];
                                        header('location:index.php?p=responsivePlayer'); 
                                    
                                }
                                else
                                {
                                
                                    throw new Exception('Identifiants incorrects!');
                                }   
                            } 
                            else
                            {
                            
                                throw new Exception('Tous les champs doivent être complétés!');
                            }             
                        }    
                    }
                }
                // else {
                    
                //     header("location:index.php/home.twig");
                // }
            
            }
            catch(Exception $e) { 
                echo 'Erreur : ' . $e->getMessage();
            }