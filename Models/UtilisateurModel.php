<?php Class Utilisateur {
    public function register($UtilisateurData){
        global $pdo;
        $sql ='SELECT *
        FROM `utilisateurs` 
        WHERE Utilisateur_mail = :email';
        $sth = $pdo->prepare($sql);
        $sth->execute([ 
            'email' => $_POST['email'], 
        ]);
        // on récupère les données dans le tableau associatif
        $existant = $sth->fetch();
        if($existant===false){
            $sql = "INSERT INTO `utilisateurs`
                    ( Utilisateur_nom, Utilisateur_pnom, Utilisateur_mail, Utilisateur_mdp)
                    VALUES ( :nom, :pnom, :email, :mdp)";
            // exécuter ce traitement
            $sth = $pdo->prepare($sql);
            $status = $sth->execute([
                'nom' => $UtilisateurData['nom'],
                'pnom' => $UtilisateurData['pnom'],
                'email' => $UtilisateurData['email'],
                'mdp' => password_hash($UtilisateurData['mdp'], PASSWORD_BCRYPT)
            ]);
            header('Location: index.php?controllers=login');
        }
        elseif(isset($existant)){
            echo "l'adresse mail est déjà utilisée";
        }
    }
    public function login($UtilisateurData){
        global $pdo;
        // var_dump($UtilisateurData);
        $sql = 'SELECT *
            FROM `utilisateurs` 
            WHERE Utilisateur_mail = :email';
            
        $sth = $pdo->prepare($sql);
        $sth->execute([ 
            'email' => $UtilisateurData['email']
        ]);

        // on récupère les données dans le tableau associatif
        $Utilisateur = $sth->fetch();
        $mdpErreur ='<p>Nom utilisateur ou mot de passe incorrect</p>';
        // var_dump($Utilisateur);
        if($Utilisateur === false ){
            echo $mdpErreur;
        }
        else{
            if(password_verify($UtilisateurData['mdp'],$Utilisateur['Utilisateur_mdp'])){
                session_start();
                $_SESSION['Utilisateur_mail'] = $Utilisateur['Utilisateur_mail'];
                $_SESSION['Utilisateur_id'] = $Utilisateur['Utilisateur_id'];
                $_SESSION['Utilisateur_points'] = $Utilisateur['Utilisateur_points'];
                header('Location: index.php');
            }else {
                echo $mdpErreur;
            }
            
        }
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy(); 
        header('Location: index.php');
    }


}