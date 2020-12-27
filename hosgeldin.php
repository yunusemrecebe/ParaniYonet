<?php
require_once 'backend/functions.php';
require_once 'backend/dbconnect.php';

if ($_SESSION['loginStatus'] == 1) {
?>
  <!DOCTYPE html>
  <html lang="TR">

  <head>
    <?php include 'headLinks.php'; ?>
    <link rel="stylesheet" href="style/hosgeldin.css" />
    <title>Paranı Yönet</title>
  </head>

  <body>
    <div class="main-content">

      <?php include 'navbar.php'; ?>

      <input type="checkbox" id="control" />

      <div class="sidebar animate__animated animate__fadeIn">
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
        <div class="pick-one">
          <img src="assets/arrowtoleft.png" />
          <h6>İşlem seçiniz</h6>
        </div>

        <div class="welcome-img-container">
          <img src="assets/savings.png" />
          <h2>Paranı Yönet Web Sitesine Hoşgeldin</h2>
          <h6>
            Paranı Yönet! Hesabını bil.
          </h6>
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