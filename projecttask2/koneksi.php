<?php
$host = 'localhost';
$dbname = 'dbjual';
$user = 'root';
$pass = '';

$connect = mysqli_connect($host, $user, $pass, $dbname);

if (!$connect) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
