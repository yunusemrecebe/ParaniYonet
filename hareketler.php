<?php
require_once 'backend/functions.php';
require_once 'backend/dbconnect.php';
$userId = $_SESSION['userId'];
if ($_SESSION['loginStatus'] == 1) {
?>
    <!DOCTYPE html>
    <html lang="TR">

    <head>
        <?php include 'headLinks.php'; ?>
        <link rel="stylesheet" href="style/hareketler.css" />
        <title>Paranı Yönet - Hareketler</title>
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
                    <div class="m-1">
                        <label for="From" class="m-1">Başlangıç Tarihi: </label>
                        <div class="custom-input">
                            <input type="text" id="firstDate"><i class="far fa-calendar-alt"></i>
                        </div>
                    </div>

                    <div class="m-1">
                        <label for="to" class="m-1">Bitiş Tarihi: </label>
                        <div class="custom-input">
                            <input type="text" id="secondDate"><i class="far fa-calendar-alt"></i>
                        </div>
                    </div>

                    <input type="button" id="filter" value="Filtrele" class="btn btn-primary" />
                </div>

                <br />
                <div id="filteredData">
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
                            $spendingsQuery = $db->query("SELECT s.Id, c.Name as Category, s.Amount, a.Name as AccountName, s.AvailableBalance,s.OldBalance,s.SpendingDate,s.Business, a.Currency as AccountCurrency FROM Accounts a JOIN Users u ON a.Owner = u.Id JOIN Spendings s ON s.Account = a.Id JOIN Categories c ON c.Id = s.Category WHERE a.Owner = $userId");
                            while ($row = $spendingsQuery->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $row["Id"]; ?></th>
                                    <td><?php echo $row["Category"]; ?></td>
                                    <td><?php echo $row["Amount"] . " " . $row["AccountCurrency"]; ?></td>
                                    <td><?php echo $row["AccountName"]; ?></td>
                                    <td><?php echo $row["AvailableBalance"] . " " . $row["AccountCurrency"]; ?></td>
                                    <td><?php echo $row["OldBalance"] . " " . $row["AccountCurrency"]; ?></td>
                                    <td><?php echo $row["SpendingDate"]; ?></td>
                                    <td><?php echo $row["Business"]; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
                                window.location.href = "index.php";
                            }
                        });
                    });

                    $.datepicker.setDefaults({
                        dateFormat: 'yy-mm-dd'
                    });

                    $(function() {
                        $("#firstDate").datepicker();
                        $("#secondDate").datepicker();
                    });

                    $('#filter').click(function() {
                        var firstDate = $('#firstDate').val();
                        var secondDate = $('#secondDate').val();

                        if (firstDate != '' && secondDate != '') {
                            $.ajax({
                                url: "backend/filterSpending.php",
                                method: "POST",
                                data: {
                                    firstDate: firstDate,
                                    secondDate: secondDate
                                },
                                success: function(data) {
                                    $('#filteredData').html(data);
                                }
                            });
                        } else {
                            alert("Lütfen bir tarih aralığı seçiniz!");
                        }
                    });
                });
            </script>
    </body>

    </html>
<?php
} else {
    LogOutRedirect();
}
?>