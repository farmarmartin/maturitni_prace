<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration/css/index.css">
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
        <h2>Registrace</h2>
        <div class="regbox" id="regbox">
            <form action="?operation=register_key" method="POST" id="form">
                <label for="name">celé jméno</label>
                <input class="name" id="name"  type="text" name="name" placeholder="celé jméno" required>
                <br>
                <input id="sub" class="sub" type="submit" name="submit" value="registrovat">
            </form>
        </div>
    </main>

    <footer>
        <p>Digital signature student project </p>
        <p>&#169 Martin Job</p>
    </footer>
</body>
</html>