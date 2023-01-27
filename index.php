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

        $configargs = array(
            "config" => "/opt/lampp/include/openssl/",
            'private_key_bits'=> 2048,
            'default_md' => "sha256",
        );

        $keypair = openssl_pkey_new($configargs);
        $public_key = openssl_pkey_get_details($keypair)['key'];
        $private_key_idk = openssl_pkey_get_private($public_key_pem);
        //echo $private_key_idk;
        openssl_pkey_export($keypair, $privKey,NULL,$configargs);
        echo $privKey;
        echo "<br><br>". $public_key;
        // openssl_csr vytvoří certifikat
        ?>
    
</body>
</html>