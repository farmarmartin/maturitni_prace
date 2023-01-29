<?php
require '../dat/dbh.php';
require '../keys/key_pair.php';

$user = $_POST['name'];

$insert = "INSERT INTO user_details (full_name, public_key) VALUES ('$user', '$public_key');";
mysqli_query($connect, $insert);

header('Location: ' . '../signature/index.php');