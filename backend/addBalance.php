<?php
require_once 'dbconnect.php';
require_once 'functions.php';

if($_POST['accountId']!="" && $_POST['increaseAmount'] !=""){

    $accountId = $_POST['accountId'];
    $increaseAmount = $_POST['increaseAmount'];

    if ($increaseAmount>0){

        $oldBalanceQuery = $db->query("SELECT a.Balance FROM Accounts a JOIN Users u ON a.Owner = u.Id WHERE a.Id = '$accountId'")->fetch(PDO::FETCH_ASSOC);
        $oldBalance = $oldBalanceQuery['Balance'];

        $newBalance = $oldBalance + $increaseAmount;
        $update = $db->query("UPDATE Accounts SET Balance = '$newBalance' WHERE Id = '$accountId' ");

        $time = date('Y.m.d');
        $addIncomeToIncomesTable = $db->query("INSERT INTO Incomes SET Account = '$accountId', Amount = '$increaseAmount', PreviousBalance = '$oldBalance', NextBalance = '$newBalance', IncomeDate = '$time'");

        if ($update->rowCount()){
            echo "Bakiye eklendi!";
        }
        else{
            echo "Bir hata oluştu!";
        }
    }
    else{
        echo "Eklenecek bakiye 0'dan küçük olamaz!";
    }
}
else{
    echo "Lütfen eklenecek miktarı giriniz!";
}
