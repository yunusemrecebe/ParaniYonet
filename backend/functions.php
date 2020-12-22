<?php
date_default_timezone_set('Europe/Istanbul');

    function ViewSumSpendingByCategory($x){

        try {
            $db = new PDO("mysql:host=localhost;dbname=paraniyonet;charset=utf8", "root", "");

        } catch ( PDOException $e ){
            print $e->getMessage();
        }


        $userId = $_SESSION['userId'];
        $spendings = $db->query("SELECT Sum(s.Amount) as Total FROM Spendings s JOIN Accounts a ON s.Account = a.Id JOIN Users u ON u.Id = a.Owner WHERE u.Id = $userId AND s.Category = $x")->fetch(PDO::FETCH_ASSOC);
        if ($spendings['Total']>0){
            echo $spendings['Total'];
        }
        else{
            echo "0";
        }


}

?>