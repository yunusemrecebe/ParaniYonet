<?php
require_once("dbconnect.php");

if ($_SESSION['loginStatus']==1){
    session_destroy();
}
?>