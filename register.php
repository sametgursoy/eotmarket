<?php
session_start();

if($_POST) {
  require_once 'lib/settings.php';
  require_once 'lib/eotclass.php';

  $register = new User($config);
  $register->setFirstName($_POST['firstname']);
  $register->setLastName($_POST['lastname']);
  $register->setEmail($_POST['email']);
  if(!$register->comparePassword($_POST['password'],$_POST['password2']))
  {
    $_SESSION['message'] = 'Şifreniz eşleşmedi.';

  }
  else {

    if(!$register->registerUser())
    {
      $_SESSION['message'] = 'Kullanıcı kayıtlı.';
    }

  }

}
if( isset($_SESSION['user']) && $_SESSION['user']['login'] == true)  header('location:index.php');
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
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Marketplace</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Ara</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php if(! isset($_SESSION['user'])) {
          echo "<li><a href='register.php'>Üye Ol</a></li><li><a href='login.php'>Üye Giriş</a></li>";
        }
        else
        {
          if(!isset($_SESSION['store']))
          {
            echo "<li><a href='createstore.php'>Yeni Mağaza Oluştur</a></li>";
          }
          else {
            echo "<li><a href='/store.php'>Mağazam</a></li>";
          }
          echo "<li><a href='logout.php'>Çıkış</a></li>";
        }
         ?>


      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>
<div class="container">
  <div class="row">
    <div class="col-xs-12" style="text-align:center;">
      <h2>Yeni Kayıt Oluşturun !</h2>

      <div class="col-xs-12 col-md-5" style="float:none; margin:auto;text-align:left;">
        <form method="post">
        <div class="form-group">
            <label>Adınız</label>
          <input type="text" class="form-control" name="firstname" placeholder="Ad" aria-describedby="basic-addon1">
        </div>

        <div class="form-group">
            <label>Soyadınız</label>
          <input type="text" class="form-control" name="lastname" placeholder="Soyad" aria-describedby="basic-addon1">
        </div>

        <div class="form-group">
            <label>E-posta</label>
          <input type="email" class="form-control"  name="email" required placeholder="E-mail" aria-describedby="basic-addon1">
        </div>


        <div class="form-group">
            <label>Şifre</label>
          <input type="password" class="form-control" name="password" required placeholder="Şifre" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
            <label>Şifre tekrar</label>
          <input type="password" class="form-control" name="password2" required placeholder="Şifre tekrar" aria-describedby="basic-addon1">
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
