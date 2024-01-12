<?php

class Dbconfig{

    private $hostname = "localhost";
    private $db = "modalcrud" ;
    private $username = "root";
    private $password = "";

    protected $conn;

    public function __construct(){
       $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->db);
       return $this->conn;
    }

}



?>