<!DOCTYPE html>
<html lang="TR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/kategoriler.css" />
    <link href="style/fontawesome/css/all.css" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="assets/calculate.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <title>Paranı Yönet - Kategoriler</title>
  </head>

  <body>
    <div class="main-content">

      <div class="navbar">
        <div class="navbar-logo">
          <img src="assets/logo.png" />
        </div>
        <div class="navbar-control">
        <input type="checkbox" id="control"/>
        <label for="control"><i class="fas fa-bars"></i></label>
      </div>
      </div>

      <div class="sidebar">
        <ul class="list-group">
          <a href="hesapDetay.php"><li class="list-group-item p-3">Hesap İşlemleri</li></a>
          <a href="hareketler.php"><li class="list-group-item p-3">Hareketler</li></a>
          <a href="kategoriler.php"><li class="list-group-item active p-3 animate__animated animate__fadeIn">Kategoriler</li></a>
          <a href="genelBakis.php"><li class="list-group-item p-3">Genel Bakış</li></a>
          <a href="kullaniciIslemleri.php"><li class="list-group-item p-3">Kullanıcı İşlemleri</li></a>
        </ul>
      </div>

<?php
require_once 'backend/dbconnect.php';
require_once 'backend/functions.php';
?>

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
