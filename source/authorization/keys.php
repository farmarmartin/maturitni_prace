<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/keys.css">
    <title>Document</title>
</head>
<body>
    <header>
        <p>header</p>
    </header>

    <main>
        <?php
            require '../dat/dbh.php';
            require '../keys/key_pair.php';

            $user = $_POST['name'];
            $identifier = random_int(10000000, 99999999);
            $id = '|'.$identifier.'|';
            $keys = (new Keys)->getKeys();

            $SQL = "INSERT INTO user_details (id, full_name, public_key) VALUES ($identifier, '$user','$keys->public_key');";
            mysqli_query($connect, $SQL);
            mysqli_close($connect);

            echo "<textarea class='key' rows='10' cols='60' readonly>".$id.$keys->private_key."</textarea>";
        ?>
    </main>

    <footer>
        <div class="footerbox">
            <p>Digital signature student project </p>
            <p>&#169 Martin Job</p>
        </div>
        
    </footer>


    
</body>
</html>



