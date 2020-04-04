<?php
    function getConnection(){
    $db = new PDO("mysql:host=localhost;dbname=welcomeu",'root','');
    return $db;

}
?>