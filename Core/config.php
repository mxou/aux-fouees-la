<?php 
define('DB_SERVER', '');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_NAME', '');
try{
    $pdo= new PDO("mysql:host=".DB_SERVER.";
    dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // echo "Connexion réussie à la BDD";

    }
catch(PDOException $e){
    echo "Erreur de connexion : " , $e->getMessage();
}
    ?>