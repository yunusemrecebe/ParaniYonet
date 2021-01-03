<?php
require_once 'dbconnect.php';
require_once 'functions.php';

$userId = $_SESSION['userId'];
$currency = $_POST['accountCurrency'];
$result = "";

$result .='
           <div class="money-info-container">
              <div class="money-info-card">
                <img src="assets/spending.png" />
                <h3>Aylık Giderler</h3>
                <h1 style="color:#ED4337">'. ViewSumSpendingByDate("MONTH",$currency).'</h1>
              </div>
              <div class="ol-tag-week">
                <h4>Haftalık Giderler: '.ViewSumSpendingByDate("WEEK",$currency).'</h4>
              </div>

              <div class="ol-tag-day">
                <h4>Bugünkü giderler: '.ViewSumSpendingByDate("DAY",$currency).'</h4>
              </div>

              <ol style="list-style: decimal;">
              '.ViewSpendingsByDate("DAY",$currency).'
              </ol>
            </div>

            <div class="money-info-container">
              <div class="money-info-card">
                <img src="assets/income.png" />
                <h3>Aylık Gelirler</h3>
                <h1 style="color:#00FF7F">'.ViewSumIncomesByDate("MONTH",$currency).'</h1>
              </div>
              <div class="ol-tag-day">
                <h4>Bugünkü gelirler</h4>
              </div>

              <ol style="list-style: decimal;">
                '.ViewIncomesByDate("DAY",$currency).'
              </ol>
            </div>
	';

echo $result;

?>