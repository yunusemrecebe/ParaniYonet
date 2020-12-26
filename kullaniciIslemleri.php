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
  <link rel="stylesheet" href="style/style.css">
  <link href="style/fontawesome/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="style/kullaniciIslemleri.css" />
  <link rel="icon" type="image/png" href="assets/calculate.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Paranı Yönet - Kullanıcı</title>
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
          <li class="list-group-item p-3"><i class="fas fa-search"></i>Hareketler</li>
        </a><a href="kategoriler.php">
          <li class="list-group-item p-3"><i class="fas fa-layer-group"></i>Kategoriler</li>
        </a>
        <a href="genelBakis.php">
          <li class="list-group-item p-3"><i class="far fa-eye"></i>Genel Bakış</li>
        </a>

        <a href="kullaniciIslemleri.php">
          <li class="list-group-item active p-3 animate__animated animate__fadeIn"><i class="fas fa-user-circle"></i>Kullanıcı İşlemleri</li>
        </a>
        <a href="" id="cikisYap" onclick="return false">
          <li class="list-group-item  p-3"><i class="fas fa-door-open"></i>Çıkış Yap</li>
        </a>
      </ul>
    </div>

<?php
$userId = $_SESSION['userId'];
$userInfo = $db->query("SELECT * FROM Users WHERE Id = $userId")->fetch(PDO::FETCH_ASSOC);

?>

    <div class="main-right">
      <div class="form-kullanici">
        <form>
          <div class="form-group">
            <label for="InputName">Adınız</label>
            <input type="text" class="form-control" id="InputName" value="<?php echo $userInfo['FirstName']; ?>"/>
          </div>

          <div class="form-group">
            <label for="InputLastName">Soyadınız</label>
            <input type="text" class="form-control" id="InputLastName" value="<?php echo $userInfo['LastName']; ?>"/>
          </div>

          <div class="form-group">
            <label for="InputEmail">Email</label>
            <input type="email" class="form-control" id="InputEmail" value="<?php echo $userInfo['Email']; ?>"/>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Şifre</label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $userInfo['Password']; ?>"/>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">GSM</label>
            <input type="number" class="form-control" id="exampleInputPassword1" value="<?php echo $userInfo['GSM']; ?>"/>
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

<!-- Bootstrap gerekli js kodları -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
  });
</script>
    <?php
}
else{
    LogOutRedirect();
}
?>