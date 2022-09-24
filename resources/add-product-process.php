<?php
include("connection.php");
session_start();

$id_user = $_SESSION['user']['id_user'];

$save = mysqli_query($conn, "INSERT INTO tb_product (id_user, name_product, stock_product, cost_price, selling_price, 
notes_product) VALUES ('$id_user','$_POST[name_product]', '$_POST[stock_product]', '$_POST[cost_price]', 
'$_POST[selling_price]', '$_POST[notes_product]')");

if ($save) {
    echo "<script>alert('Data Berhasil Disimpan');window.location='../user/product.php';</script>";
} else {
    echo "<script>alert('Data Gagal Disimpan');history.go(-1);</script>";
}
