<?php
require_once 'dbconnect.php';

if(isset($_POST["datepickerFirst"], $_POST["datepickerLast"]))
{
    $startingDate = $_POST["datepickerFirst"];
    $lastDate = $_POST["datepickerLast"];
    $result = '';
    $filter = $db->query("SELECT * FROM Spendings WHERE SpendingDate BETWEEN '$startingDate' AND '$lastDate' ",PDO::FETCH_ASSOC);
    $result .='
	<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
            <th scope="col">Tutar</th>
            <th scope="col">Hesap</th>
            <th scope="col">Mevcut Bakiye</th>
            <th scope="col">Önceki Bakiye</th>
            <th scope="col">Tarih</th>
            <th scope="col">İşletme</th>
          </tr>
        </thead>
        <tbody>';
    if($filter->rowCount())
    {
        $userId = $_SESSION['userId'];

        $spendingsQuery = $db->query("SELECT s.Id, c.Name as Category, s.Amount, a.Name as AccountName, s.AvailableBalance,s.OldBalance,s.SpendingDate,s.Business, a.Currency as AccountCurrency FROM Accounts a JOIN Users u ON a.Owner = u.Id JOIN Spendings s ON s.Account = a.Id JOIN Categories c ON c.Id = s.Category WHERE a.Owner = $userId");

        while ($spendings = $spendingsQuery->fetch(PDO::FETCH_ASSOC)) {
            $SpendingId = $spendings['Id'];
            $SpendingCategory = $spendings['Category'];
            $SpendingAmount = $spendings['Amount'];
            $SpendingAccount = $spendings['AccountName'];
            $SpendingAccountCurrency = $spendings['AccountCurrency'];
            $SpendingAvailableBalance = $spendings['AvailableBalance'];
            $SpendingOldBalance = $spendings['OldBalance'];
            $SpendingDate = $spendings['SpendingDate'];
            $SpendingBusiness = $spendings['Business'];
            $result .='<tr>
                <th scope="row"><?php echo $SpendingId; ?></th>
                <td><?php echo $SpendingCategory; ?></td>
                <td><?php echo $SpendingAmount . " " . $SpendingAccountCurrency; ?></td>
                <td><?php echo $SpendingAccount; ?></td>
                <td><?php echo $SpendingAvailableBalance . " " . $SpendingAccountCurrency; ?></td>
                <td><?php echo $SpendingOldBalance . " " . $SpendingAccountCurrency; ?></td>
                <td><?php echo $SpendingDate; ?></td>
                <td><?php echo $SpendingBusiness; ?></td>
            </tr>
            <?php
                ';}
        ?>
        </tbody>
        <?php
    }
    else
    {
        $result .='
		<tr>
		<td colspan="5">No Purchased Item Found</td>
		</tr>';
    }
    $result .='</table>';
    echo $result;
}
?>
