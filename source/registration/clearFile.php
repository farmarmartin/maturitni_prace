<?php
function clearFile(){
    $f = fopen('private_key.txt', 'r+');
    ftruncate($f, 0);
    fclose($f);
}

clearFile();