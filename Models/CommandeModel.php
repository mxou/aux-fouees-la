<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
Class Commande {
        public function getNumberOfOrders(){
            global $pdo;

            $sql = "SELECT * FROM `commandes` WHERE Commande_termine = 0";
            $statement = $pdo->prepare($sql);
            $statement -> execute();

            $numberOfOrders = $statement->rowCount();
            $statement -> closeCursor();

            return $numberOfOrders;
        }

        public function getTimeEstimation(){
            
            $numberOfOrders = $this->getNumberOfOrders();

            $waitingTime = ceil($numberOfOrders / 8) *10 + 10;
            return $waitingTime;
        }

        public function createOrder($CommandePrix, $CommandeContenu){
            global $pdo;
            
            $sql = "INSERT INTO commandes (Commande_prix, Commande_contenu, Commande_delai, Commande_UtilisateurId) Values (:comPrix, :comContent, :comDelai, :comUserId)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':comPrix', $CommandePrix);
            $statement->bindValue(':comContent', $CommandeContenu);
            $statement->bindValue(':comDelai', $Delaitime);
            $statement->bindValue(':comUserId', $_SESSION['Utilisateur_id']);
            $statement -> execute();
            $statement -> closeCursor();
        }

        public function deleteOrder($Order_id){
            global $pdo;

            $sql = "DELETE FROM commandes where Commande_id = :Commande_id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':Commande_id', $Order_id);
            $statement -> execute();
            $statement -> closeCursor();
        }

        public function updateOrder($Order_id){
            global $pdo;
            $sql = "UPDATE `commandes` SET Commande_recup = 1 WHERE Commande_id = :Commande_id AND Commande_termine = 1";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':Commande_id', $Order_id);
            $statement->execute();
            $statement->closeCursor();
        }
        

        public function updateOrderStatus($Order_id){
            global $pdo;
            $sql = "UPDATE `commandes` SET Commande_termine = 1 WHERE Commande_id = :Commande_id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':Commande_id', $Order_id);
            $statement->execute();
            $statement->closeCursor();
        }
        
        public function showAllOder(){
            global $pdo;
            $sql = "SELECT * FROM  `commandes` where Commande_recup = 0 order by Commande_id ASC ";
            $statement = $pdo->query($sql);
            $commandeData = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $commandeData;

        
    }
    public function addPoints($Utilisateur_id) {
        global $pdo;
        $sql = "UPDATE `utilisateurs` SET Utilisateur_points = Utilisateur_points + 1 WHERE Utilisateur_id = :Utilisateur_id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':Utilisateur_id', $Utilisateur_id);
        $statement->execute();
        $statement->closeCursor();
    }
    public function utiliserPoints($Utilisateur_id) {
        global $pdo;
        
        // Vérifier si l'utilisateur a suffisamment de points
        $sql = "SELECT Utilisateur_points FROM utilisateurs WHERE Utilisateur_id = :Utilisateur_id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':Utilisateur_id', $Utilisateur_id);
        $statement->execute();
        $utilisateurPoints = $statement->fetchColumn();
        $statement->closeCursor();
    

        if ($utilisateurPoints >= 30) {

            // Retirer les points de l'utilisateur
            $sql = "UPDATE utilisateurs SET Utilisateur_points = Utilisateur_points - 30 WHERE Utilisateur_id = :Utilisateur_id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(':Utilisateur_id', $Utilisateur_id);
            $statement->execute();
            $statement->closeCursor();
            $_SESSION['utiliser_points'] = true;
            $_SESSION['Utilisateur_points']=$_SESSION['Utilisateur_points']-30;
            
            return true; // Utilisation des points réussie
        } else {
            return false; // Pas assez de points
        }
    }
    
    function generatePDF($outputPath, $invoiceItems, $dateRetrait) {
        require('vendor/fpdf186/fpdf.php');
 
        // Création de l'instance FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
    
        // Contenu de la facture
     
    
        // En-tête de page
        // $pdf->Image( $_SERVER['DOCUMENT_ROOT'] . '/assets/img/lelogo.png', 170, 8, 33);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Facture', 0, 1, 'C');
        $pdf->Cell(0, 10, '----------------------------------', 0, 1, 'C');
    
        // Informations du client
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 10, 'Adresse  : Parking en zone commerciale (Grand' . utf8_decode('Angoulême') . '), Nouvelle Zone des montagnes au nord ' . utf8_decode("d'Angoulême"), 0, 1);
        $pdf->Cell(0, 10, 'Heure de retrait : ' . $dateRetrait, 0, 1);
        $pdf->Cell(0, 10, '----------------------------------', 0, 1);
    
        // Contenu détaillé
        foreach ($invoiceItems as $produit) {
            if (isset($_SESSION['utiliser_points']) && $_SESSION['utiliser_points'] === true) {
                $produit['Fouee_prix'] = $produit['Fouee_prix'] / 2;
            }
            if (!empty($produit['choix_supplement'])) {

                $pdf->Cell(0, 10, utf8_decode($produit['Fouee_nom']) . ' - ' . $produit['Fouee_prix'] . ' euros' . ' - ' . implode(' euros , ', $produit['choix_supplement']) . ' euros', 0, 1);
                $lastCharacterArray = array_map(function ($supplement) {
                    return substr($supplement, -1);
                }, $produit['choix_supplement']);
                
                $total += $produit['Fouee_prix'] + array_sum($lastCharacterArray);
            }
            else {
                $total += $produit['Fouee_prix'];
                $pdf->Cell(0, 10, utf8_decode($produit['Fouee_nom']) . ' - ' . $produit['Fouee_prix'] . ' euros', 0, 1);
            }
            
        }
        $pdf->Cell(0, 10, '----------------------------------', 0, 1);
    
        // Calcul du total

        $pdf->Cell(0, 10, 'Total : ' . $total . ' euros', 0, 1);
        $pdf->Cell(0, 10, '----------------------------------', 0, 1);
    
        // Output du PDF vers le fichier spécifié
        $pdf->Output('F', $outputPath);
    }
    
    public function sendMail($Utilisateur_mail){       

$mail = new PHPMailer(true);

try {
    // Paramètres SMTP
    $mail->isSMTP();
    $mail->Host       = ''; 
    $mail->SMTPAuth   = true;
    $mail->Username   = '';  
    $mail->Password   = '';  
    $mail->SMTPSecure = 'tls';  
    $mail->Port       = 587;  

    // Contenu du mail
    $mail->setFrom('maximilien.delorme@etu-univ-poitiers.fr', 'Auxfoueesla');
    $mail->addAddress($Utilisateur_mail, '');
    $mail->Subject = 'Votre facture';
    $mail->Body    = 'Merci, d/avoir commandé chez nous, voici  en pièce-jointe.';
    $mail->addAttachment($_SERVER['DOCUMENT_ROOT'] . '/Facture.pdf', 'Facture.pdf');

    // Envoi du mail
    $mail->send();
    echo 'Le mail a été envoyé avec succès.';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi du mail : {$mail->ErrorInfo}";
}


    }
    }
?>
