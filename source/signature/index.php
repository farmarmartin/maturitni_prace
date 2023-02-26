<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>podpis</title>
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
        <div class="sigbox">
            <h3>Pojďme podepsat nějaký text!</h3>
            <form method="POST">
                <textarea class="to_sign" id="to_sign" name="to_sign" rows="4" cols="30" placeholder="text you want to sign" required></textarea>
                <br>
                <textarea class="encryption_resources" id="encryption_resources" name="encryption_resources" rows="6" cols="15" placeholder="insert your private key"></textarea>
                
                <input id="sub" class="sub" type="submit" name="submit" value="sign">
            </form>
        </div>

        <div class="output" id="output">  
            <?php
                if(isset($_POST['submit'])){
                    require 'sign.php';
                    echo "<link rel='stylesheet' href='../signature/css/output.css'>";
                }
            ?>
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


        var upload = document.getElementById('privkey_file').value
        console.log(upload)

    </script>
</body>
</html>