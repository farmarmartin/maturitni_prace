<?php
class Verify{

    public $data, $data_parts, $signature, $public_key, $decrypted_data, $id, $person, $date;
    public function __construct()
    {
        require('../dat/dbh.php');

        $this->data = $_POST['signed_text'];
        $this->data_parts = explode('|', $this->data);
        $this->id = $this->data_parts[1];
        $this->signature = $this->data_parts[2];
        $this->public_key = '';
        $this->decrypted_data = '';
        $this->person = '';
        $this->date = null;

        $sql = "SELECT public_key, full_name FROM user_details WHERE id =('$this->id');"; # SQL příkaz pro načtení veřejného klíče a podepisovatele
        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $this->public_key = $row['public_key'];
            $this->person = $row['full_name'];
        }
        mysqli_close($connect);
    }

    public function decrypt(){
        openssl_public_decrypt(hex2bin($this->signature), $this->decrypted_data, $this->public_key);
        return $this;
    }

    public function isValid(){
        if ($this->decrypted_data ==  hash('sha256', $this->data_parts[0], false)){
            echo "<p>Text byl digitálně podepsán osobou: ".$this->person."</p>";
        }else{
            echo "<p>Text byl změněn.</p>";
        }
        return $this;
    }
}

$valid = (new Verify)->decrypt()->isValid();
?>