<?php
    function getConnection(){
    $db = new PDO("mysql:host=localhost;dbname=welcomeu",'root',''); //TODO - Change this
    return $db;
}
?>