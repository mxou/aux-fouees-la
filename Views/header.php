<header id="header_menu">
    
        <div id="header_menu_haut">
            <ul>
                <li><a href="#"><img src="./assets/img/icons/instagram.svg" alt="Logo instagram"></a></li>
                <li><a href="#"><img src="./assets/img/icons/facebook.svg" alt="Logo facebook"></a></li>
                <li><a href="#"><img src="./assets/img/icons/twitter.svg" alt="Logo twitter"></a></li>
            </ul>
            <img src="./assets/img/logo.svg" alt="Logo woobler" class="logo_woobler">
           <div class="header_right_buttons">
           <button id="toggleLanguageButton">FR/EN</button>
           <?php if( isset($_SESSION['Utilisateur_id']) && $_SESSION['Utilisateur_id'] == 1): ?>
            <a href='index.php?controllers=commandes'><img src="./assets/img/icons/shopping-cart.svg" alt="Icone panier" class="panier_button"></a>
            <?php else: ?> 
                <img src="./assets/img/icons/shopping-cart.svg" alt="Icone panier" class="panier_button">
            <?php endif ?>
            <?php if(isset($_SESSION['Utilisateur_id'])): ?>
         <a href="index.php?controllers=logout" class="log_button lang-fr">Se déconnecter</a>
         <a href="index.php?controllers=logout" class="log_button lang-en" style="display: none;">Log out</a>
         <?php else: ?>
         <!-- <a href="index.php?controllers=register">Créer un compte</a> -->
         <a href="index.php?controllers=login" class="log_button lang-fr">Se connecter</a>
         <a href="index.php?controllers=login" class="log_button lang-en" style="display: none;">Log in</a>
         <?php endif ?>
         <!-- <a href="index.php?controllers=commander">Commander</a> -->
        </div>
        </div>
        <ul id="header_menu_bas">
        <li class="accueil_li"><a href="index.php" class="lang-en" style="display: none;">Home</a><a href="index.php" class=" lang-fr">Accueil</a></li>
        <li class="menu_li"><a href="index.php?controllers=menu">Menu</a></li>
        <!-- <li class="panier_li">Panier</li> -->
        <li class="contact_li"><a href="index.php?controllers=contact">Contact</a></li>
        <!-- <li class="panier_li">Panier</li> -->
        </ul>
        <?php if( isset($_SESSION['Utilisateur_id']) && $_SESSION['Utilisateur_id'] == 1): ?>
            
        <?php else: ?>   
        <div class="panier">
            <div>
                <p>Votre panier</p>
                <span class="croix">X</span>
                <?php include "Views/Commande/Confirmation.php"; ?>
           </div>
        </div>
        <?php endif ?>
    </header>