<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style/hareketler.css" />
    <link rel="icon" type="image/png" href="../assets/calculate.png"/>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <title>Paranı Yönet - Hareketler</title>
  </head>

  <body>
    <div class="main-content">
      <div class="sidebar">
        <ul class="list-group">
          <a href="hesapIslemleri.php"
            ><li class="list-group-item">Hesap İşlemleri</li></a
          >
          <a href="hareketler.php"
            ><li class="list-group-item active">Hareketler</li></a
          ><a href="kategoriler.php"
            ><li class="list-group-item">Kategoriler</li></a
          >
          <a href="genelBakis.php"><li class="list-group-item ">Genel Bakış</li></a>

          <a href="kullaniciIslemleri.php"
            ><li class="list-group-item">Kullanıcı İşlemleri</li></a
          >
        </ul>
      </div>

      <div class="main-right">
        <form class="form-inline date-form">
          <select class="custom-select m-4" id="selectLastDate">
            <option selected>Son bir ay</option>
            <option value="lastOneDay">Son bir gün</option>
            <option value="lastOneMonth">Son bir ay</option>
            <option value="lastThreeMonth">Son üç ay</option>
          </select>

          <input type="date" class="form-control m-1" id="startingDate" />

          <input type="date" class="form-control m-1" id="lastDate" />

          <button type="submit" class="btn btn-primary my-1 m-1">
            Filtrele
          </button>
        </form>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Sektör</th>
              <th scope="col">Miktar</th>
              <th scope="col">Tarih</th>
              <th scope="col">Yer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
