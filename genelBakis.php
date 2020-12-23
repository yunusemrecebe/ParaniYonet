<!DOCTYPE html>
<html lang="TR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/genelBakis.css" />
  <link rel="stylesheet" href="style/style.css">
  <link href="style/fontawesome/css/all.css" rel="stylesheet"> 
  <link rel="icon" type="image/png" href="assets/calculate.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <title>Paranı Yönet - Genel Bakış</title>
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

    <div class="sidebar ">
      <ul class="list-group">
        <a href="hesapDetay.php">
          <li class="list-group-item p-3">Hesap İşlemleri</li>
        </a>
        <a href="hareketler.php">
          <li class="list-group-item p-3">Hareketler</li>
        </a><a href="kategoriler.php">
          <li class="list-group-item p-3">Kategoriler</li>
        </a>
        <a href="genelBakis.php">
          <li class="list-group-item p-3 active animate__animated animate__fadeIn">Genel Bakış</li>
        </a>

        <a href="kullaniciIslemleri.php">
          <li class="list-group-item p-3">Kullanıcı İşlemleri</li>
        </a>
      </ul>
    </div>

<?php
require_once 'backend/functions.php';
?>

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