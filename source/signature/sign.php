<?php
require '../keys/key_pair.php';
date_default_timezone_set('Europe/Prague');



class Signature{

    public $name;
    public $data;
    public $private_key_from_input;
    public $data_hash;
    public $encrypted_data;

    public function __construct(){

        $this->name = $_POST['name'];
        $this->data = $_POST['to_sign'];
        $this->private_key_from_input = $_POST['private_key'];
    }

    public function getSignature(){
        $this->data_hash = hash('sha256', $this->data, false);
        openssl_private_encrypt($this->data_hash, $this->encrypted_data, $this->private_key_from_input);
        return $this;
    }

    public function __toString(){
        return $this->data . "|" . bin2hex($this->encrypted_data) . "|".$this->name. "|" . date("Y-M-D h:i:s");
    }
}
$signature = (new Signature)->getSignature();
echo $signature;


?>