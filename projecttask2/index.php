<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Spare Part</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('back2.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            font-family: '', tahoma;
            filter: drop-shadow(1px 1px 20px white)
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            max-width: 750px;
        }
        .card-title {
            font-size: 2rem;
            text-align: center;
            color: maroon;
        }
        .btn-custom {
            border-radius: 30px;
        }
        .con{
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            max-width: 680px;
        }
    </style>

<body>
<body class="form-container">

<?php
include "koneksi.php";
$invoice = $nama_barang = $harga_barang = $jumlah_barang = $total = "";
$edit = false;

if (isset($_GET['invoice'])) {
    $invoice = $_GET['invoice'];
    $query = "SELECT * FROM databarang WHERE invoice='$invoice'";
    $result = mysqli_query($connect, $query);
    if ($data = mysqli_fetch_array($result)) {
        $nama_barang = $data['nama_barang'];
        $harga_barang = $data['harga_barang'];
        $jumlah_barang = $data['jumlah_barang'];
        $total = $data['total'];
        $edit = true;
    }
}
?>

<body>
    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Form Jual Barang</h1>
                <form method="post" action="form_simpan.php">
    <div class="form-group">
        <label for="invoice">Kode Invoice</label>
        <input type="text" class="form-control" id="invoice" name="invoice" value="<?php echo $invoice; ?>" placeholder="Isikan No Invoice" required >
    </div>
    <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $nama_barang; ?>" placeholder="Isikan nama barang" required>
    </div>
    <div class="form-group">
        <label for="harga_barang">Harga</label>
        <input type="number" class="form-control" id="harga_barang" name="harga_barang" value="<?php echo $harga_barang; ?>"placeholder="Masukkan harga" required>
    </div>
    <div class="form-group">
        <label for="jumlah_barang">Jumlah</label>
        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?php echo $jumlah_barang; ?>"placeholder="Masukkan Jumlah" required>
    </div>
    <div class="form-group">
        <label for="total">Total</label>
        <input type="number" class="form-control" id="total" name="total" value="<?php echo $total; ?>" readonly>
    </div>
    <input type="hidden" name="edit" value="<?php echo $edit ? 'true' : 'false'; ?>">
    <hr>
    <button type="submit" class="btn btn-danger btn-custom">Simpan</button>
    <a href="index.php" class="btn btn-secondary btn-custom">Batal</a>
</form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#harga_barang, #jumlah_barang").keyup(function(){
                var harga = $("#harga_barang").val();
                var jumlah = $("#jumlah_barang").val();
                var total = parseInt(harga) * parseInt(jumlah);
                $("#total").val(total);
            });
        });
    </script>
<div class="container mt-5">
    <h1 class="gradient-text">Data Customer</h1>
    <a href="print_pdf.php" target="_blank"><button class="btn btn-secondary mb-3">Print Data</button></a>
    <br>
    <div class="col-md-6 mx-auto">
    <form action="" method="POST" >
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="txtcari" placeholder="Masukan Kata Kunci">
          <button class="btn btn-primary btn-sm" type="submit" name="btncari">Cari</button>
         <button class="btn btn-danger btn-sm" type="reset" name="btnreset">Reset</button>
         </div>
    </form>
</div>
<br>
    <table class="table table-bordered">
        
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
                <th>Total</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(isset($_POST['txtcari'])) {
                $keyword=$_POST['txtcari'];
                $query="select * from databarang where invoice like'%$keyword%' or nama_barang like '%$keyword%' order by invoice desc";
                } else {
                $query="select * from databarang order by invoice desc";
                }
            $sql = mysqli_query($connect, $query);
            while($data = mysqli_fetch_array($sql)){
                echo "<tr>";
                echo "<td>".$data['invoice']."</td>";
                echo "<td>".$data['nama_barang']."</td>";
                echo "<td>".$data['harga_barang']."</td>";
                echo "<td>".$data['jumlah_barang']."</td>";
                echo "<td>".$data['total']."</td>";
                echo "<td><a href='index.php?invoice=".$data['invoice']."' class='btn btn-warning'>Ubah</a></td>";
                echo "<td><a href='proses_hapus.php?invoice=".$data['invoice']."' class='btn btn-danger'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
</div>
<!--Table-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
