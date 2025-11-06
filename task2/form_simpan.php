<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $invoice = $_POST['invoice'];
    $nama_barang = $_POST['nama_barang'];
    $harga_barang = $_POST['harga_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $total = $_POST['total'];
    $edit = $_POST['edit'] == 'true';

    if ($edit) {
        // Update existing record
        $query = "UPDATE databarang SET nama_barang='$nama_barang', harga_barang='$harga_barang', jumlah_barang='$jumlah_barang', total='$total' WHERE invoice='$invoice'";
    } else {
        // Check if the invoice already exists
        $checkQuery = "SELECT * FROM databarang WHERE invoice='$invoice'";
        $checkResult = mysqli_query($connect, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Invoice already exists
            echo "Error: Duplicate entry for invoice '$invoice'. Please use a unique invoice number.";
            exit;
        } else {
            // Insert new record
            $query = "INSERT INTO databarang (invoice, nama_barang, harga_barang, jumlah_barang, total) VALUES ('$invoice', '$nama_barang', '$harga_barang', '$jumlah_barang', '$total')";
        }
    }

    $sql = mysqli_query($connect, $query);

    if ($sql) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}
?>
