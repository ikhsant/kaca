<?php 
$title = 'Data Costumer'; 
include '../include/header.php';
?>

<?php
$xcrud->table('barang');
$xcrud->change_type('gambar', 'image');
$xcrud->sum('jumlah');
echo $xcrud->render();
?>

<?php  
include '../include/footer.php';
?>