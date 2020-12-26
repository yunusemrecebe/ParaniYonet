<?php
require_once 'backend/functions.php';
require_once 'backend/dbconnect.php';

if ($_SESSION['loginStatus']==1){
?>
<!DOCTYPE html>
<html lang="TR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style/fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/hareketler.css" />
    <link rel="icon" type="image/png" href="assets/calculate.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Paranı Yönet - Hareketler</title>
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
                    <li class="list-group-item p-3"><i class="fas fa-money-check-alt"></i>Hesap İşlemleri</li>
                </a>
                <a href="hareketler.php">
                    <li class="list-group-item p-3 active animate__animated animate__fadeIn"><i class="fas fa-search"></i>Hareketler</li>
                </a>
                <a href="kategoriler.php">
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

            <div class="date-form">
                <form action="">
                    <label for="datepicker" class="m-1">Başlangıç Tarihi: </label>
                    <div>
                        <input type="text" name="datepickerFirst" id="datepickerFirst"><i class="far fa-calendar-alt"></i>
                    </div>

                    <label for="datepicker" class="m-1">Bitiş Tarihi: </label>
                    <div>
                        <input type="text" name="datepickerLast" id="datepickerLast"><i class="far fa-calendar-alt"></i>
                    </div>

                    <input type="button" id="filter" value="Filtrele" class="btn btn-primary m-1" />
                </form>
            </div>

            <div id="showFilteredData">
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
                        $userId = $_SESSION['userId'];

                        $spendingsQuery = $db->query("SELECT s.Id, c.Name as Category, s.Amount, a.Name as AccountName, s.AvailableBalance,s.OldBalance,s.SpendingDate,s.Business, a.Currency as AccountCurrency FROM Accounts a JOIN Users u ON a.Owner = u.Id JOIN Spendings s ON s.Account = a.Id JOIN Categories c ON c.Id = s.Category WHERE a.Owner = $userId");

                        while ($spendings = $spendingsQuery->fetch(PDO::FETCH_ASSOC)) {
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
                                <td><?php echo $SpendingAmount . " " . $SpendingAccountCurrency; ?></td>
                                <td><?php echo $SpendingAccount; ?></td>
                                <td><?php echo $SpendingAvailableBalance . " " . $SpendingAccountCurrency; ?></td>
                                <td><?php echo $SpendingOldBalance . " " . $SpendingAccountCurrency; ?></td>
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
    </div>
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<!-- Script -->
<script>
    $(document).ready(function() {
        
        //logOut 
        $("#cikisYap").click(function() {

            $.ajax({
                url: "backend/logOut.php",
                type: "GET",
                success: function(result) {
                    alert("Başarıyla çıkış yaptınız!");
                    window.location.href="index.php";
                }
            });
        });

        $("#datepickerFirst").datepicker({
            showSecond: true,
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
        });

        $("#datepickerLast").datepicker({
            showSecond: true,
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
        });

        $('#filter').click(function() {
            var datepickerFirst = $('#datepickerFirst').val();
            var datepickerLast = $('#datepickerLast').val();
            console.log(datepickerFirst, datepickerLast);
            if (datepickerFirst != '' && datepickerLast != '') {
                $.ajax({
                    url: "backend/filterSpending.php",
                    method: "POST",
                    data: {
                        datepickerFirst: datepickerFirst,
                        datepickerLast: datepickerLast
                    },
                    success: function(data) {
                        $('#showFilteredData').html(data);
                    }
                });
            } else {
                alert("Please Select a Date");
            }
        });
    });
</script>
    <?php
}
else{
    LogOutRedirect();
}
?>