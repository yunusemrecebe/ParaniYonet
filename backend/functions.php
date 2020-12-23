<?php
date_default_timezone_set('Europe/Istanbul');

function ViewSumSpendingByCategory($x){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];
    $spendings = $db->query("SELECT Sum(s.Amount) as Total FROM Spendings s JOIN Accounts a ON s.Account = a.Id JOIN Users u ON u.Id = a.Owner WHERE u.Id = $userId AND s.Category = $x")->fetch(PDO::FETCH_ASSOC);
    if ($spendings['Total']>0){
        echo $spendings['Total'];
    }
    else{
        echo "0";
    }
}

function ViewSumSpendingByDate($date){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];
    $spendings = $db->query("SELECT Sum(s.Amount) as Total FROM Spendings s JOIN Accounts a ON s.Account = a.Id JOIN Users u ON u.Id = a.Owner WHERE $date(SpendingDate) = $date(CURDATE()) AND u.Id = $userId")->fetch(PDO::FETCH_ASSOC);
    if ($spendings['Total']>0){
        echo $spendings['Total'];
    }
    else {
        echo "0";
    }
}

function ViewSpendingsByDate($date){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];

    $spendingsQuery = $db->query("SELECT s.Amount, c.Name FROM Spendings s JOIN Accounts a ON s.Account = a.Id JOIN Categories c ON s.Category = c.Id JOIN Users u ON a.Owner = u.Id WHERE $date(SpendingDate) = $date(CURDATE()) AND u.Id = $userId");
    if ($spendingsQuery->rowCount()){
        while ($spendings = $spendingsQuery->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . $spendings['Name'] . ", " . $spendings['Amount'] . "</li>";
        }
    }
    else{
        echo "Henüz hiç harcama yapılmadı.";
    }
}

function ViewSumIncomesByDate($date){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];
    $spendings = $db->query("SELECT Sum(i.Amount) as Total FROM Incomes i JOIN Accounts a ON i.Account = a.Id JOIN Users u ON u.Id = a.Owner WHERE $date(IncomeDate) = $date(CURDATE()) AND u.Id = $userId")->fetch(PDO::FETCH_ASSOC);
    if ($spendings['Total']>0){
        echo $spendings['Total'];
    }
    else {
        echo "0";
    }
}

function ViewIncomesByDate($date){
    include 'dbconnect.php';
    $userId = $_SESSION['userId'];

    $spendingsQuery = $db->query("SELECT i.Amount, a.Name FROM Incomes i JOIN Accounts a ON i.Account = a.Id JOIN Users u ON a.Owner = u.Id WHERE $date(IncomeDate) = $date(CURDATE()) AND u.Id = $userId");
    if ($spendingsQuery->rowCount()){
        while ($spendings = $spendingsQuery->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . $spendings['Name'] . ", " . $spendings['Amount'] . "</li>";
        }
    }
    else{
        echo "Henüz hiç gelir eklenmedi.";
    }
}


?>