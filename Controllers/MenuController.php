<?php
    class MenuController {
        public function menu() {
            require('Models/MenuModel.php');
                    $menu = new Menu();
                    $menu ->menu();
            include('Views/Menu/Menu.php');
            
        }
    }