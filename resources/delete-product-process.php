<?php
include('connection.php');

$id_product = $_GET['id_product'];
$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE id_product = '$id_product'");

if ($delete) {
    echo "<script>window.location='../user/product.php';</script>";
    // 
} else {
    echo "<script>alert('Data Gagal Dihapus');</script>";
    // history.go(-1);
}
