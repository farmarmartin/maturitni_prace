<?php
class Verify{

    public $data, $data_parts, $signature, $public_key, $decrypted_data, $id;
    public function __construct()
    {
        require('../dat/dbh.php');

        $this->data = $_POST['signed_text'];
        $this->data_parts = explode('|', $this->data);
        $this->id = $this->data_parts[1];
        $this->signature = $this->data_parts[2];
        $this->public_key = '';
        $this->decrypted_data = '';

        $sql = "SELECT public_key FROM user_details WHERE id =('$this->id');"; # SQL příkaz pro načtení veřejného klíče
        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $this->public_key = $row['public_key'];
        }
        mysqli_close($connect);
    }

    public function decrypt(){
        openssl_public_decrypt(hex2bin($this->signature), $this->decrypted_data, $this->public_key);

        return $this;
    }

    public function isValid(){
        if ($this->decrypted_data ==  hash('sha256', $this->data_parts[0], false)){
            echo "<p>Message is legitimate.</p>";
        }else{
            echo "<p>Document has been changed.</p>";
        }
        return $this;
    }
}

$valid = (new Verify)->decrypt()->isValid();
?>