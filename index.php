 
 <?php
require 'vendor/autoload.php';
require('Core/config.php');
session_start();
 // Récupération de l'URL demandée
//  $request = $_GET['controllers'];
$request = isset($_GET['controllers']) ? $_GET['controllers'] : '';

 // Création d'un routeur basique pour les actions possibles
 switch ($request) {
     case '':
        
         ?>
         <?php
        require_once 'Controllers/AccueilController.php';
        $AccueilController = new AccueilController();
        $AccueilController->index();
        break;
        case 'register':
            // Afficher le formulaire d'inscription
            require_once 'Controllers/UtilisateurController.php';
            $UtilisateurController = new UtilisateurController();
            $UtilisateurController->register();
            break;
        case 'login':
            // Afficher le formulaire de connexion
            require_once 'Controllers/UtilisateurController.php';
            $UtilisateurController = new UtilisateurController();
            $UtilisateurController->login();
            break;
        case 'logout':
            // Déconnexion
            require_once 'Controllers/UtilisateurController.php';
            $UtilisateurController = new UtilisateurController();
            $UtilisateurController->logout();
            break;  
        case 'menu':
            // Déconnexion
            require_once 'Controllers/MenuController.php';
            $MenuController = new MenuController();
            $MenuController->menu();
            break;
        case 'commandes' :
            require_once "Controllers/CommandeController.php";
            break;
    default:
        case 'contact' :
            require_once "Controllers/ContactController.php";
            $ContactController = new ContactController();
            $ContactController->contact();
            break;
    // Gestion d'une URL non reconnue (par exemple, afficher une page 404)
    http_response_code(404);
    echo 'Page non trouvée';
    break;
    }


?>