<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration/css/index.css">

    <title>REGISTER</title>
</head>
<body>
    <header>
    <div class="nav" id="nav">
            <div class="link"><a href="?operation=register">Registrace</a></div>
            <div class="link"><a href="?operation=sign">Podepsat</a></div>
            <div class="link"><a href="?operation=verify">Ověřit</a></div>
            <div class="link"><a href="?operation=help">Návod</a></div>
        </div>
        <div class="menubtn" id="menubtn">
            <div class="stick"></div>
            <div class="stick"></div>
            <div class="stick"></div>
        </div>
    </header>


    <main>
        <div class="regbox" id="regbox">
            <h3 class="reg">Registrace</h3>
            <form action="?operation=register_key" method="POST" id="form">
                <input class="name" id="name"  type="text" name="name" placeholder="Full name" required>
                <br>
                <input id="sub" class="sub" type="submit" name="submit" value="submit">
            </form>
        </div>      
    </main>


    <footer>
        <p>Digital signature student project </p>
        <p>&#169 Martin Job</p>
    </footer>
</body>
</html>