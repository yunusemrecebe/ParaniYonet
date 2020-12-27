<?php
require_once 'backend/functions.php';
require_once 'backend/dbconnect.php';

if ($_SESSION['loginStatus'] == 1) {
?>
  <!DOCTYPE html>
  <html lang="TR">

  <head>
    <?php include 'headLinks.php'; ?>
    <link rel="stylesheet" href="style/hesapDetay.css" />
    <title>Paranı Yönet - Hesap</title>
  </head>

  <body>

    <div class="main-content">

    <?php include 'navbar.php'; ?>

      <input type="checkbox" id="control" />

      <div class="sidebar">
        <ul class="list-group ">
          <a href="hesapDetay.php">
            <li id="1" class="list-group-item active p-3"><i class="fas fa-money-check-alt"></i>Hesap İşlemleri</li>
          </a>
          <ul class="list-group">
            <a href="hesapDetay.php">
              <li style="margin-left: 10%" id="1" class="list-group-item active p-2 animate__animated animate__fadeIn"><i class="fas fa-file-invoice-dollar"></i>Hesap Detayları</li>
            </a>
            <a href="paraTransfer.php">
              <li style="margin-left: 10%" class="list-group-item  p-2"><i class="fas fa-exchange-alt"></i>Para Tranferi</li>
            </a>
            <a href="harcamaEkle.php">
              <li style="margin-left: 10%" class="list-group-item  p-2"><i class="fas fa-cash-register"></i>Harcama Ekle</li>
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

          <a href="" id="cikisYap" onclick="return false">
            <li class="list-group-item  p-3"><i class="fas fa-door-open"></i>Çıkış Yap</li>
          </a>
        </ul>
      </div>

      <div class="main-right">
        <div class="hesaplar">
          <button style="float: right; margin-top: -10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#hesapAc"> Hesap ekle </button>

          <h5>Hesap detayları</h5>

          <table class="table table-striped hesap-detay-table">
            <thead>
              <tr>
                <th scope="col">Hesap No</th>
                <th scope="col">Hesap Adı</th>
                <th scope="col">Hesap Türü</th>
                <th scope="col">Hesap Bakiyesi</th>
                <th scope="col">Para Birimi</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>

              <?php
              $userId = $_SESSION['userId'];

              $accountsQuery = $db->query("SELECT a.Id, a.Name, a.Type, a.Balance, a.Owner, a.Currency, u.FirstName, u.LastName FROM Accounts a JOIN Users u ON a.Owner = u.Id WHERE a.Owner = $userId");

              while ($accounts = $accountsQuery->fetch(PDO::FETCH_ASSOC)) {
                $accountId = $accounts['Id'];
                $accountName = $accounts['Name'];
                $accountType = $accounts['Type'];
                $accountBalance = $accounts['Balance'];
                $accountCurrency = $accounts['Currency'];
              ?>
                <tr>
                  <th scope="row"><?php echo $accountId; ?></th>
                  <td><?php echo $accountName; ?></td>
                  <td><?php echo $accountType; ?></td>
                  <td><?php echo $accountBalance; ?></td>
                  <td><?php echo $accountCurrency; ?></td>
                  <td class="p-1">
                    <button type="button" class="btn btn-success m-0 addBalanceButton" data-toggle="modal" data-target="#addBalance" id="<?php echo $accountId; ?>">Bakiye Ekle</button>
                  </td>
                  <td class="p-1">
                    <button type="button" class="btn btn-info m-0 editAccount" id="<?php echo $accountId; ?>">Düzenle</button>
                  </td>
                  <td class="p-1">
                    <button type="button" class="btn btn-danger m-0 delAccount" id="<?php echo $accountId; ?>">Sil</button>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>



        <!-- Hesap Oluşturma Penceresi -->
        <div class="modal fade" id="hesapAc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hesap Aç</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body ">
                <form action="" method="" id="kayitformu">
                  <label>Hesap Adı</label>
                  <input class="form-control" type="text" name="accountName" required>
                  <br>
                  <label>Bakiye</label>
                  <input type="number" class="form-control" type="text" name="accountBalance" required>
                  <br>
                  <label>Para Birimi</label>
                  <select class="custom-select m-0" id="accountCurrency">
                    <option value="TL">TL</option>
                    <option value="EURO">EURO</option>
                    <option value="USD">USD</option>
                  </select>
                  <br>
                  <label>Hesap Türü:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Nakit">
                    <label class="form-check-label" for="exampleRadios2">
                      Nakit
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Kart">
                    <label class="form-check-label" for="exampleRadios2">
                      Kart
                    </label>
                  </div>

                  <br>
                  <div class="text-center">
                    <input class="btn btn-primary" type="submit" id="kaydet" onclick="return false" value="Oluştur">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- View Deleting Data Modal -->
      <div class="modal fade" id="delViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <form action="" method="post" id="deleteForm">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hesabı Silmek İstedinize Emin Misiniz?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="delete_details">



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete">Sil</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- View Deleting Data Modal End -->
      <!-- Update Modal -->
      <div class="modal fade" id="editEmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <form action="" method="post" id="updateForm">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hesabı Düzenle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
              </div>
              <div class="modal-body" id="update_details">



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update">Kaydet</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- Update Modal End -->
      <!-- Bakiye Ekleme Penceresi -->
      <div class="modal fade" id="addBalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Bakiye Ekle</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">
              <form action="" method="" id="bakiyeFormu">
                <label>Eklenecek Miktar</label>
                <input class="form-control" type="number" name="increaseAmount" required>
                <br>
                <div class="text-center">
                  <input class="btn btn-primary" type="submit" id="addBalanceButton" onclick="return false" value="Bakiye Ekle">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Para ekleme end -->
    </div>
    </div>
    <!-- Bootstrap gerekli js kodları -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
  <script>
    $(document).ready(function() {

      $("#kaydet").click(function() { //Hesap oluşturma işlemleri

        var accountName = $("input[name=accountName]").val();
        var accountBalance = $("input[name=accountBalance]").val();
        var accountCurrency = document.getElementById('accountCurrency');
        var accountCurrency = accountCurrency.options[accountCurrency.selectedIndex].value;
        var accountType = document.querySelector('input[name="exampleRadios"]:checked').value;

        $.ajax({
          url: "backend/createAccount.php",
          type: "POST",
          data: {
            'accountName': accountName,
            'accountBalance': accountBalance,
            'accountCurrency': accountCurrency,
            'accountType': accountType
          },
          success: function(result) {
            alert(result);
            if (result == "Hesap oluşturuldu!") {
              $("#hesapAc").modal('hide');
              $("input[name=accountName]").val('');
              $("input[name=accountBalance]").val('');
              location.reload();
            }
          }
        });
      });

      $(".addBalanceButton").click(function() { //Hesap bakiye ekleme işlemleri
        var accountId = this.id;

        $("#addBalanceButton").click(function() {
          var increaseAmount = $("input[name=increaseAmount]").val();

          $.ajax({
            url: "backend/addBalance.php",
            type: "POST",
            data: {
              'increaseAmount': increaseAmount,
              'accountId': accountId
            },
            success: function(result) {
              alert(result);
              if (result == "Bakiye eklendi!") {
                $("#addBalance").modal('hide');
                $("input[name=increaseAmount]").val('');
                location.reload();
              }
            }
          });
        });
      });

      //View Deleting Account
      $(document).on('click', '.delAccount', function() {
        var accountId = $(this).attr('id');
        $.ajax({
          url: "backend/deleteViewAccount.php",
          type: "POST",
          data: {
            accountId: accountId
          },
          success: function(data) {
            $("#delete_details").html(data);
            $("#delViewModal").modal('show');
          }
        });
      });

      //Delete Account
      $(document).on('click', '#delete', function() {

        $.ajax({
          url: "backend/deleteAccount.php",
          type: "POST",
          data: $("#deleteForm").serialize(),
          success: function(data) {
            alert("Hesap başarıyla silindi!");
            $("#delViewModal").modal('hide');
            location.reload();
          }
        });
      });

      //Edit Account
      $(document).on('click', '.editAccount', function() {

        var accountId = $(this).attr('id');

        $.ajax({
          url: "backend/editAccount.php",
          type: "POST",
          data: {
            accountId: accountId
          },
          success: function(data) {
            $("#update_details").html(data);
            $("#editEmpModal").modal('show');
          }
        });

      });

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

      //Update Account
      $(document).on('click', '#update', function() {

        $.ajax({
          url: "backend/updateAccount.php",
          type: "POST",
          data: $("#updateForm").serialize(),
          success: function(data) {
            alert("Hesap başarıyla güncellendi!");
            $("#editEmpModal").modal('hide');
            location.reload();
          }
        });

      });

    });
  </script>

  </html>
<?php
} else {
  LogOutRedirect();
}
?>