<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_panier'])) {
    $Fouee_nom = isset($_POST['Fouee_nom']) ? $_POST['Fouee_nom'] : '';
    $Fouee_prix = isset($_POST['Fouee_prix']) ? $_POST['Fouee_prix'] : '';

    // Ajouter les données au tableau du panier dans la variable de session
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $choix_supplement = isset($_POST['choix_supplement']) ? $_POST['choix_supplement'] : [];
    // $Supplement_nom = substr($choix_supplement, 0, -1);
    // $Supplement_prix = substr($choix_supplement, -1);

    $_SESSION['panier'][] = [
        'Fouee_nom' => $Fouee_nom,
        'Fouee_prix' => $Fouee_prix,
        'choix_supplement' => $choix_supplement,
    ];

 
    header('Location: ../index.php?controllers=menu');
    exit;
}
?>
