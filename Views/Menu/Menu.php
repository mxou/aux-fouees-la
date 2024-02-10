<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styleAccueil.css">
    <link rel="icon" type="image/png" href="./../../../assets/img/logo.svg">
    <title>Aux Fouees La</title>
    
</head>
<body>


    <?php include "Views/header.php"; ?>
    
    <div id="header_banner"></div>
    <section class="menu_fouee">
        <h2 class="title">Listes des Fouées</h2>
        <?php  require_once 'Controllers/FoueeController.php';
            $FoueeController = new FoueeController();
            $FoueeController->fouee(); ?>   
        <a href="./assets/img/carteai2.svg" download id="download_carte">Télécharger notre carte !</a>
    </section>
    
    
    
    
    
    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</body>
</html>