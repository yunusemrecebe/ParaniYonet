<?php
require_once 'dbconnect.php';
require_once 'functions.php';
include '../headLinks.php';
$userId = $_SESSION['userId'];
$currency = $_POST['accountCurrency'];
$result = "";

$result .='
            <div class="circle-card">
              <img src="assets/fuel.png" />
              <h4>Akaryakıt</h4>
              <h1>'.ViewSumSpendingByCategory(1,$currency).'</h1>
            </div>

            <div class="circle-card">
              <img src="assets/healt.png" />
              <h4>Sağlık</h4>
              <h1>'.ViewSumSpendingByCategory(2,$currency).'</h1>
            </div>

            <div class="circle-card">
              <img src="assets/market.png" />
              <h4>Market</h4>
              <h1>'.ViewSumSpendingByCategory(3,$currency).'</h1>
            </div>

            <div class="circle-card">
              <img src="assets/bus.png" />
              <h4>Ulaşım</h4>
              <h1>'.ViewSumSpendingByCategory(4,$currency).'</h1>
            </div>

            <div class="circle-card">
              <img src="assets/giftbox.png" />
              <h4>Hediye</h4>
              <h1>'.ViewSumSpendingByCategory(5,$currency).'</h1>
            </div>

            <div class="circle-card">
              <img src="assets/restaurant.png" />
              <h4>Restorant</h4>
              <h1>'.ViewSumSpendingByCategory(6,$currency).'</h1>
            </div>
	';

echo $result;

?>