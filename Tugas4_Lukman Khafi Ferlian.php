<!-- Lukman Khafi Ferlian_Universitas Gunadarma -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />

    <title>Document</title>
</head>

<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> Jumlah Bintang=
<input type="number" name="tinggi">
<br>

<input type="submit" value="Kirim">
<br>
</form>


</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tinggi = $_POST['tinggi'];
    for($i=1; $i<=$tinggi; $i++) {
        for($j=1; $j<=$i; $j++) {
            echo "* ";
        }
        echo "<br>";
    }
}
?>
