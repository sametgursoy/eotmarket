<?php
session_start();
require_once 'lib/settings.php';
require_once 'lib/eotclass.php';

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

            echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Profil <span class='caret'></span></a><ul class='dropdown-menu'><li><a href='products.php'>Ürünlerim</a></li><li><a href='createstore.php'>Yeni Mağaza Oluştur</a></li><li><a href='logout.php'>Çıkış</a></li></ul></li>";
          }

          else {
            echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Profil <span class='caret'></span></a><ul class='dropdown-menu'><li><a href='products.php'>Ürünlerim</a></li><li><a href='store.php'>Mağazam</a></li><li><a href='logout.php'>Çıkış</a></li></ul></li>";
          }
        }
         ?>




      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


    <div class="container">
      <div class="row">
        <div class="col-xs-12" style="text-align:center;">
          <h2>Son Eklenenler</h2>

          </div>
      </div>
    </div>

  </body>
</html>
