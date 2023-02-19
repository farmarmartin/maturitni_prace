<?php

class Keys{

    public $configargs;
    public $keypair;
    public $public_key;
    public $private_key;


    public function __construct(){
        $this->keypair = null;
        $this->public_key = null;
        $this->private_key = null;
        $this->configargs = array(
            'config' => 'D:/xampp/php/extras/openssl/openssl.cnf',      /*/opt/lampp/include/openssl/*/ 
            'digest_alg' => 'sha256',
            'private_key_bits' => 2048,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
        );
    }

    public function getKeys(){
        $this->keypair = openssl_pkey_new($this->configargs);
        $this->public_key = openssl_pkey_get_details($this->keypair)['key'];
        openssl_pkey_export($this->keypair, $this->private_key, NULL,$this->configargs);
        return $this;
    }
}