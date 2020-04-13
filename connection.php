<?php
    function getConnection(){
    $db = new PDO("mysql:host=localhost;dbname=welcomeu",'root','');
    //$db = new PDO("mysql:host=localhost;dbname=welcomeu",'root','pwdpwd');
    //$db = new PDO("mysql:host=localhost;dbname=unn_w15021554",'unn_w15021554','SXIK5W1D');
    return $db;

}
?>