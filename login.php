<?php
session_start();

if($_POST) {
  require_once 'lib/settings.php';
  require_once 'lib/eotclass.php';

  $login = new User($config);
  $store = new Store($config);


  if(!$login->loginWithPassword($_POST['email'],$_POST['password']))
  {
    $_SESSION['message'] = 'Oturum başarısız.';

  }
  else {
    $store->checkStore($login->getId());
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
     <?php require_once 'header.php'; ?>
     <?php require_once 'utils/message.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12" style="text-align:center;">
      <h2>Oturum Açın !</h2>

      <div class="col-xs-12 col-md-5" style="float:none; margin:auto;text-align:left;">
        <form method="post">
          <div class="form-group">
              <label>E-posta</label>
            <input type="email" class="form-control"  name="email" required placeholder="E-mail" aria-describedby="basic-addon1">
          </div>

          <div class="form-group">
              <label>Şifre</label>
            <input type="password" class="form-control" name="password" required placeholder="Şifre" aria-describedby="basic-addon1">
          </div>


          <input class="btn btn-primary" type="submit"  value="Gönder">
        </form>
      </div>





      </div>
  </div>
</div>



  </body>
</html>
