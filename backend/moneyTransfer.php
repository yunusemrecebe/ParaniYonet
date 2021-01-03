<?php
require_once 'dbconnect.php';
if($_POST['sendingAmount']>0){
    $userId = $_SESSION['userId'];
    $sendingAccount = $_POST['sendingAccount'];
    $gettingAccount = $_POST['gettingAccount'];
    $sendingAmount = $_POST['sendingAmount'];

    if ($sendingAccount != $gettingAccount){

        $firstAccount = $db->query("SELECT * FROM Accounts WHERE Id = $sendingAccount")->fetch(PDO::FETCH_ASSOC);
        $firstAccountBalance = $firstAccount['Balance'];
        $firstAccountCurrency = $firstAccount['Currency'];

        $secondAccount = $db->query("SELECT * FROM Accounts WHERE Id = $gettingAccount")->fetch(PDO::FETCH_ASSOC);
        $secondAccountBalance = $secondAccount['Balance'];
        $secondAccountCurrency = $secondAccount['Currency'];
        if  ($firstAccountBalance>=$sendingAmount){
            if ($firstAccountCurrency==$secondAccountCurrency){

                $firstAccountBalance = $firstAccountBalance - $sendingAmount;
                $secondAccountBalance = $secondAccountBalance + $sendingAmount;

                $updateFirstAccount = $db->query("UPDATE Accounts SET Balance = $firstAccountBalance WHERE Id = $sendingAccount");
                $updateSecondAccounts = $db->query("UPDATE Accounts SET Balance = $secondAccountBalance WHERE Id = $gettingAccount");

                if ($updateFirstAccount->rowCount() && $updateFirstAccount->rowCount()){
                    echo "Transfer işlemi başarıyla gerçekleştirildi!";
                }
                else{
                    echo "Bir hata oluştu!";
                }
            }
            else{
                echo "Farklı para birimleri arasında transfer işlemi gerçekleştirilemez!";
            }
        }
        else{
            echo "Gönderen hesabın bakiyesi, belirtilen işlem tutarı için yetersiz!";
        }
    }
    else{
        echo "Gönderen hesap ile Alan hesap aynı olamaz!";
    }

}
else{
    echo "Lütfen geçerli bir transfer miktarı giriniz!";
}