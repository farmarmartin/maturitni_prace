<?php
/*
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "digital_signature";

$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
*/

class mysqli{
    public $dbServername, $dbUsername, $dbPassword, $dbName;
    public function __construct($dbServername, $dbUsername, $dbPassword, $dbName){
        $this->dbServername = $dbServername;
        $this->dbUsername = $dbUsername;
        $this->dbPassword = $dbPassword;
        $this->dbName = $dbName;
        
    }

    public function sendQuery(string $sqlquery){
        mysqli_query(mysqli_connect($this->dbServername, $this->dbUsername, $this->dbPassword, $this->dbName), $sqlquery);
        return $this;
    }
}