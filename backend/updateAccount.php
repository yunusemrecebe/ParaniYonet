<?php
require_once 'dbconnect.php';
require_once 'functions.php';

$accountId = $_POST['accountId'];
$accountName = $_POST['accountName'];
$accountBalance = $_POST['accountBalance'];

$oldBalanceQuery = $db->query("SELECT a.Balance FROM Accounts a JOIN Users u ON a.Owner = u.Id WHERE a.Id = '$accountId'")->fetch(PDO::FETCH_ASSOC);
$oldBalance = $oldBalanceQuery['Balance'];
$lastIncome = $accountBalance - $oldBalance;
$time = date('Y.m.d');

$lastIncomeAdd = $db->query("INSERT INTO Incomes SET Account = '$accountId', Amount = '$lastIncome', PreviousBalance = '$oldBalance', NextBalance = '$accountBalance', IncomeDate = '$time'");
$update = $db->query("UPDATE Accounts SET Name = '$accountName', Balance = '$accountBalance' WHERE Id = '$accountId' ");
?>
