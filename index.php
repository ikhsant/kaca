<?php  
session_start();
include 'include/database.php';
$setting = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * FROM setting LIMIT 1'));

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)){echo $title.' - '; }?><?php echo $setting['nama_website']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="logo.png">
	<link rel="stylesheet" href="assets/css/lumen-bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="index.php"><?php echo $setting['nama_website']; ?></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php">Produk</a></li>
					<li><a href="kontak.php">Kontak</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="admin/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron">
		<div class="container">
			<h1 class="text-center">Penjualan Kaca termurah se Sukabumi !!</h1>
		</div>
	</div>

	

	<div class="container">

		<?php 
// notif pesan
if (!empty($_SESSION['pesan'])) { ?>
	<div class="alert alert-success">
		<h2><i class="fa fa-check"></i> <?php echo $_SESSION['pesan']; ?></h2>
	</div>
	<br>
	<?php 
	$_SESSION['pesan'] = '';
} 

// notif pesan ewrror
if (!empty($_SESSION['error'])) { ?>
	<div class="alert alert-danger">
		<h2><i class="fa fa-check"></i> <?php echo $_SESSION['error']; ?></h2>
	</div>
	<br>
	<?php 
	$_SESSION['error'] = '';
} 
?>

		<div class="row">
			<?php  
			$barang = mysqli_query($conn,"SELECT * FROM barang ORDER BY id_barang");

		//Columns must be a factor of 12 (1,2,3,4,6,12)
			$numOfCols = 3;
			$rowCount = 0;
			$bootstrapColWidth = 12 / $numOfCols;

			foreach($barang as $barang){
				?>
				<div class="col-md-4">
					<div class="panel panel-primary">
						<img src="uploads/<?php echo $barang['gambar'] ?>" width="100%">
						<div class="panel-body">
							<h4><b><?php echo $barang['nama_barang'] ?></b></h4>
							<p>Harga : Rp. <b><?php echo $barang['harga'] ?></b></p>
							<p class="rig">Stok : <span class="label label-primary"><?php echo $barang['jumlah'] ?></span></p>
							<br>
							<p><?php echo $barang['keterangan'] ?></p>
							<button class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $barang['id_barang'] ?>"><i class="fa fa-cart"></i> BELI</button>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div id="myModal<?php echo $barang['id_barang'] ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Beli <?php echo $barang['nama_barang'] ?></h4>
							</div>
							<form method="post">

								<div class="modal-body">
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" type="text" name="nama" required>
									</div>
									<div class="form-group">
										<label>Telp</label>
										<input class="form-control" type="text" name="telp" required>
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<textarea class="form-control" name="alamat" required></textarea>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" type="email" name="email" required>
									</div>
									<div class="form-group">
										<label>Jumalah Pesanan</label>
										<input class="form-control" type="number" name="jumlah" required>
										<input type="hidden" name="id_barang" value="<?php echo $barang['id_barang'] ?>">
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary" name="submit">BELI</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</form>

						</div>

					</div>
				</div>
				<?php
				$rowCount++;
				if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
			}
			?>


		</div>

<?php  
if (isset($_POST['submit'])) {
	$id_barang = $_POST['id_barang'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$jumlah = $_POST['jumlah'];

	// mengecek email sudah terdaftar
	$query_cek = mysqli_query($conn,"SELECT * FROM costumer WHERE email = '$email' ");

	if (mysqli_num_rows($query_cek) > 0) {
		$_SESSION['error']	= "Email Sudah terdaftar, silahkan login atau gunakan email lain";
		echo '<meta http-equiv="refresh" content="0"; URL="stok.php" />';
	}else{
		// menyimpan ke database
		mysqli_query($conn,"INSERT INTO costumer (nama,alamat,email,telp) VALUES ('$nama','$alamat','$email','$telp')");
		// menyimpan id terakhir
		$id_costumer = mysqli_insert_id($conn);
		// menyimpan ke tabel pesanan
		mysqli_query($conn,"INSERT INTO pesanan (id_costumer,id_barang,jumlah) VALUES ('$id_costumer','$id_barang','$jumlah')");

		// set sukses
		$_SESSION['pesan']  = "Pembelian berhasil, Silahkan login dengan <br> Email:".$email."<br>Password: 123456";

		// redireck
		echo '<meta http-equiv="refresh" content="0"; URL="stok.php" />';

	}

	
}
?>

	</body>
	</html>
