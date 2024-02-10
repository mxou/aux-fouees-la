<?php
define('BASE_PATH', '/home/srochedix/www/auxfoueesla/');
    class UtilisateurController{
        public function register(){
            include(BASE_PATH . 'Views/Utilisateur/Register.php');
            require(BASE_PATH . 'Models/UtilisateurModel.php');
            if (
                isset($_POST['nom']) 
                && isset($_POST['pnom']) 
                && isset($_POST['email'])
                && isset($_POST['mdp']) 
                ) {
                if(
                    $_POST['nom'] != null
                    && $_POST['pnom'] != null  
                    && $_POST['email'] != null 
                    && $_POST['mdp'] != null 
                    ){
                        $UtilisateurData = array (
                            "nom"  => $_POST["nom"],
                            "pnom"  => $_POST["pnom"],
                            "email" => $_POST["email"],
                            "mdp"   => $_POST["mdp"]
                        );
                        $Utilisateur = new Utilisateur();
                        $Utilisateur->register($UtilisateurData);
                    };
                };
        }
        public function login() {
                
            require(BASE_PATH . 'Models/UtilisateurModel.php');
            if (
                isset($_POST['email']) 
                && isset($_POST['mdp']) 
                ) {
                    if(
                        $_POST['email'] != null 
                        && $_POST['mdp'] != null 
                        ){
                            $UtilisateurData = array (
                                "email"  => $_POST["email"],
                                "mdp"   => $_POST["mdp"]
                            );
                            $Utilisateur = new Utilisateur();
                            $Utilisateur->login($UtilisateurData);
                        };
                    };
                    
                    include(BASE_PATH . 'Views/Utilisateur/Login.php');
            }  
        public function logout(){
            require(BASE_PATH . 'Models/UtilisateurModel.php');
            $Utilisateur = new Utilisateur();
            $Utilisateur->logout();
        }  
    }