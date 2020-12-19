<?php 
require_once("dbconnect.php");

if ($_POST['firstName'] != "" && $_POST['lastName'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" && $_POST['gsm'] != ""){

        //Kullanılan mail adresi kontrolü
    $mail = $_POST['mail'];

    $searchMail=$db->query("SELECT * FROM Users WHERE Email LIKE '$mail' ");

    if($searchMail->rowCount()){
        echo "Kullanılan bir mail adresi girdiniz!";
        $usedMail = true;
        }

    else{
        $usedMail=false;
    }

        //Kullanılan telefon numarası kontrolü
    $telephone = $_POST['gsm'];

    $searchTelephone = $db->query("SELECT * FROM Users WHERE GSM LIKE '$telephone'");

    if($searchTelephone->rowCount()){
        echo "Kullanılan bir telefon numarası girdiniz!";
        $usedTelephone=true;
    }
    else{
        $usedTelephone=false;
    }


    if ($usedMail==false && $usedTelephone==false){
        $register=$db->prepare("INSERT INTO Users SET FirstName=:firstName, LastName=:lastName, Email=:mail, Password=:password, GSM=:gsm");
        $insert=$register->execute(array(
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'mail' => $_POST['mail'],
            'password' => $_POST['password'],
            'gsm' => $_POST['gsm']
        ));

        if ($insert){
            echo "Kayıt Başarılı!";
        }
        else {
            echo "Hata Oluştu!";
        }
    }
}

else{
    echo "Lütfen tüm alanları eksiksiz olarak doldurun!";
}
 ?>