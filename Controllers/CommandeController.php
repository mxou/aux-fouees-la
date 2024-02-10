<?php
    require 'Models/CommandeModel.php';
    // Commandes
    $commandeModel = new Commande();
    $commandeData = $commandeModel->showAllOder();
    $waitingtimeEstimation =  $commandeModel -> getTimeEstimation();
    // récupère le l'interval de temps necessaire à la fabrication et la transforme en String
    $getMinutes = strval($waitingtimeEstimation) . " minutes";
    //récupère une nouvelle date à l'heure actuel
    $getDate = new DateTime();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['utiliser_point'])){
            $Utilisateur_id=$_SESSION['Utilisateur_id'];
            $commandeModel-> utiliserPoints($Utilisateur_id);
        }
        if (isset($_POST['valider_panier'])){
            $panier=$_SESSION['panier'];
            foreach ($panier as $fouee) {
                if (isset($_SESSION['utiliser_points']) && $_SESSION['utiliser_points'] === true) {
                    $fouee['Fouee_prix'] = $fouee['Fouee_prix'] / 2;
                }
                if (isset($fouee['choix_supplement']) && !empty($fouee['choix_supplement'])) {
                    // Extraire le dernier caractère de chaque supplément
                    $lastCharacterArray = array_map(function ($supplement) {
                        return substr($supplement, -1);
                    }, $fouee['choix_supplement']);
                        // Extraire le contenu de chaque supplément sans le dernier caractère
        $nomSupplement = array_map(function ($supplement) {
            return substr($supplement, 0, -1);
        }, $fouee['choix_supplement']);
         // Créer une nouvelle variable "prix_total_commande" en additionnant "Fouee_prix" et le dernier caractère
         $prixTotalCommande = $fouee['Fouee_prix'] + array_sum(array_map('intval', $nomSupplement));
        
         // Join les suppléments sans le dernier caractère pour créer la variable $Nomfouee
         $Nomfouee = $fouee['Fouee_nom'] . ' ' . implode(' ', $nomSupplement);
                    // Créer une nouvelle variable "prix_total_commande" en additionnant "Fouee_prix" et le dernier caractère
                    $prixTotalCommande = $fouee['Fouee_prix'] + array_sum($lastCharacterArray);
                }
                else{
                    $Nomfouee=$fouee['Fouee_nom'];
                    $prixTotalCommande = $fouee['Fouee_prix'];
                }
                $commandeModel-> createOrder($prixTotalCommande, $Nomfouee);
                
            }      
            $dateRetrait = $_POST['datetime'];
            $invoiceItems = $_SESSION['panier'];
            $pdfPath = $_SERVER['DOCUMENT_ROOT'] . '/Facture.pdf';
            $commandeModel->generatePDF($pdfPath, $invoiceItems, $dateRetrait);
            $Utilisateur_mail=$_SESSION['Utilisateur_mail'];
            $commandeModel-> sendMail($Utilisateur_mail);
            unset($_SESSION['utiliser_points']);
            header('Location: ./index.php?controllers=menu');
        }
        if (isset($_POST['annuler_commande'])) {
            // Assurez-vous que Commande_id est défini dans le formulaire
            if (isset($_POST['Commande_id'])) {
                $order_id_to_cancel = $_POST['Commande_id'];
                $commandeModel->deleteOrder($order_id_to_cancel);
                // Redirigez après avoir annulé la commande
                header('Location: ./index.php?controllers=commandes');
                exit;
            }
            
        }
        elseif (isset($_POST['Commande_termine'])) {
            // Assurez-vous que Commande_id est défini dans le formulaire
            if (isset($_POST['Commande_id'])) {
                $order_id_to_complete = $_POST['Commande_id'];
                $commandeModel->updateOrderStatus($order_id_to_complete);
                // Redirigez après avoir terminé la commande
                header('Location: ./index.php?controllers=commandes');
                exit;
            }
        }
        elseif (isset($_POST['Commande_recupere'])) {
            // Assurez-vous que Commande_id est défini dans le formulaire
            if (isset($_POST['Commande_id'])) {
                $order_id_to_recup = $_POST['Commande_id'];
                $UtilisateurId = $_POST['Commande_UtilisateurId'];
                $commandeModel->updateOrder($order_id_to_recup);
                $commandeModel->addPoints($UtilisateurId);
                // Redirigez après avoir récupéré la commande
                header('Location: ./index.php?controllers=commandes');
                exit;
            }
        }
             
    }    
    //Modifie la date créer avec l'interval de temps de préparation estimé et lui attribut un format Heure : minutes
    $datetime = $getDate->modify($getMinutes)->format(' H:i');
    $delaitime = $getDate->modify($getMinutes)->format(' Y-m-d H:i:s');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    }
    require 'Views/Commande/Confirmation.php';

    
?>