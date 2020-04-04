<?php
function getConnection(){
    //$db = new PDO("mysql:host=localhost;dbname=unn_w15021554",'unn_w15021554','SXIK5W1D');
    $db = new PDO("mysql:host=localhost;dbname=welcomeu",'root','');

    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 return $db;

}
?>