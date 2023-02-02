<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>private&public keys</title>
</head>
<body>

    <?php

    require '../dat/dbh.php';
    require '../keys/key_pair.php';

    $user = $_POST['name'];
    $keys = (new Keys)->getKeys();

    $SQL = "INSERT INTO user_details (full_name, public_key) VALUES ('$user', '$keys->public_key');";
    mysqli_query($connect, $SQL);
    
    if (!$connect){
        echo "could not connect to database";
    }
    mysqli_close($connect);
    

    echo "<textarea rows='29' cols='60'>".$keys->private_key."</textarea>";
    echo "<br><textarea rows='10' cols='60'>".$keys->public_key."</textarea>";
    ?>

    <a href="../signature/index.html">sign</a>
</body>
</html>