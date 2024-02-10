<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/styleAccueil.css">
    <title>Aux Fouees La</title>
    
</head>
<body>
    
<div id="conf">
<?php
$request=isset($_GET['controllers']) ? $_GET['controllers'] : '';
$cheminActuel = $_SERVER['PHP_SELF'] . '?' . $request;
global $sommeTotale;

if (isset($_SESSION['Utilisateur_id']) && $_SESSION['Utilisateur_id'] == 1){?>
    <h2 class='title'>Liste des commandes</h2>
   <?php foreach ($commandeData as $row) {?>
    <form action="" method="post">
        <?php echo '<h3>' . 'Commande numéro ' . $row['Commande_id'] . " : " . $row['Commande_contenu'] . '</h3>'; ?>
        <input type="hidden" name="Commande_UtilisateurId" value="<?php echo $row['Commande_UtilisateurId']; ?>">
        <input type="hidden" name="Commande_id" value="<?php echo $row['Commande_id']; ?>">
        <button type="submit" name="Commande_termine" class="commander_button" action >terminé</button>
        <button type="submit" name="annuler_commande" class="commander_button" action >annulé</button>
        <button type="submit" name="Commande_recupere" class="commander_button" action >récupéré</button>
    </form>
    <?php } 

}
else {
if (!empty($_SESSION['panier'])) {
    ?>
        <h3>Contenu du panier</h3>
    <form action="" method="post">
        <?php
        foreach ($_SESSION['panier'] as $produit) {
            if (isset($_SESSION['utiliser_points']) && $_SESSION['utiliser_points'] === true) {
                $produit['Fouee_prix'] = $produit['Fouee_prix'] / 2;
            }
            echo 'Fouée : ' . $produit['Fouee_nom'] . ' ' . $produit['Fouee_prix'] . '€<br>';
            
            // Vérifier s'il y a des suppléments
            if (isset($produit['choix_supplement']) && !empty($produit['choix_supplement'])) {
                echo 'Suppléments : ' . implode(', ', $produit['choix_supplement']) . '€<br>';

                // Extraire le dernier caractère de chaque supplément
                $lastCharacterArray = array_map(function ($supplement) {
                    return substr($supplement, -1);
                }, $produit['choix_supplement']);

                // Créer une nouvelle variable "prix_total_commande" en additionnant "Fouee_prix" et le dernier caractère
                $prixTotalCommande = $produit['Fouee_prix'] + array_sum($lastCharacterArray);
                echo 'Prix du Fouée avec supplément : ' . $prixTotalCommande . '€<br>';

                // Ajouter le coût de la commande à la somme totale
                $sommeTotale += $prixTotalCommande;

            }
            else {
                $sommeTotale += $produit['Fouee_prix'];
            }
        }
        echo 'Prix de la commande : ' . $sommeTotale . '€<br>';
        ?>  
        

        <?php if($cheminActuel == '/auxfoueesla/index.php?commandes'): ?>
            <p>Votre commande sera prête à <?php echo $datetime?></p>
            <input type="hidden" name="datetime" value="<?php echo $datetime?>"> 
            <?php if(isset($_SESSION['Utilisateur_id'])): 
                if ($_SESSION['Utilisateur_points'] >= 30 && !isset($_SESSION['utiliser_points'])) {?>
                    <button type="submit" name="utiliser_point">Utiliser ses points</button>
            <?php } 
            else {?>
                 <p>vous n'avez pas assez de points ou vous avez déjà utilisé vos points</p> 
            <?php }
             ?>
                <button class="valider_panier_button" type="submit" name="valider_panier">
                Valider
                </button>
            <?php else: ?>
                <p style="font-weight: 600;">Vous devez être connecté pour commander votre panier</p>
            <?php endif ?>
        <?php else: ?>

            <a href="index.php?controllers=commandes">Valider le panier</a>
        <?php endif ?>
        </form> 
        <!-- LA COMMANDE SERA PRETE A CETTE HEURE CI -->
        <?php
} else {
    echo 'Le panier est vide.';
}


// Si aucune page d'origine n'est définie, ajoutez un lien de retour par défaut


// Si la demande de vidage du panier est soumise
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['vider_panier'])) {
    // Réinitialiser la variable de session panier
    $_SESSION['panier'] = [];
    echo 'Le panier a été vidé.';

    // Rediriger vers la page actuelle après avoir vidé le panier
    header('Location: ./index.php?controllers=menu');
    exit;
}

// Votre code existant pour afficher le contenu du panier

// Afficher le lien pour vider le panier
echo '<a href="./index.php?controllers=menu&vider_panier">Vider le panier</a>';
}
echo '<a href="index.php?controllers=menu">Retourner à la page de menu</a>';
?>
</div>
</body>
</html>
