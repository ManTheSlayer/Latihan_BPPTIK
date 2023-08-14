<!-- Lukman Khafi Ferlian -->
<!-- TUGAS 6 -->

<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator Sederhana</title>
</head>

<body>
    <h2>Kalkulator Sederhana</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        Bilangan 1: <input type="number" name="angka1" value="<?php echo $angka1; ?>"><br>
        Bilangan 2: <input type="number" name="angka2" value="<?php echo $angka2; ?>"><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    function tambah($a, $b)
    {
        return $a + $b;
    }

    function kurang($a, $b)
    {
        return $a - $b;
    }

    function kali($a, $b)
    {
        return $a * $b;
    }

    function bagi($a, $b)
    {
        if ($b == 0) {
            return "Tidak dapat membagi dengan nol";
        }
        return $a / $b;
    }

    $angka1 = $angka2 = $hasilPenjumlahan = $hasilPengurangan = $hasilPerkalian = $hasilPembagian = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["angka1"])) {
            $angka1 = $_POST["angka1"];
        }
        if (isset($_POST["angka2"])) {
            $angka2 = $_POST["angka2"];
        }

        if (isset($angka1) && isset($angka2)) {
            $hasilPenjumlahan = tambah($angka1, $angka2);
            $hasilPengurangan = kurang($angka1, $angka2);
            $hasilPerkalian = kali($angka1, $angka2);
            $hasilPembagian = bagi($angka1, $angka2);
        }
    }

    echo "<br>==================================================";
    if (isset($hasilPenjumlahan)) {
        echo "<p>Hasil Penjumlahan : " . $hasilPenjumlahan . "</p>";
    }
    if (isset($hasilPengurangan)) {
        echo "<p>Hasil Pengurangan : " . $hasilPengurangan . "</p>";
    }
    if (isset($hasilPerkalian)) {
        echo "<p>Hasil Perkalian : " . $hasilPerkalian . "</p>";
    }
    if (isset($hasilPembagian)) {
        echo "<p>Hasil Pembagian : " . $hasilPembagian . "</p>";
    }
    ?>
</body>

</html>