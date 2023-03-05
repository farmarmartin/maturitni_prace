<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration/css/keys.css">
    <title>Registrace</title>
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
        <?php
            ini_set('display_errors', 0);

            if(!isset($_POST['name'])){
                echo "<p>Slouží pouze k registraci</p>";
                echo "<a href='?operation=register' style='color: white;'>Registrujte se zde</a>";
                echo "<style>button{display:none;}</style>";
            }else{

            require '../dat/dbh.php';   //import scriptů
            require '../keys/key_pair.php';

            $user = $_POST['name']; // uložení dat z formuláře do proměnné
            $identifier = random_int(10000000, 99999999); //generování random id
            $id = '|'.$identifier.'|'; // připravení id pro použití ve výstupu
            $keys = (new Keys)->getKeys(); //vygenerování páru klíčů
            if($keys == false){
                echo "Špatná cesta k OpenSSL";
                echo "<style>button{display:none;}</style>";
            }else{
                $SQL = "INSERT INTO user_details (id, full_name, public_key) VALUES ($identifier, '$user','$keys->public_key');"; // sql dotaz pro zaznamenání dat do DB
                $db->query($SQL); //odeslání dotazu do DB
                $db->close(); //uzavření spojení s DB

                echo "<textarea id='key' class='key' rows='10' cols='60' readonly>".$id.$keys->private_key."</textarea>"; //generování výstupu, ve kterém bude zobrazen string obsahující id a privátní klíč

                file_put_contents('private_key.txt', $id.$keys->private_key); //uložení id a klíče do souboru pro stažení
            }
        }
            

            
        ?>
        <div class="buttons">
            <button id="copy" class="copy">Zkopírovat</button>
            <button><a href="private_key.txt" download="private_key.txt" class="download" id="download"><i class="fa fa-download"></i> Stáhnout</a></button>
        </div>
        
    </main>

    <footer>
        <p>Digital signature student project </p>
        <p>&#169 Martin Job</p>
    </footer>

    <script>
        var copy = document.getElementById('copy')
        var download = document.getElementById('download')
        var content = document.getElementById('key')

        //odposlouchávač kliknutí na kopírovací tlačítko, který spustí funkci
        copy.addEventListener("click", function(){
            content.select()    //vybrání obsahu
            content.setSelectionRange(0, 99999)
            navigator.clipboard.writeText(content.value) //uložení do schránky
        })

        //odposlouchávač kliknutí na stahovací tlačítko, který spustí funkci 
        download.addEventListener("click", function(){
            window.location.replace("?operation=sign") //přesměrování na podepisovací stránku
        })

    </script>

</body>
</html>



