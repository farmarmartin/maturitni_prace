<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign a text</title>
</head>
<body>
    <form action="sign.php" method="POST">
        <textarea id="to_sign" name="to_sign" rows="4" cols="30" placeholder="text you want to sign"></textarea>
        <br>
        <textarea id="private_key" name="private_key" rows="6" cols="15" placeholder="insert your private key"></textarea>
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    require '../keys/key_pair.php';

    echo "<textarea rows='28' cols='60'>".$private_key."</textarea>";
    ?>

</body>
</html>