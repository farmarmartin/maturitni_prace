<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $url = $_SERVER["REQUEST_URI"];

    $operation = filter_input(INPUT_GET, 'operation');
    $parameters = explode(",", filter_input(INPUT_GET, 'param'));
     if($operation == "register"){
        require '../registration/index.php';
     }
     if($operation == "sign"){
        require '../signature/index.php';
     }
     if($operation == "verify"){
        require '../verification/index.php';
     }
    ?>
</body>
</html>