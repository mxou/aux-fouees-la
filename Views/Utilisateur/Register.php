<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/styleAccueil.css">
        <title>Inscription</title>
    </head>
    
    <body>
        <div id="auth">
            <img class="authReg" src="./assets/img/logoIA.png" alt="camion fouee">
            <div>
                <h2>S'inscrire</h2>
                <p>Nouveau client veuillez enregistrer vos informations</p>
                <div>
                    <!-- Formulaire pour créer un nouveau compte -->
                    <form method="POST" action="">
                        <!-- Champs pour le contenu. -->
                        <input type="text" name="nom" placeholder="Nom" class="authInput">
                        <input type="text" name="pnom" placeholder="Prénom" class="authInput">
                        <input type="email" name="email" placeholder="Email" class="authInput">
                        <input type="password" name="mdp" placeholder="Mot de passe" class="authInput">
                        <!-- Autres champs et bouton de soumission -->
                        <input type="submit" value="Créer un compte">
                    </form>
            </div>
            <a href="index.php">Retourner à l'accueil</a>
            <p>Vous avez déjà un compte ? <a href="index.php?controllers=login">Se connecter</a> !</p>
        </div>
    </div>

</body>
