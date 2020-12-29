<?php
require_once 'dbconnect.php';
require_once 'functions.php';

$account = $_POST['account'];
$category = $_POST['category'];
$business = $_POST['business'];
$amount = $_POST['amount'];
$time = date('Y.m.d');

if($_POST['account'] != "" && $_POST['category'] != "" && $_POST['business'] != "" && $_POST['amount'] != ""){
    if ($amount>0){

        $learnBalance = $db->query("SELECT Balance FROM Accounts WHERE Id = $account")->fetch(PDO::FETCH_ASSOC); //Mevcut hesap bakiyesini öğren
        $learnBalance = $learnBalance['Balance'];

        if ($learnBalance>$amount) {

            $availableBalance = $learnBalance - $amount; //Kalan bakiyeyi hesapla
            $db->exec("UPDATE Accounts SET Balance = $availableBalance WHERE Id = $account"); //Hesap bakiyesini güncelle

            $query = $db->prepare("INSERT INTO Spendings SET Category = :Category, Amount = :Amount, Account = :Account, AvailableBalance = :AvailableBalance, OldBalance = :OldBalance, SpendingDate = :SpendingDate, Business = :Business");//Verileri Harcamalar Tablosuna Yükle
            $insert = $query->execute(array("Category" => $category,
                "Amount" => $amount,
                "Account" => $account,
                "AvailableBalance" => $availableBalance,
                "OldBalance" => $learnBalance,
                "SpendingDate" => $time,
                "Business" => $business,
            ));
            if ($insert) {
                echo "Harcama başarıyla eklendi!";
            } else {
                echo "Bir hata oluştu!";
            }
        }
        else{
            echo "Hesap bakiyeniz bu tutardaki harcama için yetersiz!";
        }
    }
    else{
        echo "Lütfen geçerli bir harcama tutarı giriniz!";
    }
}
else{
    echo "Lütfen tüm verileri doldurunuz!";
}