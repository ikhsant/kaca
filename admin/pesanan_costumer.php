<?php 
$title = 'Data Pesanan'; 
include '../include/header.php';
?>

<?php
// mengambil id costumer dari session
$id_costumer = $_SESSION['id_costumer'];


$xcrud->table('pesanan');
$xcrud->where('id_costumer =',8);
$xcrud->fields('id_barang,jumlah');
$xcrud->columns('id_barang,jumlah');
$xcrud->relation('id_barang','barang','id_barang','nama_barang');
$xcrud->unset_edit();
$xcrud->unset_remove();

$xcrud->pass_var('id_costumer', $id_costumer);
$xcrud->pass_default('id_costumer', $id_costumer);

echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>