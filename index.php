<?php
require_once 'backend/dbconnect.php';
$_SESSION['userId']=null;
$_SESSION['loginStatus']=null;
?>
<!doctype html>
<html lang="TR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Paranı Yönet!</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://kit.fontawesome.com/ac794817c2.js"></script>
</head>

<body class="bg-light">
	<div class="container">
		<div class="text-center my-5 ">
    		<h1 style="font-size:300%;"> Paranı Yönet ve Hesabını Bil </h1>
  		</div>
    
    <!-- GİRİŞ YAPMA EKRANI -->
    <div class="row my-5">
      <div class="my-5 col-md-4 offset-md-4 ">
        
        <div class="card my-5">
          <div class="card-header">
            <div class="row">
              
              <div class="col-md-3">
                <h3><span class="fa fa-sign-in fa-2x"></span></h3>
              </div>
              <div class="col-md-9 text-right">
                <h2>Giriş Yap</h2>
                <small>Harcamalarını Yönet!</small>
              </div>  
                        
            </div>
          </div>
          
          <div class="card-body">
            <form action="" method="">
						
              <label>E-Mail Adresiniz</label>
              <input class="form-control" type="email" name="loginMail" placeholder="E-Mail" required>
              
              <label style="margin-top: 10px;">Şifreniz</label> 
              <input class="form-control" style="margin-bottom: 20px;" type="password" name="loginPassword" placeholder="Şifre" required>
            
          </div>

          <div class="card-footer text-muted text-center">
            <button type="submit" id="login" class="btn btn-primary" onclick="return false">Giriş Yap</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kayitol"> Kayıt Ol </button>
          </form>
          </div>
          
        </div>
        <h6 class="text-center"><a class="text-muted" href="https://github.com/yunusemrecebe/ParaniYonet" target="_blank">Yunus Emre CEBE ve Emirhan KARAHAN tarafından hazırlandı.</a></h6>
      </div>
    </div>
		
			
			<!-- KAYIT OLMA PENCERESİ -->
        <div class="modal fade" id="kayitol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kayıt Ol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="" id="kayitformu">
                            <label>Ad</label>
                            <input class="form-control" type="text" name="firstName" required>
                            <label>Soyad</label>
                            <input class="form-control" type="text" name="lastName" required>
                            <label>Mail Adresi</label>
                            <input class="form-control" type="email" name="mail" required>
                            <label>Şifreniz</label>
                            <input class="form-control" type="password" name="pass" required>
                            <label>Telefon <small style="color:darkgray;">(5xxxxxxxxx şeklinde 10 haneli olacak şekilde giriniz)</small></td></label>
                            <input class="form-control" type="text" pattern="\d{10}" name="tel" required>

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

		<!-- Bootstrap gerekli js kodları -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	</body>
	</html>

<script>
    $(document).ready(function(){

            $("#kaydet").click(function(){//üye kayıt işlemleri

                var firstName = $("input[name=firstName]").val();
                var lastName = $("input[name=lastName]").val();
                var mail = $("input[name=mail]").val();
                var password = $("input[name=pass]").val();
                var gsm = $("input[name=tel]").val();


            $.ajax({
                url: "backend/userRegistration.php",
                type: "POST",
                data:{
                    'firstName':firstName,
                    'lastName':lastName,
                    'mail':mail,
                    'password':password,
                    'gsm':gsm
                },
                success: function(result){
                    alert(result);
                    if (result == "Kayıt Başarılı!"){
                        $("#kayitol").modal('hide');
                        $("input[name=tel]").val('');
                        $("input[name=pass]").val('');
                        $("input[name=mail]").val('');
                        $("input[name=lastName]").val('');
                        $("input[name=firstName]").val('');
                    }
                }
            });
        });



    $("#login").click(function(){//üye giriş işlemleri

        var mail = $("input[name=loginMail]").val();
        var password = $("input[name=loginPassword]").val();
        console.log(mail,password);

        $.ajax({
            url: "backend/userCheck.php",
            type: "POST",
            data:{
                'userMail':mail,
                'userPassword':password
            },
            success: function(result){
                alert(result);
                if (result!="Mail adresi veya Şifre hatalı!" && result!="Lütfen bilgileri eksiksiz olarak doldurunuz!"){
                location.href= "hosgeldin.php";
                }
            }
        });
    });

    });
</script>
