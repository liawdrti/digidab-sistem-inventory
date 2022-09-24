<?php
include("connection.php");


$id_product = $_POST['id_product'];
$update = mysqli_query($conn, "UPDATE tb_product SET name_product='$_POST[name_product]', 
stock_product='$_POST[stock_product]', cost_price='$_POST[cost_price]', selling_price='$_POST[selling_price]', 
notes_product='$_POST[notes_product]' WHERE id_product='$id_product'");

if ($update) {
    echo "<script>alert('Data Berhasil Disimpan');window.location='../user/product.php';</script>";
} else {
    echo "<script>alert('Data Gagal Disimpan');history.go(-1);</script>";
}
