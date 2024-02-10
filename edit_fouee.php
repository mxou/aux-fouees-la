<?php
if(isset($_POST['fouee_title']) && isset($_POST['fouee_description']) && isset($_POST['fouee_prix'])) {
    $fouee_title = $_POST['fouee_title'];
    $fouee_description = $_POST['fouee_description'];
    $fouee_prix = $_POST['fouee_prix'];

    // Faites ce que vous avez besoin avec les données, par exemple, les enregistrer en base de données.

    echo "Contenu reçu par PHP : Titre: $fouee_title, Description: $fouee_description, Prix: $fouee_prix";
} else {
    echo "Certaines données sont manquantes. Aucun contenu reçu par PHP.";
}
?>
