<?php
require_once 'dbconnect.php';

$userId = $_SESSION['userId'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$eMail = $_POST['eMail'];
$password = $_POST['password'];
$gsm = $_POST['gsm'];

if($firstName!= "" && $lastName!= "" && $eMail!= "" && $password!= "" && $gsm!= ""){

    $query = $db->prepare("UPDATE Users SET FirstName = :firstName, LastName = :lastName, Email = :eMail, Password = :password, GSM = :gsm  WHERE Id = :userId");
    $update = $query->execute(array(
        "userId" => $userId,
        "firstName" => $firstName,
        "lastName" => $lastName,
        "eMail" => $eMail,
        "password" => $password,
        "gsm" => $gsm
    ));
    if ($query->rowCount()){
        echo "güncelleme başarılı!";
    }
    else{
        echo "Güncelleme işlemi için bilgilerde değişiklik yapmalısınız!";
    }

}
else{
    echo "Lütfen tüm verileri doldurunuz!";
}