<?php 
  class Database {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'server_dbsport';
    private $username = 'root';
    private $password = '';
    private $conn;

    // DB Connect
    public function getConnection() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password,
      [
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_STRINGIFY_FETCHES=>false
    ]);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }