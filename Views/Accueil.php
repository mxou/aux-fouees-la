<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styleAccueil.css">
    <title>Aux Fouées la</title>
</head>

<body>

    <?php include "Views/header.php"; ?>
    <section class="accueil_container">
        <div id="header_banner"> 
            <div class="accueil">
                <div class="accueil_texte">
                    <p class="lang-fr">L'authenticité <span style="font-weight: 700;">Charentaise</span> à chaque <span style="font-weight: 700;">bouchée</span></p>
                    <p class="lang-en" style="display: none;">The authenticity <span style="font-weight: 700;">Charentaise</span> at each <span style="font-weight: 700;">bite</span></p>
                    <a href="index.php?controllers=menu" class="commander_button lang-fr">COMMANDER</a>
                    <a href="index.php?controllers=menu" class="commander_button lang-en" style="display: none;">ORDER</a>
                    <?php if(isset($_SESSION['Utilisateur_id'])): ?>
                        <p class="lang-fr">Tu es connecté <?php echo $_SESSION['Utilisateur_mail']; ?> Vous avez <?php echo $_SESSION['Utilisateur_points'];?> point(s)</p>
                        <p class="lang-en" style="display: none;">You're connected <?php echo $_SESSION['Utilisateur_mail']; ?> You have <?php echo $_SESSION['Utilisateur_points'];?> point(s)</p>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="propos">
            <img src="./assets/img/logo.svg" alt="Logo de notre company">
            <div class="propos_texte">
                <h2 class="title lang-fr">Qui sommes nous ?</h2>
                <p class="lang-fr">Chez 'Aux Fouées La', nous sommes un jeune couple passionné de Charentais dévoués à vous faire découvrir l'authenticité culinaire de notre région. Chaque fouée 
                    que nous préparons est imprégnée de notre amour pour la tradition et du désir de partager une expérience gastronomique unique avec vous</p>
                <span class="title lang-en" style="display: none;">Who are we ?</span>
                <p class="lang-en" style="display: none;">"Aux Fouéees Là" is a food truck of two passionated Charentais dedicated to making people discover the authenticity of our regional food. Each fouée that we prepare is filled with our love for the tradition and the desire to share a unique gastronomic experience with you.</p>
            </div>     
        </div>

        <div class="savoir">
            <h2 class="title lang-fr">Ou nous trouver ?</h2>
            <p class="lang-fr">Parking, zone commerciale, Angoulême</p>
            <p class="lang-fr">LUNDI : 12h-15h</p>
            <p class="lang-fr">MARDI : 12h-15h</p>
            <p class="lang-fr">MERCREDI : 12h-15h</p>
            <p class="lang-fr">JEUDI : 12h-15h</p>
            <p class="lang-fr">VENDREDI : 12h-15h</p>
            <p class="lang-fr">SAMEDI : 12h-15h</p>
            <p class="lang-fr">DIMANCHE : 12h-15h</p>
            <h2 class="title lang-en" style="display: none;">Where to find us ?</h2>
            <p class="lang-en" style="display: none;">Parking, zone commerciale, Angoulême</p>
            <p class="lang-en" style="display: none;">MONDAY : 12h-15h</p>
            <p class="lang-en" style="display: none;">THURSDAY : 12h-15h</p>
            <p class="lang-en" style="display: none;">WEDNESDAY : 12h-15h</p>
            <p class="lang-en" style="display: none;">TUESDAY : 12h-15h</p>
            <p class="lang-en" style="display: none;">FRIDAY : 12h-15h</p>
            <p class="lang-en" style="display: none;">SATURDAY : 12h-15h</p>
            <p class="lang-en" style="display: none;">SUNDAY : 12h-15h</p>
        </div>

        <div class="fidelite">
            <div class="fidelite_texte">
                <h2 class="title lang-fr">Notre système de points de fidélité</h2>
                <p class="lang-fr">Afin de vous remercier d'être passé chez nous, nous avons instauré un système de points de fidélité. Pour chaque achat éffectué vous récupererez des points de fidélité, 1€ étant égal a 1 point.</p>
                <h2 class="title lang-en" style="display: none;">Our fidelity system</h2>
                <p class="lang-en" style="display: none;">In a way to thank you for coming eat to our truck, we instored a fidelity points system. For each fouée you buy, you earn fidelity points. 1€ is equal at 1 point and at 10 points you have a free fouée !</p>
            </div>
            <img src="./assets/img/icons/star-gift.svg" alt="Icone fidélité">
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>
