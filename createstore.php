<?php
require_once 'lib/eotclass.php';

if(!isset($_SESSION['user'])) header('Location:login.php');

if($_POST) {

  $store = new Store($config);

  if(!$store->createStore($_SESSION['user']['id'] ,$_POST['name']))
  {
    $_SESSION['message'] = 'Mağaza zaten mevcut.';

  }
  else {
    $_SESSION['message'] = 'Mağazanız başarıyla oluşturuldu.';
    echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php\"/>";
  }

}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Marketplace</title>
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  </head>
  <body>
    <?php require_once 'header.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-xs-12" style="text-align:center;">
      <h2>Yeni Mağaza Oluştur !</h2>

      <div class="col-xs-12 col-md-5" style="float:none; margin:auto;text-align:left;">
        <form method="post">
          <div class="form-group">
              <label>E-posta</label>
            <input type="text" class="form-control"  name="name" required placeholder="Mağaza adı" aria-describedby="basic-addon1">
          </div>

          <input class="btn btn-primary" type="submit"  value="Gönder">
        </form>
        <?php
        if( isset($_SESSION['message']))
        {
           echo "<br> <div class='alert alert-info'>". $_SESSION['message'] ."</div>";
           $_SESSION['message'] = null;
        }

        ?>

      </div>





      </div>
  </div>
</div>



  </body>
</html>
