<?php
    require('Models/SupplementModel.php');
class SupplementController {
    public function supplementsalty(){

        $supplementModel = new SupplementModel(); 
        $supplementData = $supplementModel->supplementsalty();
        include('Views/Menu/Supplement.php');
    }
    public function supplementsweet(){

        $supplementModel = new SupplementModel(); 
        $supplementData = $supplementModel->supplementsweet();
        include('Views/Menu/Supplement.php');
    }
}
