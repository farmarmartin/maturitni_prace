<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="style.css">
    <title>digitální podpis</title>
</head>
<body>
   <?php
   require '../registration/clearFile.php';
   $url = $_SERVER["REQUEST_URI"]; //uložení URL do proměnné

   $operation = filter_input(INPUT_GET, 'operation'); //filtrování obsahu URL za 'operation' částí
   switch($operation){  //přesměrovávání na jednotlivé stránky
      case 'sign':
         require '../signature/index.php';
         echo "<link rel='stylesheet' href='../signature/css/style.css'>";
         break;
      case 'verify':
         require '../verification/index.php';
         echo "<link rel='stylesheet' href='../verification/css/style.css'>";
         break;
      case 'register':
         require '../registration/index.php';
         echo "<link rel='stylesheet' href='../registration/css/index.css'>";
         break;
      case "register_key":
         require '../registration/keys.php';
         echo "<link rel='stylesheet' href='../registration/css/keys.css'>";
         break;
      case "help":
         require '../about/index.html';
         echo "<link rel='stylesheet' href='../about/css/style.css'>";
         break;
   }
   ?>
   <script src="js/menu.js"></script>
</body>
</html>