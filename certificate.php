<?php
    
$configargs = array(
    "config" => "/opt/lampp/include/openssl/",
    'private_key_bits'=> 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
    'default_md' => "sha256",
);

$keypair = openssl_pkey_new($configargs);
$public_key = openssl_pkey_get_details($keypair)['key'];
$private_key_idk = openssl_pkey_get_private($public_key_pem);
//echo $private_key_idk;
openssl_pkey_export($keypair, $privKey,NULL,$configargs);
//echo $privKey;
//echo "<br><br>". $public_key;
// openssl_csr vytvoří certifikat    
$data = $_POST['to_sign'];
$private_key = $_POST['private_key'];


$distinguished_names = [
    "State" => "Czechia",
    "Organization" => "Vyšší odborná škola, Střední průmyslová škola a Střední odborná škola, Varnsdorf, příspěvková organizace",
    "FullName" => "Martin Job"
];

//certificate singing request
$csr = openssl_csr_new($distinguished_names, $private_key, array('digest_alg' => 'sha256'));
openssl_csr_export($csr, $csr_string);

//actual certificate standardu x509
$certificate = openssl_csr_sign($csr_string, null, $privKey, 365, array('digest_alg' => 'sha256'));
//certificate to string
openssl_x509_export($certificate, $certificate_string);
var_dump($_POST['to_sign']);

//openssl_pkcs7_sign() podepíše text podle certifikátu


?>