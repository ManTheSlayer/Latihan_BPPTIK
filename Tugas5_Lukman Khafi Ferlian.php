<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // Fungsi untuk melakukan penjumlahan
    function tambah($a, $b) {
        return $a + $b;
    }

    // Fungsi untuk melakukan pengurangan
    function kurang($a, $b) {
        return $a - $b;
    }

    // Fungsi untuk melakukan perkalian
    function kali($a, $b) {
        return $a * $b;
    }

    // Fungsi untuk melakukan pembagian
    function bagi($a, $b) {
        // Memeriksa apakah pembagi adalah nol
        if ($b == 0) {
            return "Tidak dapat membagi dengan nol";
        }
        return $a / $b;
    }

    // Contoh penggunaan fungsi kalkulator
    $angka1 = 6;
    $angka2 = 3;

    // Menampilkan bilangan pertama dan kedua
    echo "<p>Bilangan 1 = " .  $angka1 . "</p>";
    echo "<p>Bilangan 2 = " .  $angka2 . "</p>";

    // Membuat garis pemisah untuk memisahkan input dan hasil perhitungan
    echo "============================================================";

    // Menampilkan hasil dari penjumlahan, pengurangan, perkalian, dan pembagian
    echo "<p>Hasil Penjumlahan Adalah: " . tambah($angka1, $angka2)  . "</p>";
    echo "<p>Hasil Pengurangan Adalah: " . kurang($angka1, $angka2)  . "</p>";
    echo "<p>Hasil Perkalian Adalah: " . kali($angka1, $angka2)  . "</p>";
    echo "<p>Hasil Pembagian Adalah: " .  bagi($angka1, $angka2) . "</p>";
?>

</body>
</html>
