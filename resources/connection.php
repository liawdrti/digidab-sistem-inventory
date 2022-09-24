<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "db_digidab";

$conn = mysqli_connect($server, $user, $password, $db) or die(mysqli_error($conn));
