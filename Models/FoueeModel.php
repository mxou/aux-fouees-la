<?php
class Fouee {
    public function fouee(){
        global $pdo;
        $sql = "SELECT * FROM  `fouees` order by Fouee_id ASC";
        $statement = $pdo->query($sql);
        $foueeData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $foueeData;
        var_dump($foueeData);
        
    }
}
