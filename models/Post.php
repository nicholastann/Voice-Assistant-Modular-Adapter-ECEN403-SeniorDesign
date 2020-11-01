<?php
class Post {
    //DB stuff
    private $conn;
    private $table = "posts";

    //post prop
    public $appliance_id;
    public $status;
    public $edited_at;

    //const w/ DB
    public function __construct() {
        $this->conn = $db;
    }

    //GET POSTS
    public function read() {
        //creaet query
        $query = "SELECT c.appliance_id as appliance_id, p.status, p.edited_at FROM ' . $this->table . ' p "

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();
        return $stmt;
    }
}