<?php

class Salle {

    //db param
    private $conn;

    //salle properties
    public $id;
    public $salle_name;
    public $salle_adress;
    public $salle_active;
    public $client_name;
    public $branch_id;
    public $branch_name;
    public $zones_id;
    public $zone_name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read(){
        $sql = "SELECT * FROM salle
        INNER JOIN client ON salle.id = client.id
        INNER JOIN branch on salle.id = branch_id
        INNER JOIN zones ON salle.id = zones_id
        
        ";

        $stmt = $this->conn->prepare($sql);

        //execute sql
        $stmt->execute();

        return $stmt;
    }
}