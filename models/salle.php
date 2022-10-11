<?php

class Salle {

    //db param
    private $conn;

    //salle properties
    public $id;
    public $salle_name;
    public $salle_address;
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

    public function read_single(){
        $sql ="SELECT * FROM salle
        INNER JOIN client ON salle.id = client.id
        INNER JOIN branch on salle.id = branch_id
        INNER JOIN zones ON salle.id = zones_id
        WHERE salle.id = ? LIMIT 0,1
        ";

        $stmt = $this->conn->prepare($sql);

        //bind id
        $stmt->bindParam(1, $this->id);

        //execute
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row !== false) {
            $row['salle_active'] = (bool) $row['salle_active'];
        }

        //set porperties
        $this->salle_id = $row['id'];
        $this->salle_name = $row['salle_name'];
        $this->salle_address= $row['salle_address'];
        $this->salle_active = $row['salle_active'];
        $this->client_name = $row['client_name'];
        $this->client_dpo = $row['client_dpo'];
        $this->client_tech = $row['client_tech'];
        $this->branch_id = $row['branch_id'];
        $this->branch_name = $row['branch_name'];
        $this->zone_id= $row['zones_id'];
        $this->zone_name= $row['zone_name'];
        
    }

    public function create(){
        $sql = "INSERT INTO salle
        SET
        salle_name = :salle_name,
        salle_address = :salle_address,
        ";

        $stmt = $this->conn->prepare($sql);

        //clean data
        $this->salle_name = htmlspecialchars(strip_tags($this->salle_name));
        $this->salle_address = htmlspecialchars(strip_tags($this->salle_address));


        //bind data
        $stmt->bindParam(':salle_name', $this->salle_name);
        $stmt->bindParam(':salle_address', $this->salle_address);

        //execute
        if($stmt->execute()){
            return true;
        }

        printf("Erreur: %.\n", $stmt->error);

        return false;
    }
}