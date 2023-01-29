<?php
$data = $_POST['to_validate'];

$data_parts = explode('###', $data);
$signature = $data_parts[2];

//openssl_public_decrypt(hex2bin($signature), $decrypted_message, $public_key);

if ($decrypted_message ==  $dataparts[0]){
    echo "ok, message is legitimate.";
}else{
    echo "something went wrong :(";
}


$encrypted_data_bin = hex2bin($encrypted_data_hex);
openssl_public_decrypt($encrypted_data_bin, $decrypted_data, $public_key);
