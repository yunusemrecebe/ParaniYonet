<?php
date_default_timezone_set('Europe/Istanbul');

function LogOutRedirect(){
    echo "<script type='text/javascript'>alert('Bu sayfayı görüntülemek için öncelikle oturum açmalısınız!');</script>";
    Header("Refresh: 0.01; url=index.php");
    die();
}

function ViewSumSpendingByCategory($x,$currency){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];
    $spendings = $db->query("SELECT Sum(s.Amount) as Total FROM Spendings s JOIN Accounts a ON s.Account = a.Id JOIN Users u ON u.Id = a.Owner WHERE u.Id = $userId AND s.Category = $x AND a.Currency = '$currency'")->fetch(PDO::FETCH_ASSOC);
    if ($spendings['Total']>0){
        return $spendings['Total']." ".$currency;
    }
    else{
        return "0"." ".$currency;
    }
}

function ViewSumSpendingByDate($date,$currency){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];
    $spendings = $db->query("SELECT Sum(s.Amount) as Total FROM Spendings s JOIN Accounts a ON s.Account = a.Id JOIN Users u ON u.Id = a.Owner WHERE $date(SpendingDate) = $date(CURDATE()) AND u.Id = $userId AND a.Currency = '$currency'")->fetch(PDO::FETCH_ASSOC);
    if ($spendings['Total']>0){
        return $spendings['Total']." ".$currency;
    }
    else {
        return "0"." ".$currency;
    }
}

function ViewSpendingsByDate($date,$currency){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];

    $spendingsQuery = $db->query("SELECT s.Amount, c.Name FROM Spendings s JOIN Accounts a ON s.Account = a.Id JOIN Categories c ON s.Category = c.Id JOIN Users u ON a.Owner = u.Id WHERE $date(SpendingDate) = $date(CURDATE()) AND u.Id = $userId AND a.Currency = '$currency'");
    if ($spendingsQuery->rowCount()){
        $result = "";
        while ($spendings = $spendingsQuery->fetch(PDO::FETCH_ASSOC)) {
            $result .= "<li>" . $spendings['Name'] . ", " . $spendings['Amount']." ".$currency ."</li>";
        }
        return $result;
    }
    else{
        return "Henüz hiç harcama yapılmadı.";
    }
}

function ViewSumIncomesByDate($date,$currency){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];
    $spendings = $db->query("SELECT Sum(i.Amount) as Total FROM Incomes i JOIN Accounts a ON i.Account = a.Id JOIN Users u ON u.Id = a.Owner WHERE $date(IncomeDate) = $date(CURDATE()) AND u.Id = $userId AND a.Currency = '$currency'")->fetch(PDO::FETCH_ASSOC);
    if ($spendings['Total']>0){
        return $spendings['Total']." ".$currency;
    }
    else {
        return "0"." ".$currency;
    }
}

function ViewIncomesByDate($date,$currency){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];

    $spendingsQuery = $db->query("SELECT i.Amount, a.Name FROM Incomes i JOIN Accounts a ON i.Account = a.Id JOIN Users u ON a.Owner = u.Id WHERE $date(IncomeDate) = $date(CURDATE()) AND u.Id = $userId AND a.Currency = '$currency'");
    if ($spendingsQuery->rowCount()){
        $result = "";
        while ($spendings = $spendingsQuery->fetch(PDO::FETCH_ASSOC)) {
            $result .= "<li>" . $spendings['Name'] . ", " . $spendings['Amount'] ." ".$currency . "</li>";
        }
        return $result;
    }
    else{
        return "Henüz hiç gelir eklenmedi.";
    }
}

?>