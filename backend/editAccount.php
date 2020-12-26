<?php

require_once 'dbconnect.php';

if (isset($_POST['accountId'])) {
    $accountId = $_POST['accountId'];

    $query = $db->query("SELECT a.Id, a.Name, a.Type, a.Balance, a.Owner, a.Currency, u.FirstName, u.LastName FROM Accounts a JOIN Users u ON a.Owner = u.Id WHERE a.Id = '$accountId'");
    while ( $data = $query->fetch(PDO::FETCH_ASSOC) ){

        $accountId = $data['Id'];
        $accountName = $data['Name'];
        $accountType = $data['Type'];
        $accountOwnerFirstName = $data['FirstName'];
        $accountOwnerLastName = $data['LastName'];
        $accountBalance = $data['Balance'];
        $accountCurrency = $data['Currency'];

    }
}
?>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="inputEmail4">Hesap Sahibi </label>
    <input type="text" class="form-control" name="accountOwner" value="<?php echo $accountOwnerFirstName." ".$accountOwnerLastName; ?>" readonly="">
</div>
<div class="form-group col-md-6">
    <label for="inputPassword4">Hesap No </label>
    <input type="text" class="form-control" name="accountId" value="<?php echo $accountId; ?>" readonly="">
</div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">Hesap Türü </label>
        <input type="text" class="form-control" name="accountType" value="<?php echo $accountType; ?>" readonly="">
    </div>
    <div class="form-group col-md-6">
        <label for="inputPassword4">Hesap Birimi</label>
        <input type="text" class="form-control" name="accountCurrency" value="<?php echo $accountCurrency; ?>" readonly="">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputPassword4">Bakiye</label>
        <input type="number" class="form-control" name="accountBalance" value="<?php echo $accountBalance; ?>" readonly="">
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4">Hesap Adı</label>
        <input type="text" class="form-control" name="accountName" value="<?php echo $accountName; ?>">
    </div>
</div>