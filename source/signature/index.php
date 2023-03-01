<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/copybutton.js"></script>
    <title>podpis</title>
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
        <h2>Podepisování</h2>
        <div class="sigbox">
            <form method="POST">
                <label for="to_sign">váš text</label>
                <textarea class="to_sign" id="to_sign" name="to_sign" rows="4" cols="30" placeholder="vložte text" required></textarea>
                <br>
                <label for="encryption_resources">váš privátní klíč</label>
                <textarea class="encryption_resources" id="encryption_resources" name="encryption_resources" rows="6" cols="15" minlength="1700" placeholder="vložte privátní klíč"></textarea>
                
                <input id="sub" class="sub" type="submit" name="submit" value="sign">
            </form>
        </div>

        <div class="output" id="output">  
            <?php
                ini_set('display_errors', 0);

                if(isset($_POST['submit'])){
                    require 'sign.php'; //import scriptu pro podpis
                    echo "<link rel='stylesheet' href='../signature/css/output.css'>"; //generování linku stylu pro generovaný výstup
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

        //odposlouchávač kliknutí na kopírovací tlačítko, který spustí funkci
        button.addEventListener("click", function(){
            content.select() //výběr obsahu
            content.setSelectionRange(0, 99999)
            navigator.clipboard.writeText(content.value) //uložení do schránky
        })
    </script>

</body>
</html>