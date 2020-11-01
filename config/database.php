<?php

class Database {
    //db params
    private $host = "us-cdbr-east-02.cleardb.com:3306";
    private $db_name = "heroku_9cfa0e39f4cc915";
    private $username = "b5cab6ba381e22";
    private $password = "032f36fc";
    private $conn;

    //DB connect
    public function connect() {
        $this-> conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname= " . $this->db_name,
            $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " .$e->getMessage();
        }
        return $this->conn;
    }
}
?>