<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'us-cdbr-east-02.cleardb.com:3306');
define('DB_USERNAME', 'b5cab6ba381e22');
define('DB_PASSWORD', '032f36fc');
define('DB_NAME', 'heroku_9cfa0e39f4cc915'); 

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

class Connect extends PDO {
    public function __construct() {
        parent::__construct("mysql:host=us-cdbr-east-02.cleardb.com:3306;dbname=heroku_9cfa0e39f4cc915", "b5cab6ba381e22", "032f36fc"
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
    }
}


?>