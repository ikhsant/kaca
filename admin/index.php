<?php  
include '../include/header.php';
?>

<?php 
// notif pesan
if (!empty($_SESSION['pesan'])) { ?>
	<div class="alert alert-success">
		<i class="fa fa-check"></i> <?php echo $_SESSION['pesan']; ?>
	</div>
	<br>
	<?php 
	$_SESSION['pesan'] = '';
} 

// notif pesan ewrror
if (!empty($_SESSION['error'])) { ?>
	<div class="alert alert-danger">
		<i class="fa fa-check"></i> <?php echo $_SESSION['error']; ?>
	</div>
	<br>
	<?php 
	$_SESSION['error'] = '';
} 
?>

<?php 
if($_SESSION['akses_level'] == "admin"){

$barang = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM barang"));
$costumer = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM costumer"));
$pesanan = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pesanan"));
$barang_jumlah = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(jumlah) as total FROM barang"));

?>
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-archive fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 50px"><?php echo $barang ?></span>
                    <div>Produk Kaca</div>
                </div>
            </div>
        </div>
        <a href="barang.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 50px"><?php echo $barang_jumlah['total'] ?></span>
                    <div>Jumlah Barang</div>
                </div>
            </div>
        </div>
        <a href="barang.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 50px"><?php echo $costumer ?></span>
                    <div>Costumer</div>
                </div>
            </div>
        </div>
        <a href="costumer.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-truck fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <span style="font-size: 50px"><?php echo $pesanan ?></span>
                    <div>Pesanan</div>
                </div>
            </div>
        </div>
        <a href="pesanan.php">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
<?php  } ?>

<?php  
include '../include/footer.php';
?>