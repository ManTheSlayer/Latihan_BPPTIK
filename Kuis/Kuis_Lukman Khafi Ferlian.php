<!-- Lukman Khafi Ferlian  -->
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Intruksi Kerja Nomor 1 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
	<title>Hitung Biaya Sewa</title>
</head>

<body class="bg-light" style="font-family: 'Rubik', sans-serif;">
	<div class="container mt-5 p-4 border bg-light rounded shadow">
		<!-- Instruksi Kerja Nomor 2. -->
		<img src="img/logo-parkir.png" alt="logo-parkir" class="img-thumbnail d-flex mx-auto"
			style="width:300px; height:200px;  ">
		<!-- Menampilkan logo Sewa -->

		<h2 class="text-center">Hitung Biaya Sewa</h2>
		<br>
		<form action="Kuis_Lukman Khafi Ferlian.php" method="post" id="formPerhitungan">
			<div class="row form-group align-items-center mb-4">
				<!-- Masukan data plat nomor kendaraan. Tipe data text. -->
				<div class="col-lg-2"><label for="nama">Plat Nomor Kendaraan:</label></div>
				<div class="col-lg-2"><input class="form-control" type="text" id="plat" name="plat"></div>
			</div>

			<div class="row form-group align-items-center mb-4">
				<!-- Masukan pilihan jenis kendaraan. -->
				<div class="col-lg-2"><label for="tipe">Jenis Kendaraan:</label></div>
				<div class="col-lg-2">
					<!-- Instruksi Kerja Nomor 3, 4, dan 5 -->
					<?php
					$kendaraan = array(
						"Bus",
						"Truk",
						"Motor",
						"Mobil"
					);
					// Mengurutkan array
					sort($kendaraan);

					foreach ($kendaraan as $jenis) {
						echo "<div class='form-check form-check-inline'>";
						echo "<input class='form-check-input' type='radio' id='$jenis' name='kendaraan' value='$jenis'>";
						echo "<label class='form-check-label' for='$jenis'>$jenis</label>";
						echo "</div>";
					}
					?>

				</div>
			</div>

			<div class="row form-group align-items-center mb-4">
				<!-- Masukan Jam Masuk Kendaraan -->
				<div class="col-lg-2"><label for="nomor">Jam Masuk [jam]:</label></div>
				<div class="col-lg-2">
					<select class="form-control" id="masuk" name="masuk">
						<option value="">- Jam Masuk -</option>

						<!-- Instruksi Kerja Nomor 6 -->
						<?php
						for ($i = 1; $i <= 24; $i++) {
							echo "<option value=\"$i\">$i:00</option>";
						}
						?>

					</select>
				</div>
			</div>

			<div class="row form-group align-items-center mb-4">
				<!-- Masukan Jam Keluar Kendaraan. -->
				<div class="col-lg-2"><label for="nomor">Jam Keluar [jam]:</label></div>
				<div class="col-lg-2">
					<select class="form-control" id="keluar" name="keluar">
						<option value="">- Jam Keluar -</option>

						<!-- Instruksi Kerja Nomor 6 -->
						<?php
						for ($i = 1; $i <= 24; $i++) {
							echo "<option value=\"$i\">$i:00</option>";
						}
						?>

					</select>
				</div>
			</div>

			<div class="row form-group align-items-center mb-4">
				<!-- Masukan pilihan Member. -->
				<div class="col-lg-2"><label for="tipe">Keanggotaan:</label></div>
				<div class="col-lg-2">
					<input type='radio' name='member' value='Member'> Member <br>
					<input type='radio' name='member' value='Non-Member'> Non Member <br>

				</div>
			</div>

			<div class="row form-group align-items-center mb-4">
				<!-- Tombol Submit -->
				<div class="d-grid gap-2 col-4   "><button class="btn btn-success" type="submit" form="formPerhitungan"
						value="hitung" name="hitung">Hitung >></button></div>
				<div class="col-lg-2"></div>
			</div>
		</form>
	</div>

	<?php

	if (isset($_POST['hitung'])) {



		// Instruksi Kerja Nomor 7 (hitung durasi)
		$masuk = (int) $_POST['masuk'];
		$keluar = (int) $_POST['keluar'];
		$durasi = $keluar - $masuk;

		// Instruksi Kerja Nomor 8 (fungsi)
		function hitung_sewa($durasi, $kendaraan, $member)
		{
			// Instruksi Kerja Nomor 9 (kontrol percabangan)
			$biaya = 0;

			if ($kendaraan === 'Mobil') {
				// Biaya parkir untuk Mobil
				$biaya = 500000 + max(0, ($durasi - 1) * 300000);
			} elseif ($kendaraan === 'Motor') {
				// Biaya parkir untuk Motor
				$biaya = 200000 + max(0, ($durasi - 1) * 100000);
			} elseif ($kendaraan === 'Bus') {
				// Biaya parkir untuk Bus
				$biaya = 800000 + max(0, ($durasi - 1) * 600000);
			} elseif ($kendaraan === 'Truk') {
				// Biaya parkir untuk Truk
				$biaya = 600000 * $durasi;
			}

			// Return nilai biaya
			return $biaya;
		}
		// Instruksi Kerja Nomor 10 ($biaya_sewa)
		$biaya_sewa = hitung_sewa($durasi, $_POST['kendaraan'], $_POST['member']);


		// Instruksi Kerja Nomor 11 (hitung diskon dan simpan hasil akhir setelah diskon pada variabel $biaya_akhir)
		$member = $_POST['member'];
		if ($member === 'Member') {
			$diskon = 0.1 * $biaya_sewa;
			$biaya_akhir = $biaya_sewa - $diskon;
		} else {
			$biaya_akhir = $biaya_sewa;
		}


		$datasewa = array(
			'plat' => $_POST['plat'],
			'kendaraan' => $_POST['kendaraan'],
			'masuk' => $_POST['masuk'],
			'keluar' => $_POST['keluar'],
			'durasi' => $durasi,
			'member' => $_POST['member'],
		);

		// Instruksi Kerja Nomor 12 (menyimpan ke json)
		$berkas = "data.json";
		$dataJson = json_encode($datasewa);
		file_put_contents($berkas, $dataJson);
		$dataJson = file_get_contents($berkas, JSON_PRETTY_PRINT);
		$datasewa = json_decode($dataJson, true);



		//	Menampilkan data sewa kendaraan.
		//  KODE DI BAWAH INI BOLEH DIMODIFIKASI!!!
		echo "
		<div class='container bg-secondary mt-4 p-3 rounded' >
			<h4 class='text-white text-center'>Info Kendaraan</h4>
			<br>
			<table class='table text-white'>
				<tbody>
					<tr>
						<td>Plat Nomor Kendaraan</td>
						<td>: " . $datasewa['plat'] . "</td>
					</tr>
					<tr>
						<td>Jenis Kendaraan</td>
						<td>: " . $datasewa['kendaraan'] . "</td>
					</tr>
					<tr>
						<td>Jam Masuk</td>
						<td>: " . $datasewa['masuk'] . ":00</td>
					</tr>
					<tr>
						<td>Jam Keluar</td>
						<td>: " . $datasewa['keluar'] . ":00</td>
					</tr>
					<tr>
						<td>Durasi sewa</td>
						<td>: " . $datasewa['durasi'] . " jam</td>
					</tr>
					<tr>
						<td>Keanggotaan</td>
						<td>: " . $datasewa['member'] . "</td>
					</tr>
					<tr>
						<td>Total Biaya sewa</td>
						<td>: Rp" . number_format($biaya_akhir, 0, ".", ".") . ",-</td>
					</tr>
				</tbody>
			</table>
		</div>
		";
	}
	?>
	<br>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>