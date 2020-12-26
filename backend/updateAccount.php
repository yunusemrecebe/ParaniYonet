<?php
require_once 'dbconnect.php';
require_once 'functions.php';

$accountId = $_POST['accountId'];
$accountName = $_POST['accountName'];

$update = $db->query("UPDATE Accounts SET Name = '$accountName' WHERE Id = '$accountId' ");
?>
