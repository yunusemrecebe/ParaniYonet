<?php
require_once 'dbconnect.php';

$accountId = $_POST['accountId'];
$accountName = $_POST['accountName'];
$accountBalance = $_POST['accountBalance'];

$update = $db->query("UPDATE Accounts SET Name = '$accountName', Balance = '$accountBalance' WHERE Id = '$accountId' ");
?>
