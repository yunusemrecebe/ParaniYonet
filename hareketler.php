<!DOCTYPE html>
<html lang="TR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/hareketler.css" />
    <link rel="icon" type="image/png" href="assets/calculate.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <title>Paranı Yönet - Hareketler</title>
  </head>

  <body>
    <div class="main-content">
      <div class="sidebar">
        <ul class="list-group">
          <a href="hesapDetay.php"><li class="list-group-item p-3">Hesap İşlemleri</li></a>
          <a href="hareketler.php"><li class="list-group-item p-3 active">Hareketler</li></a>
          <a href="kategoriler.php"><li class="list-group-item p-3">Kategoriler</li></a>
          <a href="genelBakis.php"><li class="list-group-item p-3">Genel Bakış</li></a>
          <a href="kullaniciIslemleri.php"><li class="list-group-item p-3">Kullanıcı İşlemleri</li></a>
        </ul>
      </div>

      <div class="main-right">
        <form class="form-inline date-form">
          <select class="custom-select m-4" id="selectLastDate">
            <option selected>Son bir ay</option>
            <option value="lastOneDay">Son bir gün</option>
            <option value="lastOneMonth">Son bir ay</option>
            <option value="lastThreeMonth">Son üç ay</option>
          </select>

          <input type="date" class="form-control m-1" id="startingDate" />

          <input type="date" class="form-control m-1" id="lastDate" />

          <button type="submit" class="btn btn-primary my-1 m-1">
            Filtrele
          </button>
        </form>

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

          <?php
          require_once 'backend/dbconnect.php';
          $userId = $_SESSION['userId'];

          $spendingsQuery = $db->query("SELECT s.Id, c.Name as Category, s.Amount, a.Name as AccountName, s.AvailableBalance,s.OldBalance,s.SpendingDate,s.Business, a.Currency as AccountCurrency FROM Accounts a JOIN Users u ON a.Owner = u.Id JOIN Spendings s ON s.Account = a.Id JOIN Categories c ON c.Id = s.Category WHERE a.Owner = $userId");

          while ($spendings = $spendingsQuery->fetch(PDO::FETCH_ASSOC)){
              $SpendingId = $spendings['Id'];
              $SpendingCategory = $spendings['Category'];
              $SpendingAmount = $spendings['Amount'];
              $SpendingAccount = $spendings['AccountName'];
              $SpendingAccountCurrency = $spendings['AccountCurrency'];
              $SpendingAvailableBalance = $spendings['AvailableBalance'];
              $SpendingOldBalance = $spendings['OldBalance'];
              $SpendingDate = $spendings['SpendingDate'];
              $SpendingBusiness = $spendings['Business'];

          ?>

            <tr>
                <th scope="row"><?php echo $SpendingId; ?></th>
                <td><?php echo $SpendingCategory; ?></td>
                <td><?php echo $SpendingAmount." ".$SpendingAccountCurrency; ?></td>
                <td><?php echo $SpendingAccount; ?></td>
                <td><?php echo $SpendingAvailableBalance." ".$SpendingAccountCurrency; ?></td>
                <td><?php echo $SpendingOldBalance." ".$SpendingAccountCurrency; ?></td>
                <td><?php echo $SpendingDate; ?></td>
                <td><?php echo $SpendingBusiness; ?></td>
            </tr>
              <?php
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
