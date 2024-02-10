<?php
class FoueeController {
    public function fouee() {
        require('Models/FoueeModel.php');
        
        // Créer une instance de Fouee
        $foueeModel = new Fouee();

        // Appeler la méthode fouee pour récupérer les données
        $foueeData = $foueeModel->fouee();

        // Inclure la vue avec les données
        include('Views/Menu/Fouee.php');
    }
}
?>
