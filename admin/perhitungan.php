<?php 
$title = 'Data Perhitungan'; 
include '../include/header.php';
?>

<div class="alert alert-info">
	RUMUS:
	<br>
	Y = a + b1 . x1 + b2 . x2
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		PERHITUNGAN PREDIKSI
	</div>
	<form method="post">
		<div class="panel-body">
			<div class="col-md-6">
				<div class="form-group">
					<label>Parameter Penjumlahan</label>
					<input type="text" name="x1" class="form-control" value="NOMINAL" readonly>
				</div>

				<div class="form-group">
					<label>Pembelian Barang (X1)</label>
					<input type="number" name="x1" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Jumlah Barang Terjual (X2)</label>
					<input type="number" name="x2" class="form-control" required>
				</div>

				<div class="form-group">
					<label>(X3)</label>
					<input type="number" name="x3" class="form-control" required>
				</div>

			</div>

			<div class="col-md-6">
				<div class="form-group">	
					<label>Konstanta</label>
					<input type="number" name="konstanta" class="form-control" value="1125754051" readonly>
				</div>

				<div class="form-group">	
					<label>b1</label>
					<input type="number" name="b1" class="form-control" value="-3.426" readonly>
				</div>

				<div class="form-group">	
					<label>b2</label>
					<input type="number" name="b2" class="form-control" value="1248692.183" readonly>
				</div>
				<div class="form-group">	
					<label>b3</label>
					<input type="number" name="b3" class="form-control" value="-207808.825" readonly>
				</div>
			</div>
		</div>
		<div class="panel-footer text-center">
			<button class="btn btn-success btn-lg" type="submit" name="submit"><i class="fa fa-save"></i> HITUNG</button>
		</div>
	</form>
</div>

<?php  
if (isset($_POST['submit'])) {
	$x1 = $_POST['x1'];
	$x2 = $_POST['x2'];
	$x3 = $_POST['x3'];
	$b1 = $_POST['b1'];
	$b2 = $_POST['b2'];
	$b3 = $_POST['b3'];
	$konstanta = $_POST['konstanta'];

	$y = $konstanta + ($b1 * $x1) + ($b2 * $x2) + ($b3 * $x3);

	echo '<div class="alert alert-success"><h3>HASIL Y = '.$y.'</h3></div>';
	
}
?>

<?php  
include '../include/footer.php';
?>