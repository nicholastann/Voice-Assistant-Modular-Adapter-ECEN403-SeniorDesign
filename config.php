<?php

class Connect extends PDO {
    public function __construct() {
        parent::__construct("mysql:host=us-cdbr-east-02.cleardb.com:3306;dbname=heroku_9cfa0e39f4cc915", "b5cab6ba381e22", "032f36fc"
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
    }
}


?>