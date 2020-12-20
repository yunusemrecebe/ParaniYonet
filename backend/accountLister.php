<?php
require_once 'dbconnect.php';
try {
    $accountsQuery = $db->query("SELECT * FROM Accounts");

    while ($accounts = $accountsQuery->fetch(PDO::FETCH_ASSOC)){
        echo $accounts['Id'];
        echo $accounts['Owner'];
        echo $accounts['Name'];
        echo $accounts['Balance'];
        echo $accounts['Type'];
    }
}

catch (PDOException $e){
    print $e->getMessage();
}
