<!DOCTYPE html>
<html lang="TR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/harcamaGir.css" />
  <link rel="icon" type="image/png" href="assets/calculate.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Paranı Yönet - Hesap</title>
</head>

<body>
  <div class="main-content">
    <div class="sidebar">
      <ul class="list-group">
        <a href="hesapDetay.php">
          <li class="list-group-item active p-3 ">Hesap İşlemleri</li>
        </a>
        <ul class="list-group">
          <a href="hesapDetay.php">
            <li style="margin-left: 10%" class="list-group-item p-2">Hesap Detayları</li>
          </a>
          <a href="paraTransfer.php">
            <li style="margin-left: 10%" class="list-group-item p-2">Para Tranferi</li>
          </a>
          <a href="harcamaGir.php">
            <li style="margin-left: 10%" class="list-group-item active p-2 animate__animated animate__fadeIn">Harcama Ekle</li>
          </a>
        </ul>
        <a href="hareketler.php">
          <li class="list-group-item p-3">Hareketler</li>
        </a>
        <a href="kategoriler.php">
          <li class="list-group-item p-3">Kategoriler</li>
        </a>
        <a href="genelBakis.php">
          <li class="list-group-item p-3">Genel Bakış</li>
        </a>
        <a href="kullaniciIslemleri.php">
          <li class="list-group-item p-3">Kullanıcı İşlemleri</li>
        </a>
      </ul>
    </div>

    <div class="main-right">
      <div class="harcama-yap">
        <h5>Harcama Ekle</h5>

        <form>
          <div class="form-group">
            <label for="spendingAccount">Kullanılan Hesap</label>
            <select id="spendingAccount" class="form-control">
              <?php
              require_once 'backend/dbconnect.php';
              $userId = $_SESSION['userId'];
              foreach ($db->query("SELECT * FROM Accounts WHERE Owner = $userId") as $accountName) {
                echo '<option value="' . $accountName["Id"] . '">' . $accountName["Name"] . ' (' . $accountName['Type'] . ') ' . ' (' . $accountName['Currency'] . ')' . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="spendingAmount">Tutar</label>
            <input type="number" class="form-control" name="spendingAmount" placeholder="Örneğin:1000" />
          </div>

          <div class="form-group">
            <label for="spendingCategory">Kategori</label>
            <select id="spendingCategory" class="form-control">
              <?php
              foreach ($db->query("SELECT * FROM Categories") as $categories) {
                echo '<option value="' . $categories["Id"] . '">' . $categories["Name"] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="spendingBusiness">İşletme</label>
            <input type="text" class="form-control" name="spendingBusiness" placeholder="Örneğin: YESODE" />
          </div>

          <button style="float: right" type="submit" class="btn btn-warning my-1 m-1" id="harca" onclick="return false;">Harca</button>
        </form>
      </div>

    </div>
  </div>
</body>

</html>

<script>
  $(document).ready(function() {

    $("#harca").click(function() {

      var spendingAccount = document.getElementById('spendingAccount');
      var spendingAccount = spendingAccount.options[spendingAccount.selectedIndex].value;

      var spendingCategory = document.getElementById('spendingCategory');
      var spendingCategory = spendingCategory.options[spendingCategory.selectedIndex].value;

      var spendingBusiness = $("input[name=spendingBusiness]").val();
      var spendingAmount = $("input[name=spendingAmount]").val();

      console.log(spendingAccount, spendingCategory, spendingBusiness, spendingAmount);

      $.ajax({
        url: "backend/createSpending.php",
        type: "POST",
        data: {
          'account': spendingAccount,
          'category': spendingCategory,
          'business': spendingBusiness,
          'amount': spendingAmount
        },
        success: function(result) {
          alert(result);
          if (result == "Harcama başarıyla eklendi!") {
            $("input[name=spendingBusiness]").val('');
            $("input[name=spendingAmount]").val('');
          }
        }
      });
    });

  });
</script>