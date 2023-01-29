<?php
require('../keys/key_pair.php');
    $data = $_POST['to_sign'];
    $private_key_from_input = $_POST['private_key'];

    
    /* Tvorba certifikátu:
    $distinguished_names = [
        "State" => "Czechia",
        "Organization" => "Vyšší odborná škola, Střední průmyslová škola a Střední odborná škola, Varnsdorf, příspěvková organizace",
        "FullName" => "Martin Job"
    ];
    
    //certificate signing request
    $csr = openssl_csr_new($distinguished_names, $private_key, array('digest_alg' => 'sha256'));
    openssl_csr_export($csr, $csr_string);
    
    //actual certificate standardu x509
    $certificate = openssl_csr_sign($csr_string, null, $privKey, 365, array('digest_alg' => 'sha256'));
    //certificate to string
    openssl_x509_export($certificate, $certificate_string);
    */

    openssl_private_encrypt($data, $encrypted_data, $private_key_from_input);

    //echo $private_key_from_input . "<br><br><br>" . $private_key;
    //translate to hexadecimal, so the crypt make sense and can be a part of output string
    $encrypted_data_hex = bin2hex($encrypted_data);

    date_default_timezone_set('Europe/Prague');

    echo $data . "|" . bin2hex($encrypted_data) . "|" . date("Y-M-D h:i:s");

?>