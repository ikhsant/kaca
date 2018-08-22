<?php 
$title = 'Data Pesanan'; 
include '../include/header.php';
?>

<?php
$xcrud->table('pesanan');
$xcrud->relation('id_barang','barang','id_barang','nama_barang');
$xcrud->relation('id_costumer','costumer','id_costumer','nama');
$xcrud->sum('jumlah');

echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>