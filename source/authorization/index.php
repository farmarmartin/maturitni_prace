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
        <div class="nav">
            <a href="../authorization/index.php">Registrace</a>
            <a href="../signature/index.php">Podepsat</a>
            <a href="../verification/index.php">Ověřit</a>
            <a href="">Návod</a>
        </div> 
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
        <p>Digital signature student project </p>
        <p>&#169 Martin Job</p>
    </footer>
</body>
</html>