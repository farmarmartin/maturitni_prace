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
        <div role="navigace" class="nav" id="nav">
            <div class="link" onclick="window.location.href = '?operation=register'">Registrace</div>
            <div class="link" onclick="window.location.href = '?operation=sign'">Podepsat</div>
            <div class="link" onclick="window.location.href = '?operation=verify'">Ověřit</div>
            <div class="link" onclick="window.location.href = '?operation=help'">Návod</div>
        </div>
        <div role="menu" class="menubtn" id="menubtn">
            <div class="stick"></div>
            <div class="stick"></div>
            <div class="stick"></div>
        </div>
    </header>

    <main>
        <h2>Ověření pravosti</h2>
        <div class="verifybox" id="verifybox">
            <form method="POST" id="form">
                <label for="signed_text">text k prověření</label>
                <textarea class="signed_text" id="signed_text" name="signed_text" rows="15" cols="60" placeholder="podepsaný text" required></textarea>
                <br>
                <input class="sub" type="submit" value="zkontrolovat" name="submit">
            </form>
        </div>
        <div class="output">
            <?php
            ini_set('display_errors', 0);
            
            if(isset($_POST['submit'])){
                require('verification.php'); //import scriptu pro ověření podpisu
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