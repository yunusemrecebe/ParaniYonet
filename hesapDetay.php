<!DOCTYPE html>
<html lang="TR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/hesapDetay.css" />
  <link rel="icon" type="image/png" href="assets/calculate.png" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Paranı Yönet - Hesap</title>
</head>

<body>
  <div class="main-content">
    <div class="sidebar">
      <ul class="list-group">
        <a href="hesapDetay.html">
          <li class="list-group-item active p-3">Hesap İşlemleri</li>
        </a>
        <ul class="list-group">
            <a href="hesapDetay.html">
                <li style="margin-left: 10%" class="list-group-item active p-2">Hesap Detayları</li>
              </a>
              <a href="paraTransfer.html">
                <li style="margin-left: 10%" class="list-group-item  p-2">Para Tranferi</li>
              </a>
              <a href="harcamaGir.html">
                <li style="margin-left: 10%" class="list-group-item  p-2">Harcama Yapma</li>
              </a>
        </ul>
        <a href="hareketler.php">
          <li class="list-group-item p-3">Hareketler</li>
        </a><a href="kategoriler.html">
          <li class="list-group-item p-3">Kategoriler</li>
        </a>
        <a href="genelBakis.php">
          <li class="list-group-item p-3">Genel Bakış</li>
        </a>

        <a href="kullaniciIslemleri.php">
          <li class="list-group-item p-3">Kullanıcı İşlemleri</li>
        </a>
      </ul>
    </div>

    <div class="main-right">
      <div class="hesaplar">
          <button style="float: right" type="button" class="btn btn-success" data-toggle="modal" data-target="#hesapAc">
              Hesap ekle
          </button>

        <h5>Hesap detayları</h5>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Hesap No</th>
              <th scope="col">Hesap Adı</th>
              <th scope="col">Hesap Türü</th>
              <th scope="col">Hesap Sahibi</th>
              <th scope="col">Hesap Bakiyesi</th>
              <th scope="col">Para Birimi</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

          <?php
          require_once 'backend/dbconnect.php';
          $userId = $_SESSION['userId'];

            $accountsQuery = $db->query("SELECT a.Id, a.Name, a.Type, a.Balance, a.Owner, a.Currency, u.FirstName, u.LastName FROM Accounts a JOIN Users u ON a.Owner = u.Id WHERE a.Owner = $userId");

                while ($accounts = $accountsQuery->fetch(PDO::FETCH_ASSOC)){
                    $accountId = $accounts['Id'];
                    $accountName = $accounts['Name'];
                    $accountType = $accounts['Type'];
                    $accountOwnerFirstName = $accounts['FirstName'];
                    $accountOwnerLastName = $accounts['LastName'];
                    $accountBalance = $accounts['Balance'];
                    $accountCurrency = $accounts['Currency'];
          ?>
            <tr>
              <th scope="row"><?php echo $accountId; ?></th>
              <td><?php echo $accountName; ?></td>
              <td><?php echo $accountType; ?></td>
              <td><?php echo $accountOwnerFirstName." ".$accountOwnerLastName ; ?></td>
              <td><?php echo $accountBalance; ?></td>
                <td><?php echo $accountCurrency; ?></td>
              <td class="p-1">
                <button type="button" class="btn btn-info m-0">
                  Düzenle
                </button>
              </td>
              <td class="p-1">
                <button type="button" class="btn btn-danger m-0">Sil</button>
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
                <input class="form-control" type="text" name="accountBalance" required>
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

  </div>
  </div>
  <!-- Bootstrap gerekli js kodları -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


<script>
    $(document).ready(function(){

        $("#kaydet").click(function(){//Hesap oluşturma işlemleri

            var accountName = $("input[name=accountName]").val();
            var accountBalance = $("input[name=accountBalance]").val();
            var accountCurrency = document.getElementById('accountCurrency');
            var accountCurrency = accountCurrency.options[accountCurrency.selectedIndex].value;
            var accountType = document.querySelector('input[name="exampleRadios"]:checked').value;

            $.ajax({
                url: "backend/createAccount.php",
                type: "POST",
                data:{
                    'accountName':accountName,
                    'accountBalance':accountBalance,
                    'accountCurrency':accountCurrency,
                    'accountType':accountType
                },
                success: function(result){
                    alert(result);
                    if (result == "Hesap oluşturuldu!"){
                        $("#hesapAc").modal('hide');
                        $("input[name=accountName]").val('');
                        $("input[name=accountBalance]").val('');
                        location.reload();
                    }
               }
            });
        });
    });
</script>