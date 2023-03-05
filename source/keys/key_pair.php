<?php
// vytvoření třídy pro generování RSA klíčů
class Keys{
    // vytvoření proměnných
    public $configargs, $keypair, $public_key, $private_key;
    //základní nastavení proměnných po vytvoření nového objektu
    public function __construct(){
        $this->keypair = null;
        $this->public_key = null;
        $this->private_key = null;
        $this->configargs = array(      //parametry pro funkci openssl_pkey_new()
            'config' => 'D:/xampp/php/extras/openssl/openssl.cnf',      /* cesta pro linux: /opt/lampp/include/openssl/*/ 
            'digest_alg' => 'sha256',   //hashovací algoritmus
            'private_key_bits' => 2048, //délka klíče
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
        );
    }
    //funkce generující samotné klíče
    public function getKeys(){
        $this->keypair = openssl_pkey_new($this->configargs);
        if($this->keypair !== false){
            $this->public_key = openssl_pkey_get_details($this->keypair)['key'];
            openssl_pkey_export($this->keypair, $this->private_key, NULL,$this->configargs); //převod asymetrického klíče na string a uložení do proměnné $private_key
            return $this;
        }
        return false;
    }
}
?>