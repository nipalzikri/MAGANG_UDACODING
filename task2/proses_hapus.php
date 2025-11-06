<?php
include "koneksi.php";
if (isset($_GET['invoice'])) {
    $invoice = $_GET['invoice'];
    $query = "DELETE FROM databarang WHERE invoice='$invoice'";
    $sql = mysqli_query($connect, $query);
    if ($sql) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}
?>
