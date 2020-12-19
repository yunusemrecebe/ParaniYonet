<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/hesapIslemleri.css" />
  <link rel="icon" type="image/png" href="assets/calculate.png" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

  <title>Paranı Yönet - Hesap</title>
</head>

<body>
  <div class="main-content">
    <div class="sidebar">
      <ul class="list-group">
        <a href="hesapIslemleri.php">
          <li class="list-group-item active">Hesap İşlemleri</li>
        </a>
        <a href="hareketler.php">
          <li class="list-group-item">Hareketler</li>
        </a><a href="kategoriler.php">
          <li class="list-group-item">Kategoriler</li>
        </a>
        <a href="genelBakis.php">
          <li class="list-group-item">Genel Bakış</li>
        </a>

        <a href="kullaniciIslemleri.php">
          <li class="list-group-item">Kullanıcı İşlemleri</li>
        </a>
      </ul>
    </div>

    <div class="main-right">
      <div class="hesaplar">
        <div class="para-birimi">
          <h5>Para birimi</h5>
          <select class="custom-select m-0" id="currency">
            <option value="">TL</option>
            <option value="">EURO</option>
            <option value="">USD</option>
          </select>
        </div>

        <h5>Hesap detayları</h5>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Hesap</th>
              <th scope="col">Hesap Türü</th>
              <th scope="col">Bakiye</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">cüzdan</th>
              <td>Nakit</td>
              <td>1000tl</td>
              <td class="p-1">
                <button type="button" class="btn btn-info m-0">
                  Düzenle
                </button>
              </td>
              <td class="p-1">
                <button type="button" class="btn btn-danger m-0">Sil</button>
              </td>
            </tr>

            <tr>
              <th scope="row">ziraat</th>
              <td>Kart</td>
              <td>1320tl</td>
              <td class="p-1">
                <button type="button" class="btn btn-info m-0">
                  Düzenle
                </button>
              </td>
              <td class="p-1">
                <button type="button" class="btn btn-danger m-0">Sil</button>
              </td>
            </tr>
          </tbody>
        </table>

        <button style="float: right" type="button" class="btn btn-success" data-toggle="modal" data-target="#hesapAc">
          Hesap ekle
        </button>
      </div>

      <div class="para-tranfer">
        <h5>Para transferi</h5>

        <form class="form-inline date-form">

          <label for="sendingAccount">Gönderen hesap</label>
          <select class="custom-select m-2" id="sendingAccount">
            <option value="">ziraat</option>
            <option value="lastOneMonth">cüzdan</option>
            <option value="lastThreeMonth">Son üç ay</option>
          </select>

          <label for="gettingAccount">Alan hesap</label>
          <select class="custom-select m-2" id="gettingAccount">
            <option value="">ziraat</option>
            <option value="">garanti</option>
            <option value="">Son üç ay</option>
          </select>

          <label for="sendingAmount">Miktar</label>
          <input type="number" class="form-control m-2" id="sendingAmount" />

          <button type="submit" class="btn btn-primary my-1 m-3">ONAY</button>

        </form>
      </div>


      <div class="harcama-yap">
        <h5>Harcama Gir</h5>


        <form class="form-inline date-form">

          <label for="amountOfSpending">Miktar</label>
          <input type="number" class="form-control m-1" id="amountOfSpending" />


          <label for="curreny">Sektör</label>
          <select class="custom-select m-1" id="currency">
            <option value="">Giyim</option>
            <option value="">Restorans</option>
            <option value="">Ulaşım</option>
          </select>

          <button style="float:right" type="submit" class="btn btn-warning my-1 m-1">
            Harca
          </button>
        </form>

      </div>




      <!-- KAYIT OLMA PENCERESİ -->
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
                <input class="form-control" type="text" name="firstName" required>
                <br>
                <label>Bakiye</label>
                <input class="form-control" type="text" name="lastName" required>
                <br>
                <label>Hesap Türü:</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    Nakit
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                    Kart
                  </label>
                </div>

                <br>
                <div class="text-center">
                  <input class="btn btn-primary" type="submit" id="kaydet" onclick="return false" value="Kayıt Ol">
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>


<script>
    $(document).ready(function(){

        $("#kaydet").click(function(){//Hesap oluşturma işlemleri

            var accountName = $("input[name=firstName]").val();
            var accountBalance = $("input[name=lastName]").val();
            var accountType = $("input[name=mail]").val();

            $.ajax({
                url: "backend/createAccount.php",
                type: "POST",
                data:{
                    'accountName':accountName,
                    'accountBalance':accountBalance,
                    'accountTypes':accountType
                },
                success: function(result){
                    alert(result);
                    if (result == "Hesap Oluşturuldu!"){
                        $("#kayitol").modal('hide');
                        $("input[name=tel]").val('');
                        $("input[name=pass]").val('');
                        $("input[name=mail]").val('');
                    }
                }
            });
        });
    });
</script>