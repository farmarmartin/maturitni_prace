<?php
require '../keys/key_pair.php';
date_default_timezone_set('Europe/Prague');



class Signature{

    public $data, $sig_part, $id, $private_key_from_input, $data_hash, $encrypted_data;

    public function __construct(){
        $this->data = $_POST['to_sign'];
        $this->sig_part = explode('|', $_POST['encryption_resources']);
        $this->id = $this->sig_part[1];
        $this->private_key_from_input = $this->sig_part[2];
    }

    public function getSignature(){
        $this->data_hash = hash('sha256', $this->data, false);
        openssl_private_encrypt($this->data_hash, $this->encrypted_data, $this->private_key_from_input);
        return $this;
    }

    public function __toString(){
        return $this->data . "|" .$this->id. "|".bin2hex($this->encrypted_data). "|" . date("Y-M-D h:i:s");
    }
}
$signature = (new Signature)->getSignature();
echo "<textarea rows='10lo' cols='60'>".$signature."</textarea>";


?>