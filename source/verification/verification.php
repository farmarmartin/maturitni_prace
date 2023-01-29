<?php
require('../dat/dbh.php');

$data = $_POST['to_validate'];

$data_parts = explode('|', $data);
$signature = $data_parts[1];


$sql = "SELECT public_key FROM user_details WHERE full_name =('$data_parts[2]');"; # SQL příkaz pro načtení veřejného klíče
$result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_assoc($result)){
    $public_key = $row['public_key'];
}
$signature_bin = hex2bin($signature);

openssl_public_decrypt($signature_bin, $decrypted_data, '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAovpXsoKgKICN+sUhFolw
K8ttgGAYDesSCY9yr2IXzbT9vnrUQezwgQndx2JrDdlsdesRL9mzXet1mKcq0rdr
g9Uqa6oafy1nHjJh9r/UyOAaZE2iO0J+ilG7aOiL1FpFUW7xsgWHnDNwFFPmuK2T
WqwVZ28RG9kFCv5sqjUix0vn0VWythHn5/3FjOVmUv4Bnr06JW4eQmRDwnwDdHPZ
V32WldGUi4wWmdAzvsHdLo7GtZfIxbD5REXbokxGTitzFbPdPxzWIy0NqH0FgTh/
u5hSqQ2Ua9nnrxOPX5I6Yqb/u5OhqcUDMOk8zUpg5LSUXtpmeQ0TeKSkfderidpq
0wIDAQAB
-----END PUBLIC KEY-----
');

if ($decrypted_data ===  $data_parts[0]){
    echo "ok, message is legitimate.";
}else{
    echo "something went wrong :(";
}




