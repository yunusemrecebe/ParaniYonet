<?php
require_once 'dbconnect.php';

$userId = $_SESSION['userId'];
$accountName = $_POST['accountName'];
$accountBalance = $_POST['accountBalance'];
$accountType = $_POST['accountType'];

if ($userId != "" && $accountName != "" && $accountBalance != "" && $accountType != ""){

    $query = $db->prepare("INSERT INTO Accounts SET Owner = :owner, Name = :name, Balance = :balance, Type = :type");
    $insert = $query->execute(array("owner" => $userId,
                                    "name" => $accountName,
                                    "balance" => $accountBalance,
                                    "type" => $accountType,
        ));
    if ($insert){
        echo "Hesap eklendi!";
    }
    else{
        echo "Bir Hata oluştu!";
    }

}
else{
    "Lütfen tüm alanları doldurunuz!";
}

