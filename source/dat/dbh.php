<?php
//uložení přihlašovacích údajů k DB do proměnných
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "digital_signature";

//připojení do DB
$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
?>