<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Jual Barang</title>
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
            max-width: 680px;
        }
        .card-title {
            font-size: 2rem;
            text-align: center;
            color: maroon;
        }
        .btn-custom {
            border-radius: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Form Jual Barang</h1>
                <form method="post" action="proses_simpan.php">
                    <div class="form-group">
                        <label for="Invoice">Kode Invoice</label>
                        <input type="text" class="form-control" id="Invoice" name="Invoice" required>
                    </div>
                    <div class="form-group">
                        <label for="name_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="name_barang" name="name_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="number" class="form-control" id="total" name="total" readonly>
                    </div>
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
            $("#harga, #jumlah").keyup(function(){
                var total = 0;
                var harga = $("#harga").val();
                var jumlah = $("#jumlah").val();
                total = parseInt(harga) * parseInt(jumlah);
                $("#total").val(total);
            });
        });
    </script>
</body>
</html>