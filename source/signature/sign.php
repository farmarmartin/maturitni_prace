<?php
require '../keys/key_pair.php';
date_default_timezone_set('Europe/Prague');



class Signature{

    public $data, $sig_part, $id, $private_key_txt, $data_hash, $encrypted_data;

    public function __construct(){
        $this->data = $_POST['to_sign'];
        $this->sig_part = explode('|', $_POST['encryption_resources']);
        $this->id = $this->sig_part[1];
        $this->private_key_txt = $this->sig_part[2];

        /*if($_POST['encryption_resources'] == ''){
            $f = fopen($_POST['file'], 'r');
            var_dump($f);
        }*/
    }

    public function getSignature(){
        $this->data_hash = hash('sha256', $this->data, false);
        openssl_private_encrypt($this->data_hash, $this->encrypted_data, $this->private_key_txt);
        return $this;
    }

    public function __toString(){
        return $this->data . "|" .$this->id. "|".bin2hex($this->encrypted_data). "|" . date("Y-M-D h:i:s");
    }
}
$signature = (new Signature)->getSignature();
echo "<p>Podepsaný text</p>";
echo "<textarea id='out_text' class='out_text' rows='10' cols='60'>".$signature."</textarea>";
echo "<button id='copy_button' class='copy_button'>Zkopírovat</button>";


?>