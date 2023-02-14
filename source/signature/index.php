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
        <div class="nav">
            <a href="../authorization/index.php">Registrace</a>
            <a href="../signature/index.php">Podepsat</a>
            <a href="../verification/index.php">Ověřit</a>
            <a href="">Návod</a>
        </div> 
    </header>
    <main>
        <div class="sigbox">
            <h3>Lets sign some text!</h3>
            <form method="POST">
                <textarea class="to_sign" id="to_sign" name="to_sign" rows="4" cols="30" placeholder="text you want to sign" required></textarea>
                <br>
                <textarea class="encryption_resources" id="encryption_resources" name="encryption_resources" rows="6" cols="15" placeholder="insert your private key" required></textarea>
                <input id="sub" class="sub" type="submit" name="submit" value="sign">
            </form>
        </div>

        <div class="output" id="output">
            <p>Podepsaný text</p>
            <?php
                if(isset($_POST['submit'])){
                    require 'sign.php';
                    echo "<link rel='stylesheet' href='css/output.css'>";
                }
            ?>
            <button id="copy_button" class="copy_button">Zkopírovat</button>
        </div>
    </main>
    <footer>
        <p>Digital signature student project </p>
        <p>&#169 Martin Job</p>
    </footer>
    
    <script>
        var button = document.getElementById('copy_button')
        var content = document.getElementById('out_text')

        button.addEventListener("click", function(){
            content.select()
            content.setSelectionRange(0, 99999)

            navigator.clipboard.writeText(content.value)
        })

        var submitform = document.getElementById("sub")

        submitform.addEventListener("click", function(){
            document.getElementById("copy_button").style.visibility = "visible"
        })

    </script>
</body>
</html>