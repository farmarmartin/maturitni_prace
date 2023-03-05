<?php
class Verify{
    // vytvoření proměnných
    public $data, $data_parts, $signature, $public_key, $decrypted_data, $id, $person, $date;

    //základní nastavení proměnných po vytvoření nového objektu
    public function __construct()
    {
        require('../dat/dbh.php'); //import scriptu pro připojení do DB

        $this->data = $_POST['signed_text']; //uložení dat z formuláře do proměnných
        $this->data_parts = explode('|', $this->data);
        $this->id = $this->data_parts[1];
        $this->signature = $this->data_parts[2];
        $this->date = $this->data_parts[3];
        $this->public_key = ''; //resetování zákl. hodnot
        $this->decrypted_data = '';
        $this->person = '';

        $sql = "SELECT public_key, full_name FROM user_details WHERE id =('$this->id');"; // SQL příkaz pro načtení veřejného klíče a podepisovatele
        $result = $db->query($sql);

        //uložení dat přijmutých z DB do proměnných
        while ($row = mysqli_fetch_assoc($result)) {
            $this->public_key = $row['public_key'];
            $this->person = $row['full_name'];
        }
        $db->close(); //uzavření spojení s DB
    }

    //funkce rozšifruje hodnotu původního hashe pomocí veřejného klíče a uloží jej do proměnné
    public function decrypt(){
        openssl_public_decrypt(hex2bin($this->signature), $this->decrypted_data, $this->public_key);
        return $this;
    }

    //funkce vytvoří hash z obsahu podepisovaného textu a porovná, zda je stejný jako ten z funkce decrypt()
    public function isValid(){
        if ($this->decrypted_data ==  hash('sha256', $this->data_parts[0], false)){
            echo "<p>Text byl digitálně podepsán osobou: ".$this->person.".<br> Datum a čas podpisu: $this->date.</p>";
        }else{
            echo "<p>Text byl změněn.</p>";
        }
        return $this;
    }
}
//vytvoření objektu a zavolání nezbytných funkcí třídy
$valid = (new Verify)->decrypt()->isValid();
?>