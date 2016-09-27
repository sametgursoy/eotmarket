<?php

require_once 'lib/eotclass.php';

if(!isset($_SESSION['user'])) header('Location:login.php');
if(!isset($_SESSION['store'])) header('Location:createstore.php');

if($_POST) {

  if(!is_numeric($_POST['price']))
  {
    $_SESSION['message'] = 'Fiyat hatalı.';
  }
  else {

    $product = new Product();
    $product->setName($_POST['name']);
    $product->setPrice($_POST['price']);
    $product->setStore($_SESSION['store']['id']);
    $product->setPhoto($_POST['photo']);
    $product->setUrl($_POST['url']);
    $product->createProduct();
    $_SESSION['message'] = 'Ürün kayıt edildi.';
    header('Location:store.php');
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
     <?php require_once 'utils/message.php'; ?>
     <div class="container">
       <div class="row">
         <div class="col-xs-12" style="text-align:center;">
           <h2>Yeni Ürün Ekle</h2>


           <div class="col-xs-12 col-md-5" style="float:none; margin:auto;text-align:left;">
             <form method="post">
               <div class="form-group">
                   <label>Ürün Adı</label>
                 <input type="text" class="form-control"  name="name" required placeholder="Ürün adı" aria-describedby="basic-addon1">
               </div>
               <div class="form-group">
                   <label>Fiyat</label>
                 <input type="text" class="form-control"  name="price" required placeholder="Ürün adı" aria-describedby="basic-addon1">
               </div>
               <div class="form-group">
                   <label>Fotoğraf</label>
                 <input type="text" class="form-control"  name="photo" required placeholder="Ürün adı" aria-describedby="basic-addon1">
               </div>
               <div class="form-group">
                   <label>Ürün Link</label>
                 <input type="text" class="form-control"  name="url" required placeholder="Ürün adı" aria-describedby="basic-addon1">
               </div>

               <input class="btn btn-primary" type="submit"  value="Gönder">
             </form>
           </div>




           </div>
       </div>
     </div>

   </body>
 </html>
