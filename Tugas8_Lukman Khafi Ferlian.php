<!DOCTYPE html>
<html>
<head>
	<title>Toko Buah</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
	<div class="card-header bg-primary text-white text-center">Toko Buah</div>
	<br>

		<?php
		$berkas = "data.json";
		$dataJson = file_get_contents($berkas);
		$stockBuah = json_decode($dataJson, true);

		$namaBuah = array("Durian", "Mangga", "Rambutan", "Kelengkeng", "Apel");
		$hargaBuah = array("Durian" => 20000, "Mangga" => 15000, "Rambutan" => 10000, "Kelengkeng" => 25000, "Apel" => 30000);

		function totalHarga($jumlah, $buah)
		{
			global $hargaBuah;
			return $jumlah * $hargaBuah[$buah];
		}
		?>
		<form action="index.php" method="post">
			<div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Nama Pembeli</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" placeholder="Nama Pembeli" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="buah" class="col-sm-2 col-form-label">Nama Buah</label>
				<div class="col-sm-10">
					<select name="buah" class="form-control">
						<?php
						foreach ($namaBuah as $buah) {
							echo "<option value='" . $buah . "'>" . $buah . "</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-10">
					<input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10 offset-sm-2">
					<input type="submit" value="Hitung" name="submit" class="btn btn-primary">
				</div>
			</div>
		</form>

		<br>

		<?php
		if (isset($_POST['submit'])) {
			$namaPembeli = $_POST['nama'];
			$buah = $_POST['buah'];
			$jumlah = $_POST['jumlah'];
			$totalHarga = totalHarga($jumlah, $buah);

			$belanja = [$namaPembeli, $buah, $jumlah, $totalHarga];
			array_push($stockBuah, $belanja);
			array_multisort($stockBuah, SORT_ASC);
			$dataJson = json_encode($stockBuah, JSON_PRETTY_PRINT);
			file_put_contents($berkas, $dataJson);
		}
		?>

		<h1 class="my-4">Daftar Harga Buah</h1>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<?php
					foreach ($namaBuah as $buah => $nama) {
						echo "<th style='text-align: center;'>" . $nama . "</th>";
					}
					?>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					foreach ($hargaBuah as $buah => $harga) {
						echo "<td style='text-align: center;'>" . $harga . "</td>";
					}
					?>
				</tr>
			</tbody>
		</table>

		<h1 class="my-4">Daftar Pembelian Buah</h1>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama Pembeli</th>
					<th>Nama Buah</th>
					<th>Jumlah</th>
					<th>Total Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php
				for ($i = 0; $i < count($stockBuah); $i++) {
					echo "<tr>";
					echo "<td>" . $stockBuah[$i][0] . "</td>";
					echo "<td style='text-align: center;'>" . $stockBuah[$i][1] . "</td>";
					echo "<td style='text-align: center;'>" . $stockBuah[$i][2] . "</td>";
					echo "<td style='text-align: center;'>" . $stockBuah[$i][3] . "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>

</body>
</html>
