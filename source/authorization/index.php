<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">

    <title>REGISTER</title>
</head>
<body>
    <header>
        <p>Registrujte se pouze pokud jste tak ještě neučinili.</p>
    </header>

    <main>
        
        <div class="regbox" id="regbox">
            <h3 class="reg">Register</h3>
            <form action="keys.php" method="POST" id="form">
                <input class="name" id="name"  type="text" name="name" placeholder="Full name" required>
                <br>
                <input id="sub" class="sub" type="submit" name="submit" value="submit">
            </form>
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