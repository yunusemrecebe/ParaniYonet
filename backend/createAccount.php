<?php
require_once 'dbconnect.php';

$userId = $_SESSION['userId'];
$accountName = $_POST['accountName'];
$accountBalance = $_POST['accountBalance'];
$accountCurrency = $_POST['accountCurrency'];
$accountType = $_POST['accountType'];

if ($userId != "" && $accountName != "" && $accountBalance != ""  && $accountCurrency != "" && $accountType != ""){

    $query = $db->prepare("INSERT INTO Accounts SET Owner = :owner, Name = :name, Balance = :balance, Currency = :currency, Type = :type");
    $insert = $query->execute(array("owner" => $userId,
                                    "name" => $accountName,
                                    "balance" => $accountBalance,
                                    "currency" => $accountCurrency,
                                    "type" => $accountType,
        ));
    if ($insert){
        echo "Hesap oluşturuldu!";
    }
    else{
        echo "Bir Hata oluştu!";
    }

}
else{
    "Lütfen tüm alanları doldurunuz!";
}

