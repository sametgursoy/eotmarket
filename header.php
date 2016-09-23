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
