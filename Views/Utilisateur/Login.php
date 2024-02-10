<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/styleAccueil.css">
        <title>Connexion</title>
    </head>
    
    <body id="auth_page">

        <div id="auth">
            <img src="./assets/img/logoIA.png" alt="camion fouee">
            <div>
                <h2>Se connecter</h2>
                <p>Savourer l'innatendu, déguster l'extraordinaire a chaque bouchée</p>
                <div>
                <!-- Formulaire pour se connecter -->
                <form method="POST" action="">
                    <!-- Champs pour le contenu. -->
                    <input type="text" name="email" placeholder="Email" class="authInput">
                    <input type="password" name="mdp" placeholder="Mot de passe" class="authInput">
                    <!-- Autres champs et bouton de soumission -->
                    <input type="submit" value="Se connecter">
                </form>
            </div>
            <a href="index.php?controllers=">Retourner à l'accueil</a>
            <p>Vous n’avez pas de compte ? Créez en un <a href="index.php?controllers=register">ici</a> !</p>
        </div>
    </div>

</body>


</html>