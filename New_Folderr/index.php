<?php

//	Instruksi Kerja Nomor 1.
//	Variabel $mobil berisi data jenis mobil yang dipesan dalam bentuk array satu dimensi.
$mobil = array(
	"Toyota",
	"Nissan",
	"Mitsubishi",
	"Avanza"
);
//	Instruksi Kerja Nomor 2.
//	Mengurutkan array $mobil secara Ascending.
sort($mobil);

//	Instruksi Kerja Nomor 5.
//	Baris Komentar: ......

?>

<!DOCTYPE html>
<html>

<head>
	<title>Pemesanan Taxi Online</title>
	<!-- Instruksi Kerja Nomor 3. -->
	<!-- Menghubungkan dengan library/berkas CSS. -->
	<link rel="stylesheet" href="bootstrap.css">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">


</head>

<body class="bg-light" style="font-family: 'Rubik', sans-serif;">
	<div class="container mt-5 p-4 border bg-success rounded shadow">
		<!-- Menampilkan judul halaman -->
		<h3><img src="https://cdn.discordapp.com/attachments/999652295836962816/1134451288889892934/Screenshot_2023-07-28_183658-removebg-preview.png"
				width='150' height='100' /> Pemesanan Taxi Online</h3>
		<br>

		<!-- Instruksi Kerja Nomor 4. -->
		<!-- Menampilkan logo Taxi Online -->


		<!-- Form untuk memasukkan data pemesanan. -->
		<form action="index.php" method="post" id="formPemesanan">
			<div class="row form-group">
				<!-- Masukan data nama pelanggan. Tipe data text. -->
				<div class="col-lg-2 col-md-3 col-sm-4"><label for="nama">Nama Pelanggan:</label></div>
				<div class="col-lg-10 col-md-9 col-sm-8"><input type="text" id="nama" name="nama" class="form-control">
				</div>
			</div>
			<div class="row form-group">
				<!-- Masukan data nomor HP pelanggan. Tipe data number. -->
				<div class="col-lg-2 col-md-3 col-sm-4"><label for="nomor">Nomor HP:</label></div>
				<div class="col-lg-10 col-md-9 col-sm-8"><input type="number" id="noHP" name="noHP" class="form-control"
						maxlength="16"></div>
			</div>
			<div class="row form-group">
				<!-- Masukan pilihan jenis mobil. -->
				<div class="col-lg-2 col-md-3 col-sm-4"><label for="tipe">Jenis Mobil:</label></div>
				<div class="col-lg-10 col-md-9 col-sm-8">
					<select class="form-control" id="mobil" name="mobil">
						<option value="">- Jenis mobil -</option>
						<?php
						// Instruksi Kerja Nomor 6.
						// Menampilkan dropdown pilihan jenis mobil Taxi Online berdasarkan data pada array $mobil menggunakan perulangan.
						foreach ($mobil as $jenis) {
							echo "<option value='" . $jenis . "'>" . $jenis . "</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<!-- Masukan data Jarak Tempuh. Tipe data number. -->
				<div class="col-lg-2 col-md-3 col-sm-4"><label for="jarak">Jarak:</label></div>
				<div class="col-lg-10 col-md-9 col-sm-8"><input type="number" id="jarak" name="jarak"
						class="form-control" maxlength="4"></div>
			</div>
			<div class="row form-group mb-4">
				<!-- Tombol Submit -->
				<div class="col-lg-2 col-md-3 col-sm-4"><button class="btn btn-primary" type="submit"
						form="formPemesanan" value="Pesan" name="Pesan">Pesan</button></div>
				<div class="col-lg-10 col-md-9 col-sm-8"></div>
			</div>
		</form>

	</div>
	<?php
	//	Kode berikut dieksekusi setelah tombol Hitung ditekan.
	if (isset($_POST['Pesan'])) {
		$biaya = 0;

		//	Variabel $dataPesanan berisi data-data pemesanan dari form dalam bentuk array.
	
		$dataPesanan = array(
			'nama' => $_POST['nama'],
			'noHP' => $_POST['noHP'],
			'mobil' => $_POST['mobil'],
			'jarak' => $_POST['jarak']
		);
		$jarak_tempuh = $_POST['jarak'];

		// Instruksi Kerja Nomor 7 (Percabangan)
		// Gunakan pencabangan untuk menghitung biaya sewa taksi berdasarkan $jarak_tempuh
		// Gunakan fungsi hitung_sewa untuk menghitung biaya sewa taksi sesuai INSTRUKSI KERJA #8
		// Simpan hasil penghitungan biaya sewa dalam variabel $tagihan sesuai INSTRUKSI KERJA #9
		function hitung_sewa($jarak_tempuh, $biaya)
		{

			if ($jarak_tempuh <= 10) {
				// Biaya parkir untuk Mobil
				$biaya = 1000 * $jarak_tempuh;
			} elseif ($jarak_tempuh > 10) {
				// Biaya parkir untuk Motor
				$biaya = 10000 + ($jarak_tempuh - 10) * 5000;
			}
			return $biaya;
		}
		$tagihan = hitung_sewa($jarak_tempuh, $biaya);





		//	Variabel berisi path file data.json yang digunakan untuk menyimpan data pemesanan.
		$berkas = "data.json";

		//	Mengubah data pemesanan yang berbentuk array PHP menjadi bentuk JSON.
		$dataJson = json_encode($dataPesanan, JSON_PRETTY_PRINT);

		//	Instruksi Kerja Nomor 10.
		//	Menyimpan data pemesanan yang berbentuk JSON ke dalam file JSON
		file_put_contents($berkas, $dataJson);
		$dataJson = file_get_contents($berkas, JSON_PRETTY_PRINT);

		//	Mengubah data pemesanan dalam format JSON ke dalam format array PHP.
		$dataPesanan = json_decode($dataJson, true);


		//	Menampilkan data pemesanan dan total biaya sewa.
		//  KODE DI BAWAH INI TIDAK PERLU DIMODIFIKASI!!!
		echo "
				<br/>
				<div class='container bg-primary mt-4 p-3 rounded'>
				<h4 class='text-black text-center'>Info Kendaraan</h4>
					<div class='row'>
						<!-- Menampilkan nama pelanggan. -->
						<div class='col-lg-2'>Nama Pelanggan:</div>
						<div class='col-lg-2'>" . $dataPesanan['nama'] . "</div>
					</div>
					<div class='row'>
						<!-- Menampilkan nomor HP pelanggan. -->
						<div class='col-lg-2'>Nomor HP:</div>
						<div class='col-lg-2'>" . $dataPesanan['noHP'] . "</div>
					</div>
					<div class='row'>
						<!-- Menampilkan Jenis mobil Taxi Online. -->
						<div class='col-lg-2'>Jenis Mobil:</div>
						<div class='col-lg-2'>" . $dataPesanan['mobil'] . "</div>
					</div>
					<div class='row'>
						<!-- Menampilkan jumlah Jarak Tempuh. -->
						<div class='col-lg-2'>Jarak(km):</div>
						<div class='col-lg-2'>" . $dataPesanan['jarak'] . " km</div>
					</div>
					<div class='row'>
						<!-- Menampilkan Total Tagihan. -->
						<div class='col-lg-2'>Total:</div>
						<div class='col-lg-2'>Rp" . number_format($tagihan, 0, ".", ".") . ",-</div>
					</div>
					
			</div>
			<br/>

			";
	}
	?>
</body>

</html>