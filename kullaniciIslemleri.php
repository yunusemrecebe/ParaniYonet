<!DOCTYPE html>
<html lang="TR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/kullaniciIslemleri.css" />
  <link rel="icon" type="image/png" href="assets/calculate.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <title>Paranı Yönet - Kullanıcı</title>
</head>

<body>
  <div class="main-content">
    <div class="sidebar">
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
          <li class="list-group-item p-3">Genel Bakış</li>
        </a>

        <a href="kullaniciIslemleri.php">
          <li class="list-group-item active p-3 animate__animated animate__fadeIn">Kullanıcı İşlemleri</li>
        </a>
      </ul>
    </div>

    <div class="main-right">
      <div class="form-kullanici">
        <form>
          <div class="form-group">
            <label for="InputName">Adınız</label>
            <input type="text" class="form-control" id="InputName" placeholder="Kullanıcının mevcut adı" />
          </div>

          <div class="form-group">
            <label for="InputLastName">Soyadınız</label>
            <input type="text" class="form-control" id="InputLastName" placeholder="Kullanıcının mevcut soyadı" />
          </div>

          <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" class="form-control" id="InputEmail" placeholder="Kullanıcının mevcut maili" />
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Şifre</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
            <label class="form-check-label" for="exampleCheck1">Bilgileri doğru girdim</label>
          </div>

          <button style="margin-top: 5px; float: right" type="submit" class="btn btn-dark">
            Güncelle
          </button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>