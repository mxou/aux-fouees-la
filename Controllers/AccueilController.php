<?php Class AccueilController {
    public function index() {
        //code pour vérifier le lien entre controller et view
        $message = "Bienvenue dans sur la page d'accueil des fouées là ";
        //charger la view
        include 'Views/Accueil.php';
    }
} 