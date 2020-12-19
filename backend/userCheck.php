<?php
require_once("dbconnect.php");

if (isset($_POST['userMail']) and isset($_POST['userPassword'])) {

    $userMail = $_POST['userMail'];
    $userPassword = $_POST['userPassword'];

    $query=$db->prepare("SELECT * FROM Users WHERE Email=:mail AND Password=:password");
    $query->execute(array(
        'mail' => $userMail,
        'password' => $userPassword
    ));

    if ($query->rowCount()) {
        $message = $db->query("SELECT Id,FirstName,LastName FROM Users WHERE Email = '{$userMail}'")->fetch(PDO::FETCH_ASSOC);

        $_SESSION['userId'] = $message['Id'];
        $_SESSION['loginStatus']=1;

        echo "Hoşgeldiniz Sayın {$message['FirstName']} {$message['LastName']}";
    }
    else {
        echo "Mail adresi veya Şifre hatalı!";
    }

}
else {
    echo 'Lütfen bilgileri eksiksiz olarak doldurunuz!';
}

?>