<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php"><b><?php echo $setting['nama_website']; ?></b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if($_SESSION['akses_level'] == "admin"){ ?>
        <li><a href="index.php"><i class="fa fa-star"></i> Dashboard</a></li>
        <li><a href="barang.php"><i class="fa fa-archive"></i> Barang</a></li>
        <li><a href="pesanan.php"><i class="fa fa-shopping-cart"></i> Pesanan</a></li>
        <li><a href="costumer.php"><i class="fa fa-users"></i> Costumer</a></li>
        <li><a href="perhitungan.php"><i class="fa fa-calculator"></i> Perhitungan</a></li>
        <li><a href="user.php"><i class="fa fa-users"></i> User</a></li>
        <?php  } ?>
        <?php if($_SESSION['akses_level'] == "costumer"){ ?>
        <li><a href="pesanan_costumer.php"><i class="fa fa-shopping-cart"></i> Pesanan</a></li>
        <?php  } ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nama'] ?></a></li>
        <?php if($_SESSION['akses_level'] == "admin"){ ?>
        <li><a href="setting.php"><span class="glyphicon glyphicon-cog"></span> Setting</a></li>
        <?php  } ?>
        <li><a href="logout.php" onclick="return confirm('Yakin Keluar?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">