<?php
require_once 'dbconnect.php';
include '../headLinks.php';
$userId = $_SESSION['userId'];
$result = "";
$sql = $db->query("SELECT s.Id, c.Name as Category, s.Amount, a.Name as AccountName, s.AvailableBalance,s.OldBalance,s.SpendingDate,s.Business, a.Currency as AccountCurrency FROM Accounts a JOIN Users u ON a.Owner = u.Id JOIN Spendings s ON s.Account = a.Id JOIN Categories c ON c.Id = s.Category WHERE SpendingDate BETWEEN '".$_POST["firstDate"]."' AND '".$_POST["secondDate"]."' AND a.Owner = $userId");

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
	<tbody>
	';
if($sql->rowCount())
{
    while ($row = $sql->fetch(PDO::FETCH_ASSOC))
    {
		$result .='
			<tr>
			<td scope="row">'.$row["Id"].'</td>
			<td>'.$row["Category"].'</td>
			<td>'.$row["Amount"].' '. $row["AccountCurrency"]. '</td>
			<td>'.$row["AccountName"].'</td>
			<td>'.$row["AvailableBalance"].' '. $row["AccountCurrency"]. '</td>
			<td>'.$row["OldBalance"].' '. $row["AccountCurrency"]. '</td>
			<td>'.$row["SpendingDate"].'</td>
			<td>'.$row["Business"].'</td>
			</tr>';
    }
}
else
{
    $result .='
		<tr>
		<td colspan="8"><center>Seçilen tarih aralığında herhangi bir hareket bilgisi bulunamadı.</center></td>
		</tr>';
}
$result .='</tbody>
</table>';
echo $result;

?>