<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign a text</title>
</head>
<body>
    <header>
        <p>Zde můžete digitálně podepsat text</p>
    </header>

    <div class="sigbox">
        <h3>Lets sign some text!</h3>
        <form method="POST">
            <textarea class="to_sign" id="to_sign" name="to_sign" rows="4" cols="30" placeholder="text you want to sign" required></textarea>
            <br>
            <textarea class="encryption_resources" id="encryption_resources" name="encryption_resources" rows="6" cols="15" placeholder="insert your private key" required></textarea>
            <input class="sub" type="submit" name="submit" value="sign">
        </form>
    </div>

    <div class="output" id="output">
        <h3>Podepsaný text</h3>
        <?php
        if(isset($_POST['submit'])){
            require 'sign.php';
            echo "<link rel='stylesheet' href='css/output.css'>";
        }
        ?>
    </div>

    <footer>
        <p>Digital signature student project </p>
        <p>&#169 Martin Job</p>
    </footer>
    

</body>
</html>