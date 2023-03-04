<?php
require '../keys/key_pair.php';
date_default_timezone_set('Europe/Prague');



class Signature{

    public $data, $sig_part, $id, $private_key_txt, $data_hash, $encrypted_data;

    // nastaví základní hodnoty proměnným
    public function __construct(){
        $this->data = $_POST['to_sign'];
        $this->sig_part = explode('|', $_POST['encryption_resources']);
        $this->id = $this->sig_part[1];
        $this->private_key_txt = $this->sig_part[2];
    }

    //funkce pro získání podpisu
    public function getSignature(){
        $this->data_hash = hash('sha256', $this->data, false); //vytvoří hash z textu, který chceme podepisovat a uloží jej do proměnné
        openssl_private_encrypt($this->data_hash, $this->encrypted_data, $this->private_key_txt); //zašifruje hodnotu výše zmiňovaného hashe pomocí privátního klíče a uloží jej do proměnné $encrypted_data
        return $this;
    }
    
    //sestaví echovatelnou verzi podpisu
    public function __toString(){
                                            //převede tělo podpisu do hexadecimálního tvaru tudíš není problém s kódováním
        return $this->data . "|" .$this->id. "|".bin2hex($this->encrypted_data). "|" . date("d/m/Y H:i:s");
    }
}
//vytvoření objektu
$signature = (new Signature)->getSignature();

//generování html
echo "<p>Podepsaný text</p>";
echo "<label for='out_text'></label>";
echo "<textarea role='podepsaný text' id='out_text' class='out_text' name='out_text' rows='10' cols='60'>".$signature."</textarea>";
echo "<button id='copy_button' class='copy_button' onclick='copy()'>Zkopírovat</button>";
?>