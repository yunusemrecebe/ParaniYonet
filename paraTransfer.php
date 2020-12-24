<!DOCTYPE html>
<html lang="TR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/paraTransfer.css" />
  <link href="style/fontawesome/css/all.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="assets/calculate.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Paranı Yönet - Hesap</title>
</head>

<body>
  <div class="main-content">

    <div class="navbar">
      <div class="navbar-logo">
        <img src="assets/logo.png" />
      </div>
      <div class="navbar-control">
        <label for="control"><i class="fas fa-bars"></i></label>
      </div>
    </div>

    <input type="checkbox" id="control" />

    <div class="sidebar">
      <ul class="list-group">
        <a href="hesapDetay.php">
          <li class="list-group-item active p-3 "><i class="fas fa-money-check-alt"></i>Hesap İşlemleri</li>
        </a>
        <ul class="list-group">
          <a href="hesapDetay.php">
            <li style="margin-left: 10%" class="list-group-item  p-2">Hesap Detayları</li>
          </a>
          <a href="paraTransfer.php">
            <li style="margin-left: 10%" class="list-group-item active p-2 animate__animated animate__fadeIn">Para Tranferi</li>
          </a>
          <a href="harcamaEkle.php">
            <li style="margin-left: 10%" class="list-group-item  p-2">Harcama Ekle</li>
          </a>
        </ul>
        <a href="hareketler.php">
          <li class="list-group-item p-3"><i class="fas fa-search"></i>Hareketler</li>
        </a><a href="kategoriler.php">
          <li class="list-group-item p-3"><i class="fas fa-layer-group"></i>Kategoriler</li>
        </a>
        <a href="genelBakis.php">
          <li class="list-group-item p-3"><i class="far fa-eye"></i>Genel Bakış</li>
        </a>

        <a href="kullaniciIslemleri.php">
          <li class="list-group-item p-3"><i class="fas fa-user-circle"></i>Kullanıcı İşlemleri</li>
        </a>

        <a href="backend/logOut.php" id="cikisYap" onclick="return false">
          <li class="list-group-item  p-3"><i class="fas fa-door-open"></i>Çıkış Yap</li>
        </a>
      </ul>
    </div>

    <div class="main-right">

      <div class="para-transfer">
        <h5>Para transferi</h5>

        <form id="paraTransfer">

          <label for="sendingAccount">Gönderen hesap</label>
          <select class="custom-select" id="sendingAccount">
            <?php
            require_once 'backend/dbconnect.php';
            $userId = $_SESSION['userId'];
            foreach ($db->query("SELECT * FROM Accounts WHERE Owner = $userId") as $accountName) {
              echo '<option value="' . $accountName["Id"] . '">' . $accountName["Name"] . ' (' . $accountName['Type'] . ') ' . ' (' . $accountName['Currency'] . ')' . '</option>';
            }
            ?>
          </select>
          <label for="gettingAccount">Alan hesap</label>
          <select class="custom-select" id="gettingAccount">
            <?php
            foreach ($db->query("SELECT * FROM Accounts WHERE Owner = $userId") as $accountName) {
              echo '<option value="' . $accountName["Id"] . '">' . $accountName["Name"] . ' (' . $accountName['Type'] . ') ' . ' (' . $accountName['Currency'] . ')' . '</option>';
            }
            ?>
          </select>

          <label for="sendingAmount">Miktar</label>
          <input type="number" class="form-control" name="sendingAmount" />

          <button type="submit" class="btn btn-primary my-1" id="gonder" onclick="return false">ONAY</button>

        </form>
      </div>

    </div>

  </div>

  </div>
</body>

</html>

<script>
  $(document).ready(function() {

    //logOut 
    $("#cikisYap").click(function() {

      $.ajax({
        url: "backend/logOut.php",
        type: "GET",
        success: function(result) {
          alert("Başarıyla çıkış yaptınız!");
          location.reload();
        }
      });
    });

    $("#gonder").click(function() {

      var sendingAccount = document.getElementById('sendingAccount');
      var sendingAccount = sendingAccount.options[sendingAccount.selectedIndex].value;

      var gettingAccount = document.getElementById('gettingAccount');
      var gettingAccount = gettingAccount.options[gettingAccount.selectedIndex].value;

      var sendingAmount = $("input[name=sendingAmount]").val();

      console.log(sendingAccount, gettingAccount, sendingAmount);

      $.ajax({
        url: "backend/moneyTransfer.php",
        type: "POST",
        data: {
          'sendingAccount': sendingAccount,
          'gettingAccount': gettingAccount,
          'sendingAmount': sendingAmount
        },
        success: function(result) {
          alert(result);
          if (result == "Transfer işlemi başarıyla gerçekleştirildi!") {
            $("input[name=sendingAmount]").val('');
          }
        }
      });
    });

  });
</script>