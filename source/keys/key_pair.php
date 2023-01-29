<?php
$configargs = array(
    "config" => "/opt/lampp/include/openssl/",
    'private_key_bits'=> 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
    'default_md' => "sha256",
);

$keypair = openssl_pkey_new($configargs);
$public_key = openssl_pkey_get_details($keypair)['key'];
$public_key_parts = explode('-----', $public_key);
$public_key_raw = $public_key_parts[2];

openssl_pkey_export($keypair, $private_key, NULL,$configargs);