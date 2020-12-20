<?php
require_once 'dbconnect.php';

	$accountId = $_POST['accountId'];

$delete = $db->query("DELETE FROM Accounts WHERE Id = '$accountId' ");
?>


