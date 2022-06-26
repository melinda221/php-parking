<?php

class connection {
    public $conn;

    function __construct() {
        require_once('database.php');
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysqli_select_db($this->conn, DB_DATABASE);

        if(!$this->conn)// testing the connection  
        {  
            die ("Cannot connect to the database");  
        }   
        
        return $this->conn;  
    }  

    public function Close(){  
        mysql_close();  
    } 
}