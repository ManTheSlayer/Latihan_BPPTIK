<!-- Lukman Khafi Ferlian -->
<!-- Menambahkan judul dan link CSS untuk Boot_strap -->

<!DOCTYPE html>
<html>

<head>
	<title>Toko Buah Lukman</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<br>
	<div class="container">
		<!-- Menampilkan logo di tengah-tengah menggunakan Bootstrap -->
		<div class="d-flex justify-content-center">
			<?php echo "<img src='https://cdn.discordapp.com/attachments/999652295836962816/1134327036048060416/fruit_table-removebg-preview.png' width='150' height='100'/>"; ?>
		</div>
		<!-- Menampilkan judul "Toko Buah Lukman" di atas form -->
		<div class="card-header bg-primary text-white text-center">Toko Buah Lukman</div>
		<br>

		<?php
		// Membaca data dari file JSON dan menginisialisasi data buah dan harga buah
		$berkas = "data.json";
		$dataJson = file_get_contents($berkas);
		$stockBuah = json_decode($dataJson, true);

		// Merepresentasikan sebuah array dari (Nama Buah dan Harga Buah)
		$namaBuah = array("Durian", "Mangga", "Rambutan", "Kelengkeng", "Apel");
		$hargaBuah = array("Durian" => 20000, "Mangga" => 15000, "Rambutan" => 10000, "Kelengkeng" => 25000, "Apel" => 30000);

		// Fungsi untuk menghitung total harga buah
		function totalHarga($jumlah, $buah)
		{
			global $hargaBuah;
			return $jumlah * $hargaBuah[$buah];
		}

		// Fungsi untuk menghitung pajak
		function pajak($totalHarga)
		{
			return $totalHarga > 100000 ? $totalHarga * 0.1 : 0;
		}

		// Fungsi untuk menghitung total bayar
		function calculateTotalBayar($totalHarga, $pajak)
		{
			return $totalHarga - $pajak;
		}
		?>

		<!-- Form untuk input pembelian buah -->
		<form action="Tugas9_Lukman Khafi Ferlian.php" method="post">
			<div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Nama Pembeli</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" placeholder="Nama Pembeli" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="buah" class="col-sm-2 col-form-label">Nama Buah</label>
				<div class="col-sm-10">
					<!-- Dropdown untuk memilih jenis buah -->
					<select name="buah" class="form-control">
						<?php
						// Menampilkan opsi-opsi buah dari array namaBuah
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
		// Jika tombol "Hitung" ditekan, proses pembelian buah dilakukan
		if (isset($_POST['submit'])) {
			$namaPembeli = $_POST['nama'];
			$buah = $_POST['buah'];
			$jumlah = $_POST['jumlah'];
			$totalHarga = totalHarga($jumlah, $buah);
			$pajak = pajak($totalHarga);
			$totalBayar = calculateTotalBayar($totalHarga, $pajak);

			$belanja = [$namaPembeli, $buah, $jumlah, $totalHarga];
			array_push($stockBuah, $belanja);
			array_multisort($stockBuah, SORT_ASC);
			$dataJson = json_encode($stockBuah, JSON_PRETTY_PRINT);
			file_put_contents($berkas, $dataJson);
		}
		?>

		<!-- Tabel untuk menampilkan daftar harga buah -->
		<h1 class="my-4">Daftar Harga Buah</h1>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<?php
					// Menampilkan nama-nama buah sebagai header tabel
					foreach ($namaBuah as $buah => $nama) {
						echo "<th style='text-align: center;'>" . $nama . "</th>";
					}
					?>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					// Menampilkan harga-harga buah di dalam tabel
					foreach ($hargaBuah as $buah => $harga) {
						echo "<td style='text-align: center;'>" . $harga . "</td>";
					}
					?>
				</tr>
			</tbody>
		</table>

		<!-- Tabel untuk menampilkan daftar pembelian buah -->
		<h1 class="my-4">Daftar Pembelian Buah</h1>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama Pembeli</th>
					<th>Nama Buah</th>
					<th>Jumlah</th>
					<th>Total Harga</th>
					<th>Pajak</th>
					<th>Total Bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Menampilkan data pembelian buah ke dalam tabel
				for ($i = 0; $i < count($stockBuah); $i++) {
					$totalHarga = $stockBuah[$i][3];
					$pajak = pajak($totalHarga);
					$totalBayar = calculateTotalBayar($totalHarga, $pajak);

					echo "<tr>";
					echo "<td>" . $stockBuah[$i][0] . "</td>";
					echo "<td style='text-align: center;'>" . $stockBuah[$i][1] . "</td>";
					echo "<td style='text-align: center;'>" . $stockBuah[$i][2] . "</td>";
					echo "<td style='text-align: center;'>" . $totalHarga . "</td>";
					echo "<td style='text-align: center;'>" . $pajak . "</td>";
					echo "<td style='text-align: center;'>" . $totalBayar . "</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>

</html>