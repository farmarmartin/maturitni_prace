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
    $identifier = random_int(10000000, 99999999);
    $id = '|'.$identifier.'|';
    $keys = (new Keys)->getKeys();

    $SQL = "INSERT INTO user_details (id, full_name, public_key) VALUES ($identifier, '$user','$keys->public_key');";
    //mysqli_query($connect, $SQL);


    if (mysqli_connect_errno()) {
        echo "Connect failed";
        exit();
    }
    
    if (!mysqli_query($connect, $SQL)) {
        printf("Errorcode: %d\n", mysqli_errno($connect));
        header('Location: ' . '../authorization/register.html');
    }

    mysqli_close($connect);


    echo "<textarea rows='29' cols='60'>".$id.$keys->private_key."</textarea>";
    ?>

    <a href="../signature/index.html">sign</a>
</body>
</html>