<?php
$conn = mysqli_connect('localhost','root');
if(mysqli_connect_errno()){
echo"koneksi ke sever gagal";
}
$sql= "CREATE DATABASE dbjual";
    if(mysqli_query($conn,$sql))
    {
        echo("database berhasil dibuat");
    }else{
        echo"gagal membuat database ".mysqli_connect_error();
    }

?>