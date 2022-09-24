<?php
session_start();
include "connection.php";

$cek_user = mysqli_num_rows(mysqli_query($conn, "SELECT email_user FROM tb_user WHERE email_user = '$_POST[email_user]'"));
if ($cek_user > 0) {
    header("location: ../sign-up.php?pesan=gagal");
} else {
    $password    = md5($_POST['password_user']);
    mysqli_query($conn, "INSERT INTO tb_user (name_user, email_user, password_user, company_user, location_user)
        VALUES ('$_POST[name_user]', '$_POST[email_user]', '$password', '$_POST[company_user]', '$_POST[location_user]')");

    header("location: ../sign-in.php?pesan=return");
}
