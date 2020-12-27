<?php
require_once 'backend/functions.php';
require_once 'backend/dbconnect.php';

if ($_SESSION['loginStatus'] == 1) {
?>
  <!DOCTYPE html>
  <html lang="TR">

  <head>
    <?php include 'headLinks.php'; ?>
    <link rel="stylesheet" href="style/genelBakis.css" />
    <title>Paranı Yönet - Genel Bakış</title>
  </head>

  <body>
    <div class="main-content">

    <?php include 'navbar.php'; ?>

      <input type="checkbox" id="control" />

      <div class="sidebar">
        <ul class="list-group">
          <a href="hesapDetay.php">
            <li class="list-group-item p-3"><i class="fas fa-money-check-alt"></i>Hesap İşlemleri</li>
          </a>
          <a href="hareketler.php">
            <li class="list-group-item p-3"><i class="fas fa-search"></i>Hareketler</li>
          </a><a href="kategoriler.php">
            <li class="list-group-item p-3"><i class="fas fa-layer-group"></i>Kategoriler</li>
          </a>
          <a href="genelBakis.php">
            <li class="list-group-item p-3 active animate__animated animate__fadeIn"><i class="far fa-eye"></i>Genel Bakış</li>
          </a>

          <a href="kullaniciIslemleri.php">
            <li class="list-group-item p-3"><i class="fas fa-user-circle"></i>Kullanıcı İşlemleri</li>
          </a>

          <a href="" id="cikisYap" onclick="return false">
            <li class="list-group-item  p-3"><i class="fas fa-door-open"></i>Çıkış Yap</li>
          </a>
        </ul>
      </div>

      <div class="main-right">
        <div class="money-info-container">
          <div class="money-info-card">
            <img src="assets/spending.png" />
            <h3>Aylık Giderler</h3>
            <h1 style="color:#ED4337"><?php ViewSumSpendingByDate("MONTH") ?></h1>
          </div>
          <div class="ol-tag-week">
            <h4>Haftalık Giderler: <?php ViewSumSpendingByDate("WEEK") ?></h4>
          </div>

          <div class="ol-tag-day">
            <h4>Bugünkü giderler: <?php ViewSumSpendingByDate("DAY") ?></h4>
          </div>

          <ol style="list-style: decimal;">
            <?php ViewSpendingsByDate("DAY") ?>
          </ol>
        </div>

        <div class="money-info-container">
          <div class="money-info-card">
            <img src="assets/income.png" />
            <h3>Aylık Gelirler</h3>
            <h1 style="color:#00FF7F"><?php ViewSumIncomesByDate("MONTH"); ?></h1>
          </div>
          <div class="ol-tag-day">
            <h4>Bugünkü gelirler</h4>
          </div>

          <ol style="list-style: decimal;">
            <?php ViewIncomesByDate("DAY"); ?>
          </ol>
        </div>


      </div>
    </div>
  </body>

  </html>

  <!-- Bootstrap gerekli js kodları -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {

      //logOut 
      $("#cikisYap").click(function() {

        $.ajax({
          url: "backend/logOut.php",
          type: "GET",
          success: function(result) {
            alert("Başarıyla çıkış yaptınız!");
            window.location.href = "index.php";
          }
        });
      });
    });
  </script>
<?php
} else {
  LogOutRedirect();
}
?>