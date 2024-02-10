<?php
    class ContactController {
        public function contact() {
            require('Models/ContactModel.php');
                    $contact = new Contact();
                    $contact ->contact();
            include('Views/Contact.php');
            
        }
    }

