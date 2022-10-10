<?php

class Client {
    //db param
    private $conn;
    private $table = 'client';

    //client properties
    public $id;
    public $client_name;
    public $client_adress;
    public $client_active;
    public $client_phone;
    public $client_email;
    public $client_dpo;
    public $client_tech;
    public $client_com;
    public $client_url;
    public $client_logo;
    public $client_historic;
    public $client_prez;

    //constructor db

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $sql = "SELECT *
        FROM client";

        $stmt =$this->conn->prepare($sql);
        

        //execute sql
        $stmt->execute();

        return $stmt;

        }

        public function read_single(){
            $sql = 'SELECT * FROM client WHERE client.id = ? LIMIT 0,1';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->id);

             //execute query
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row !== false) {
                $row['client_active'] = (bool) $row['client_active'];
            }

            //set properties
            $this->client_name = $row['client_name'];
            $this->client_adress = $row['client_adress'];
            $this->client_active = $row['client_active'];
            $this->client_phone = $row['client_phone'];
            $this->client_email = $row['client_email'];
            $this->client_dpo = $row['client_dpo'];
            $this->client_tech = $row['client_tech'];
            $this->client_com = $row['client_com'];
            $this->client_url = $row['client_url'];
            $this->client_logo = $row['client_logo'];
            $this->client_historic = $row['client_historic'];
            $this->client_prez = $row['client_prez'];
        }

        public function create(){
            $sql = 'INSERT INTO client 
            SET
            client_name = :client_name,
            client_adress = :client_adress,
            client_active  = :client_active,
            client_phone = :client_phone,
            client_email = :client_email,
            client_dpo = :client_dpo,
            client_tech = :client_tech,
            client_com = :client_com,
            client_url = :client_url,
            client_logo = :client_logo,
            client_historic = :client_historic,
            client_prez = :client_prez            
            ';

            $stmt = $this->conn->prepare($sql);

            //clean data
            $this->client_name = htmlspecialchars(strip_tags($this->client_name));
            $this->client_adress = htmlspecialchars(strip_tags($this->client_adress));
            $this->client_active = htmlspecialchars(strip_tags($this->client_active));
            $this->client_phone = htmlspecialchars(strip_tags($this->client_phone));
            $this->client_email = htmlspecialchars(strip_tags($this->client_email));
            $this->client_dpo = htmlspecialchars(strip_tags($this->client_dpo));
            $this->client_tech = htmlspecialchars(strip_tags($this->client_tech));
            $this->client_com = htmlspecialchars(strip_tags($this->client_com));
            $this->client_url = htmlspecialchars(strip_tags($this->client_url));
            $this->client_logo = htmlspecialchars(strip_tags($this->client_logo));
            $this->client_historic = htmlspecialchars(strip_tags($this->client_historic));
            $this->client_prez = htmlspecialchars(strip_tags($this->client_prez));

            //bind data
            $stmt->bindParam(':client_name', $this->client_name);
            $stmt->bindParam(':client_adress', $this->client_adress);
            $stmt->bindParam(':client_active', $this->client_active);
            $stmt->bindParam(':client_phone', $this->client_phone);
            $stmt->bindParam(':client_email', $this->client_email);
            $stmt->bindParam(':client_dpo', $this->client_dpo);
            $stmt->bindParam(':client_tech', $this->client_tech);
            $stmt->bindParam(':client_com', $this->client_com);
            $stmt->bindParam(':client_url', $this->client_url);
            $stmt->bindParam(':client_logo', $this->client_logo);
            $stmt->bindParam(':client_historic', $this->client_historic);
            $stmt->bindParam(':client_prez', $this->client_prez);

            //execute sql
            if($stmt->execute()){
                return true;
            }

            //print error if error
            printf("Erreur: %.\n", $stmt->error);

            return false;
        }

        public function update(){
            $sql = 'UPDATE client 
            SET
            client_name = :client_name,
            client_adress = :client_adress,
            client_active  = :client_active,
            client_phone = :client_phone,
            client_email = :client_email,
            client_dpo = :client_dpo,
            client_tech = :client_tech,
            client_com = :client_com,
            client_url = :client_url,
            client_logo = :client_logo,
            client_historic = :client_historic,
            client_prez = :client_prez                
            WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            //clean data
            $this->client_name = htmlspecialchars(strip_tags($this->client_name));
            $this->client_adress = htmlspecialchars(strip_tags($this->client_adress));
            $this->client_active = htmlspecialchars(strip_tags($this->client_active));
            $this->client_phone = htmlspecialchars(strip_tags($this->client_phone));
            $this->client_email = htmlspecialchars(strip_tags($this->client_email));
            $this->client_dpo = htmlspecialchars(strip_tags($this->client_dpo));
            $this->client_tech = htmlspecialchars(strip_tags($this->client_tech));
            $this->client_com = htmlspecialchars(strip_tags($this->client_com));
            $this->client_url = htmlspecialchars(strip_tags($this->client_url));
            $this->client_logo = htmlspecialchars(strip_tags($this->client_logo));
            $this->client_historic = htmlspecialchars(strip_tags($this->client_historic));
            $this->client_prez = htmlspecialchars(strip_tags($this->client_prez));
            $this->id = htmlspecialchars(strip_tags($this->id));

            //bind data
            $stmt->bindParam(':client_name', $this->client_name);
            $stmt->bindParam(':client_adress', $this->client_adress);
            $stmt->bindParam(':client_active', $this->client_active);
            $stmt->bindParam(':client_phone', $this->client_phone);
            $stmt->bindParam(':client_email', $this->client_email);
            $stmt->bindParam(':client_dpo', $this->client_dpo);
            $stmt->bindParam(':client_tech', $this->client_tech);
            $stmt->bindParam(':client_com', $this->client_com);
            $stmt->bindParam(':client_url', $this->client_url);
            $stmt->bindParam(':client_logo', $this->client_logo);
            $stmt->bindParam(':client_historic', $this->client_historic);
            $stmt->bindParam(':client_prez', $this->client_prez);
            $stmt->bindParam(':id', $this->id);

            if($stmt->execute()){
                return true;
            }

            //print error
            printf("Erreur: %.\n", $stmt->error); 

            return false;
        }

        public function delete(){
            $sql = 'DELETE  FROM client WHERE client.id = :id';

            //prepare stmt
            $stmt = $this->conn->prepare($sql);

            //clean data
            $this->id = htmlspecialchars(strip_tags($this->id));

            //bind data
            $stmt->bindPAram(':id', $this->id);

            //execute sql
            if($stmt->execute()){
                return true;
            }

             //print error
             printf("Erreur: %.\n", $stmt->error); 

             return false;
        }

}