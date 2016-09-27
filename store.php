<?php
require_once 'lib/eotclass.php';

if(!isset($_SESSION['user'])) header('Location:login.php');
if(!isset($_SESSION['store'])) header('Location:createstore.php');


$store = new Store($config);
$storeItems = $store->getStoreItems($_SESSION['store']['id']);
$storeName = $_SESSION['store']['name'];
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
      <h2><?=$storeName?></h2>

      <div class="col-xs-12 col-md-5" style="float:none; margin:auto;text-align:left;">

        <?php
          while ($items = $storeItems->fetch_assoc())
          {
            $product = new Product($config);
            $mypro = $product->getProduct($items['id']);
            ?>
            <div class="col-xs-4">
              <p><?=$mypro['name']?></p>
              <p><a href="product.php?id=<?=$mypro['id']?>"><img src="<?=$mypro['photo']?>"></a></p>
              <p><a href="<?=$mypro['url']?>" target="_blank"><span>Ürüne Git</span></a></p>
            </div>

          <?php
          }
        ?>

      </div>



      </div class="col-xs-12 col-md-5" >
      <button onclick="location.href='addproduct.php'" class="btn btn-info">Ürün Ekle</button>
      <div>
  </div>
</div>



  </body>
</html>
