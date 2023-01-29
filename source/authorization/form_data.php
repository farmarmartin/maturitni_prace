<?php
include '../dat/dbh.php';
include '../keys/key_pair.php';

$user = $_POST['name'];
echo $public_key;

$insert = "INSERT INTO user_details (full_name, public_key) VALUES ('$user', '$key');";
mysqli_query($connect, $insert);

header('Location: ' . '../signature/index.php');