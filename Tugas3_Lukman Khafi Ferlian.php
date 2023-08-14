<!-- Lukman Khafi Ferlian_Universitas Gunadarma -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Tambahkan tag pembuka <body> untuk membungkus konten yang dihasilkan oleh PHP. -->

    <?php
    // Menampilkan judul untuk tugas mencetak bilangan.
    echo "=============== CETAK BILANGAN GANJIL GENAP 1-100================<br>";

    // Loop untuk mengiterasi bilangan dari 1 hingga 100.
    for ($no = 1; $no <= 100; $no++) {
        if ($no % 2 == 0) {
            // Jika bilangan adalah genap, maka cetak bilangan dan labelnya "bilangan Genap".
            echo "$no "; // Mencetak bilangan.
            echo "adalah bilangan Genap</font><br>"; // Mencetak label untuk bilangan genap.
        } else {
            // Jika bilangan adalah ganjil, maka cetak bilangan dan labelnya "bilangan Ganjil".
            echo "$no "; // Mencetak bilangan.
            echo "adalah bilangan Ganjil</font><br>"; // Mencetak label untuk bilangan ganjil.
        }
    }
    ?>

</body> <!-- Tambahkan tag penutup </body>. -->

</html>