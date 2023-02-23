<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <?php
   $url = $_SERVER["REQUEST_URI"];

   $operation = filter_input(INPUT_GET, 'operation');
   switch($operation){
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
</body>
</html>