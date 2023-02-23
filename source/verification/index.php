<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>REGISTER</title>
</head>
<body>
    <header>
        <div class="nav">
            <a href="?operation=register">Registrace</a>
            <a href="?operation=sign">Podepsat</a>
            <a href="?operation=verify">Ověřit</a>
            <a href="?operation=help">Návod</a>
        </div>
    </header>

    <main>
        <div class="verifybox" id="verifybox">
            <h3 class="reg">Ověření pravosti</h3>
            <form method="POST" id="form">
                <textarea class="signed_text" id="signed_text" name="signed_text" rows="15" cols="60" placeholder="podepsaný text" required></textarea>
                <br>
                <input class="sub" type="submit" value="zkontrolovat" name="submit">
            </form>
        </div>
        <div class="output">
            <?php
            if(isset($_POST['submit'])){
                require('verification.php');
            }
            ?>
        </div>   
    </main>
    


    <footer>
        <div class="footerbox">
            <p>Digital signature student project </p>
            <p>&#169 Martin Job</p>
        </div>
    </footer>
</body>
</html>