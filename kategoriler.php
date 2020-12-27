<?php
require_once 'backend/functions.php';
require_once 'backend/dbconnect.php';

if ($_SESSION['loginStatus'] == 1) {
?>
  <!DOCTYPE html>
  <html lang="TR">

  <head>
    <?php include 'headLinks.php'; ?>
    <link rel="stylesheet" href="style/kategoriler.css" />
    <title>Paranı Yönet - Kategoriler</title>
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
          </a>
          <a href="kategoriler.php">
            <li class="list-group-item active p-3 animate__animated animate__fadeIn"><i class="fas fa-layer-group"></i>Kategoriler</li>
          </a>
          <a href="genelBakis.php">
            <li class="list-group-item p-3"><i class="far fa-eye"></i>Genel Bakış</li>
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

        <div class="circle-card">
          <img src="assets/fuel.png" />
          <h4>Akaryakıt</h4>
          <h1>
            <?php ViewSumSpendingByCategory(1); ?></h1>
        </div>

        <div class="circle-card">
          <img src="assets/healt.png" />
          <h4>Sağlık</h4>
          <h1><?php ViewSumSpendingByCategory(2); ?></h1>
        </div>

        <div class="circle-card">
          <img src="assets/market.png" />
          <h4>Market</h4>
          <h1><?php ViewSumSpendingByCategory(3); ?></h1>
        </div>

        <div class="circle-card">
          <img src="assets/bus.png" />
          <h4>Ulaşım</h4>
          <h1><?php ViewSumSpendingByCategory(4); ?></h1>
        </div>

        <div class="circle-card">
          <img src="assets/giftbox.png" />
          <h4>Hediye</h4>
          <h1><?php ViewSumSpendingByCategory(5); ?></h1>
        </div>

        <div class="circle-card">
          <img src="assets/restaurant.png" />
          <h4>Restorant</h4>
          <h1><?php ViewSumSpendingByCategory(6); ?></h1>
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