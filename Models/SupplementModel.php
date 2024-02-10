<?php
class SupplementModel {
    public function supplementsalty(){
        global $pdo;
        $sql = "SELECT * FROM  `supplements` WHERE Supplement_type = 1 order by Supplement_id  ";
        $statement = $pdo->query($sql);
        $supplementData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $supplementData;
    }
    public function supplementsweet(){
        global $pdo;
        $sql = "SELECT * FROM  `supplements` WHERE Supplement_type = 2 order by Supplement_id  ";
        $statement = $pdo->query($sql);
        $supplementData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $supplementData;
    }
}

