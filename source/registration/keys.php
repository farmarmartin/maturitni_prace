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
        <div class="nav">
            <a href="../authorization/index.php">Registrace</a>
            <a href="../signature/index.php">Podepsat</a>
            <a href="../verification/index.php">Ověřit</a>
            <a href="">Návod</a>
        </div> 
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

            echo "<textarea id='key' class='key' rows='10' cols='60' readonly>".$id.$keys->private_key."</textarea>";

            file_put_contents('private_key.txt', $id.$keys->private_key);
        ?>
        <button id="copy" class="copy">Zkopírovat</button>
        <button><a href="private_key.txt" download="private_key.txt" class="download" id="download"><i class="fa fa-download"></i> Stáhnout</a></button>
    </main>

    <footer>
        <p>Digital signature student project </p>
        <p>&#169 Martin Job</p>
    </footer>

    <script>
        var copy = document.getElementById('copy')
        var download = document.getElementById('download')
        var content = document.getElementById('key')

        copy.addEventListener("click", function(){
            content.select()
            content.setSelectionRange(0, 99999)

            navigator.clipboard.writeText(content.value)
        })

        download.addEventListener("click", function(){
            window.location.replace("../signature/")
        })

    </script>

</body>
</html>



