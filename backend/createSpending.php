<?php
require_once 'dbconnect.php';

$userId = $_SESSION['userId'];
$account = $_POST['account'];
$category = $_POST['category'];
$business = $_POST['business'];
$amount = $_POST['amount'];
$time = date('d.m.Y H:i:s');

if($_SESSION['userId'] != "" && $_POST['account'] != "" && $_POST['category'] != "" && $_POST['business'] != "" && $_POST['amount'] != ""){

    $learnBalance = $db->query("SELECT Balance FROM Accounts WHERE Id = $account")->fetch(PDO::FETCH_ASSOC); //Mevcut hesap bakiyesini öğren

    $learnBalance = $learnBalance['Balance'];
    $availableBalance = $learnBalance - $amount; //Kalan bakiyeyi hesapla
    $db->exec("UPDATE Accounts SET Balance = $availableBalance WHERE Id = $account"); //Hesap bakiyesini güncelle

    $query = $db->prepare("INSERT INTO Spendings SET Category = :Category, Amount = :Amount, Account = :Account, 
                                    AvailableBalance = :AvailableBalance, OldBalance = :OldBalance, SpendingDate = :SpendingDate, Business = :Business");//Verileri Harcamalar Tablosuna Yükle
    $insert = $query->execute(array("Category" => $category,
                                    "Amount" => $amount,
                                    "Account" => $account,
                                    "AvailableBalance" => $availableBalance,
                                    "OldBalance" => $learnBalance,
                                    "SpendingDate" => $time,
                                    "Business" => $business,
    ));
    if ($insert){
        echo "Harcama eklendi!";
    }
    else{
        echo "Bir Hata oluştu!";
    }
}
else{
    echo "Geçerli bir POST işlemi olmadan bu sayfa çalışmayacaktır!";
}