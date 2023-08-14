<!-- Lukman Khafi Ferlian -->

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lukman Khafi Ferlian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>
<style>
    body {
        font-family: 'Rubik', sans-serif;
        background-color: #69f5df;
    }

    .container {
        margin-top: 50px;
        border: 2px solid #5c807a;
        border-radius: 10px;
        padding: 20px;
        background-color: #caede8;
        /* Tambahkan warna latar belakang kontainer */
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f2f2f2;
        /* Tambahkan warna latar belakang kartu */
    }

    .card-header {
        background-color: #34a3a3;
        color: #fff;
        font-weight: bold;
        font-size: 24px;
        text-align: center;
        border-radius: 10px 10px 0 0;
    }

    .form-group label {
        font-weight: bold;
        color: #8B4513;
        /* Ubah warna label */
    }

    .btn-container {
        display: flex;
        justify-content: center;
    }

    .btn {
        border-radius: 5px;
        font-weight: bold;
        transition: all 0.2s;
        background-color: #34a3a3;
        /* Ubah warna latar belakang tombol */
        color: #fff;
        /* Ubah warna teks tombol */
    }

    .btn:hover {
        opacity: 0.8;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Tambahkan efek bayangan */
        transform: translateY(-2px);
        /* Menggeser tombol sedikit ke atas saat dihover */
    }

    .form-group {
        display: grid;
        grid-template-columns: 150px auto;
        gap: 50px;
        margin-bottom: 20px;
    }

    .form-group label {
        text-align: right;
        padding-right: 10px
    }
</style>

<body>
    <div class="container">
        <h1 class="text-center"><img
                src="https://cdn.discordapp.com/attachments/999652295836962816/1134451288889892934/Screenshot_2023-07-28_183658-removebg-preview.png"
                width='150' height='100' />LKF Group Jaya</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">Formulir Data Penumpang</div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="ktp">Nomor KTP</label>
                        <input type="text" class="form-control" id="ktp" name="ktp">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" class="form-control" id="hari" name="hari">
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal Berangkat</label>
                        <input type="date" class="form-control" id="tgl" name="tgl">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan" onchange=" updateTicketPrice()">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="PWK">PWK - Purwekerto</option>
                            <option value="PWO">PWO - Purworejo</option>
                            <option value="SMG">SMG - Semarang</option>
                            <option value="JGJ">JGJ - Jogja</option>
                            <option value="SBY">SBY - Surabaya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="penumpang">Jumlah Penumpang</label>
                        <input type="number" class="form-control" id="penumpang" name="penumpang" min="1" value="1">
                    </div>
                    <div class="form-group">
                        <label for="tiket">Tarif Harga</label>
                        <input type="text" class="form-control" id="tiket" name="tiket">
                    </div>
                    <br>
                    <div class="btn-container">
                        <button type="submit" class="btn btn-success col-3">Pesan</button>
                    </div>
        </form>
    </div>

    <?php

    $harga_tiket = array(
        "PWK" => 100000,
        "PWO" => 150000,
        "SMG" => 180000,
        "JGJ" => 200000,
        "SBY" => 250000,
    );

    $jurusan = array(
        "PWK" => "PURWOKERTO",
        "PWO" => "PURWEREJO",
        "SMG" => "SEMARANG",
        "JGJ" => "JOGJA",
        "SBY" => "SURABAYA",
    );

    function totalHarga($jumlah, $harga_tiket)
    {
        global $tujuan;
        return $jumlah * $harga_tiket[$tujuan];
    }

    function diskon($jumlah, $harga_tiket, $tujuan)
    {
        // Calculate the total price before discount
        $totalHarga = totalHarga($jumlah, $harga_tiket);
        $diskon = 0; // Initialize discount
    
        if ($jumlah > 5) {
            switch ($tujuan) {
                case 'PWK':
                    $diskon_percentage = 0.05;
                    break;
                case 'PWO':
                    $diskon_percentage = 0.06;
                    break;
                case 'SMG':
                    $diskon_percentage = 0.07;
                    break;
                case 'JGJ':
                    $diskon_percentage = 0.08;
                    break;
                case 'SBY':
                    $diskon_percentage = 0.09;
                    break;
                default:
                    $diskon_percentage = 0;
                    break;
            }
            // Calculate the discount amount
            $diskon = $totalHarga * $diskon_percentage;
        }
        $diskon_rupiah = "Rp " . number_format($diskon, 0, ",", ".");
        return array('totalHarga' => $totalHarga, 'diskon' => $diskon, 'diskon_rupiah' => $diskon_rupiah);
    }

    function bayar($jumlah, $harga_tiket, $tujuan)
    {
        $disc = diskon($jumlah, $harga_tiket, $tujuan);
        $totalHarga = totalHarga($jumlah, $harga_tiket);
        $bayar = $totalHarga - $disc['diskon'];
        $bayar_rupiah = "Rp " . number_format($bayar, 0, ",", ".");
        return $bayar_rupiah;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomor = $_POST["ktp"];
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $hari = $_POST["hari"];
        $tgl = $_POST["tgl"];
        $tujuan = $_POST["jurusan"];
        $jumlah = $_POST["penumpang"];
        $tiket = $_POST["tiket"];
        $disc = diskon($jumlah, $harga_tiket, $tujuan);
        $bayar = bayar($jumlah, $harga_tiket, $tujuan);

        $data = [$nomor, $nama, $alamat, $hari, $tgl, $tujuan, $jumlah, $tiket, $disc, $bayar];
        $json_file = "data2.json";
        $current_data = file_get_contents($json_file);
        $array_data = json_decode($current_data, true);
        $array_data[] = $data;
        $final_data = json_encode($array_data, JSON_PRETTY_PRINT);
        file_put_contents($json_file, $final_data);

        echo "<div class='container'>";
        echo "<h2>Data Pemesanan</h2>";
        echo "<table class='table'>";
        echo "<tr><td>Nomor KTP:</td><td>$nomor</td></tr>";
        echo "<tr><td>Nama Pelanggan:</td><td>$nama</td></tr>";
        echo "<tr><td>Alamat:</td><td>$alamat</td></tr>";
        echo "<tr><td>Hari:</td><td>$hari</td></tr>";
        echo "<tr><td>Tanggal Berangkat:</td><td>$tgl</td></tr>";
        echo "<tr><td>Jurusan:</td><td>{$jurusan[$tujuan]}</td></tr>";
        echo "<tr><td>Jumlah Penumpang:</td><td>$jumlah</td></tr>";
        echo "<tr><td>Tarif Tiket:</td><td>{$harga_tiket[$tujuan]}</td></tr>";
        echo "<tr><td>Diskon:</td><td>{$disc['diskon_rupiah']}</td></tr>";
        echo "<tr><td>Bayar:</td><td>$bayar</td></tr>";
        echo "</table>";
        echo "</div>";
    }


    ?>

    <script>
        function updateTicketPrice() {
            // Ambil nilai jurusan yang dipilih oleh pengguna
            var selectedJurusan = document.getElementById("jurusan").value;

            // Buat array harga tiket
            var hargaTiket = {
                "PWK": 100000,
                "PWO": 150000,
                "SMG": 180000,
                "JGJ": 200000,
                "SBY": 250000
            };

            // Isi input harga tiket sesuai dengan harga tiket yang sesuai dengan jurusan yang dipilih
            document.getElementById("tiket").value = hargaTiket[selectedJurusan];
        }
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>