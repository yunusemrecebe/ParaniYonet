<?php

require_once 'dbconnect.php';

if (isset($_POST['accountId'])) {
    $accountId = $_POST['accountId'];


    $query = $db->query("SELECT * FROM Accounts WHERE Id = $accountId");

    while ( $data = $query->fetch(PDO::FETCH_ASSOC) ){

        $accountId = $data['Id'];
        $accountName = $data['Name'];
        $accountType = $data['Type'];
        $accountBalance = $data['Balance'];
        $accountCurrency = $data['Currency'];

    }
}
?>

<input type="hidden" name="accountId" value="<?php echo $accountId; ?>">
<div class="form-group">
    <label><b>Hesap No :</b> <?php echo $accountId; ?></label>
</div>
<div class="form-group">
    <label><b>Hesap Adı :</b> <?php echo $accountName; ?></label>
</div>
<div class="form-group">
    <label><b>Hesap Tipi :</b> <?php echo $accountType; ?></label>
</div>
<div class="form-group">
    <label><b>Hesap Bakiyesi :</b> <?php echo $accountBalance; ?></label>
</div>
<div class="form-group">
    <label><b>Para Birimi :</b> <?php echo $accountCurrency; ?></label>
</div>
