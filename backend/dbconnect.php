<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=paraniyonet;charset=utf8", "root", "");
} catch ( PDOException $e ){
    print $e->getMessage();
}
//error_reporting(0);

if(session_status()==1){
    session_start();
}

?>