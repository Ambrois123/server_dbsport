<?php

class Client {
    //db param
    private $conn;
    private $table = 'client';

    //client properties
    public $client_id;
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

        //execute query
        $stmt->execute();

        return $stmt;

        }

        
}

//  //prepare stmt
//  $stmt = $this->conn->prepare($query);

//  //bind id
//  $stmt->bindParam(1, $this->id);

//  //execute query
//  $stmt->execute();

//  //set properties
//  $this->$client_id = $row['client_id '];
//  $this->$client_name = $row['client_name'];
//  $this->$client_adress = $row['client_adress'];
//  $this->$client_active = $row['client_active'];
//  $this->$client_phone = $row['client_phone'];
//  $this->$client_email = $row['client_email'];
//  $this->$client_dpo = $row['client_dpo'];
//  $this->$client_tech = $row['client_tech'];
//  $this->$client_com = $row['client_com'];
//  $this->$client_url = $row['client_url'];
//  $this->$client_logo = $row['client_logo'];
//  $this->$client_historic = $row['client_historic'];
//  $this->$client_prez = $row['$client_prez'];