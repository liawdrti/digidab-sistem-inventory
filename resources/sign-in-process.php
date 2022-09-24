<?php

session_start();

include "connection.php";

$email = $_POST['email_user'];
$password = md5($_POST['password_user']);
$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email_user ='$email' AND password_user ='$password'");
$data_user = mysqli_fetch_assoc($result);

if ($data_user != null) {
    $_SESSION['user'] = $data_user;

    header("location: ../user/dashboard.php");
} else {
    header("location: ../sign-in.php?pesan=gagal");
}
