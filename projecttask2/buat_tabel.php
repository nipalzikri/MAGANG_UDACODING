<?php
$host='localhost';
$dbname = 'dbjual';
$user ='root';
$pass= '';

$conn= mysqli_connect($host,$user,$pass,$dbname);

if(!$conn){
    die("koneksi failed :".mysqli_connect_error());
}
$sql="CREATE TABLE databarang (
    invoice VARCHAR(10) NULL,
    nama_barang VARCHAR(25) NULL,
    harga_barang INT(90) NULL,
    jumlah_barang INT(90) NULL,
    total INT(90) NULL,
    constraint pk_databarang primary key(invoice))";

    if(mysqli_query($conn,$sql)){
        echo"table berhasil di buat";
    }else{
        echo"table gagal di buat:".mysqli_error($conn);
    }
    mysqli_close($conn)


?>