<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $angka1 = $angka2 = $operator = $hasil = "";
    $error_msg = "";

    if (isset($_POST['submit'])) {
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];
        $operator = $_POST['operator'];

        if (!is_numeric($angka1) || !is_numeric($angka2)) {
            $error_msg = "Mohon masukkan bilangan yang valid!";
        } else {
            switch ($operator) {
                case 'tambah':
                    $hasil = $angka1 + $angka2;
                    break;
                case 'kurang':
                    $hasil = $angka1 - $angka2;
                    break;
                case 'kali':
                    $hasil = $angka1 * $angka2;
                    break;
                case 'bagi':
                    if ($angka2 == 0) {
                        $error_msg = "Tidak dapat dibagi dengan 0!";
                    } else {
                        $hasil = $angka1 / $angka2;
                    }
                    break;
            }
        }
    }
    ?>

    <div class="calculator">
        <h2>Kalkulator Sederhana</h2>
        <form action="Tugas6_Lukman Khafi Ferlian.php" method="post">
            <div class="input-group">
                <label for="angka1">Bilangan 1:</label>
                <input type="text" id="angka1" autocomplete="off" name="angka1" placeholder="Masukkan Bilangan Pertama"
                    value="<?php echo $angka1; ?>">
            </div>

            <div class="input-group">
                <label for="angka2">Bilangan 2:</label>
                <input type="text" id="angka2" autocomplete="off" name="angka2" placeholder="Masukkan Bilangan Kedua"
                    value="<?php echo $angka2; ?>">
            </div>

            <select name="operator" id="operator">
                <option value="">Pilih Operator</option>
                <option value="tambah" <?php if ($operator === "tambah")
                    echo "selected"; ?>>+ (Tambah)</option>
                <option value="kurang" <?php if ($operator === "kurang")
                    echo "selected"; ?>>- (Kurang)</option>
                <option value="kali" <?php if ($operator === "kali")
                    echo "selected"; ?>>* (Kali)</option>
                <option value="bagi" <?php if ($operator === "bagi")
                    echo "selected"; ?>>/ (Bagi)</option>
            </select>

            <input type="submit" id="submit" name="submit" value="Hitung">
            <div class="hasil">
                <?php if ($error_msg === "") { ?>
                    Hasilnya adalah
                    <?php echo $hasil; ?>
                <?php } else { ?>
                    <div class="error-msg">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
            </div>
        </form>
    </div>
</body>

</html>