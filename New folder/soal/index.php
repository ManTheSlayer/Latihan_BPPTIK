<?php

	//	Instruksi Kerja Nomor 1.
	//	Variabel $mobil berisi data jenis mobil yang dipesan dalam bentuk array satu dimensi.
	//  ....

	//	Instruksi Kerja Nomor 2.
	//	Mengurutkan array $mobil secara Ascending.
	//  ....

	//	Instruksi Kerja Nomor 5.
	//	Baris Komentar: ......
	function hitung_sewa(){
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pemesanan Taxi Online</title>
		<!-- Instruksi Kerja Nomor 3. -->
		<!-- Menghubungkan dengan library/berkas CSS. -->

	</head>
	
	<body>
	<div class="container border">
		<!-- Menampilkan judul halaman -->
		<h3>Pemesanan Taxi Online</h3>
		
		<!-- Instruksi Kerja Nomor 4. -->
		<!-- Menampilkan logo Taxi Online -->
		
		
		<!-- Form untuk memasukkan data pemesanan. -->
		<form action="index.php" method="post" id="formPemesanan">
			<div class="row">
				<!-- Masukan data nama pelanggan. Tipe data text. -->
				<div class="col-lg-2"><label for="nama">Nama Pelanggan:</label></div>
				<div class="col-lg-2"><input type="text" id="nama" name="nama"></div>
			</div>
			<div class="row">
				<!-- Masukan data nomor HP pelanggan. Tipe data number. -->
				<div class="col-lg-2"><label for="nomor">Nomor HP:</label></div>
				<div class="col-lg-2"><input type="number" id="noHP" name="noHP" maxlength="16"></div>
			</div>
			<div class="row">
				<!-- Masukan pilihan jenis mobil. -->
				<div class="col-lg-2"><label for="tipe">Jenis Mobil:</label></div>
				<div class="col-lg-2">
					<select id="mobil" name="mobil">
					<option value="">- Jenis mobil -</option>
					<?php
						//	Instruksi Kerja Nomor 6.
						//	Menampilkan dropdown pilihan jenis mobil Taxi Online berdasarkan data pada array $mobil menggunakan perulangan.
					?>	
					</select>
				</div>
			</div>
			
			<div class="row">
				<!-- Masukan data Jarak Tempuh. Tipe data number. -->
				<div class="col-lg-2"><label for="nomor">Jarak:</label></div>
				<div class="col-lg-2"><input type="number" id="jarak" name="jarak" maxlength="4"></div>
			</div>
			<div class="row">
				<!-- Tombol Submit -->
				<div class="col-lg-2"><button class="btn btn-primary" type="submit" form="formPemesanan" value="Pesan" name="Pesan">Pesan</button></div>
				<div class="col-lg-2"></div>		
			</div>
		</form>
	</div>
	<?php
		//	Kode berikut dieksekusi setelah tombol Hitung ditekan.
		if(isset($_POST['Pesan'])) {
			
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
            


			
			//	Variabel berisi path file data.json yang digunakan untuk menyimpan data pemesanan.
			$berkas = "data.json";
			
			//	Mengubah data pemesanan yang berbentuk array PHP menjadi bentuk JSON.
			$dataJson = json_encode($dataPesanan, JSON_PRETTY_PRINT);
			
			//	Instruksi Kerja Nomor 10.
			//	Menyimpan data pemesanan yang berbentuk JSON ke dalam file JSON
			file_put_contents();
			$dataJson = file_get_contents();
			
			//	Mengubah data pemesanan dalam format JSON ke dalam format array PHP.
			$dataPesanan = json_decode($dataJson, true);

			
			//	Menampilkan data pemesanan dan total biaya sewa.
			//  KODE DI BAWAH INI TIDAK PERLU DIMODIFIKASI!!!
			echo "
				<br/>
				<div class='container'>
					
					<div class='row'>
						<!-- Menampilkan nama pelanggan. -->
						<div class='col-lg-2'>Nama Pelanggan:</div>
						<div class='col-lg-2'>".$dataPesanan['nama']."</div>
					</div>
					<div class='row'>
						<!-- Menampilkan nomor HP pelanggan. -->
						<div class='col-lg-2'>Nomor HP:</div>
						<div class='col-lg-2'>".$dataPesanan['noHP']."</div>
					</div>
					<div class='row'>
						<!-- Menampilkan Jenis mobil Taxi Online. -->
						<div class='col-lg-2'>Jenis Mobil:</div>
						<div class='col-lg-2'>".$dataPesanan['mobil']."</div>
					</div>
					<div class='row'>
						<!-- Menampilkan jumlah Jarak Tempuh. -->
						<div class='col-lg-2'>Jarak(km):</div>
						<div class='col-lg-2'>".$dataPesanan['jarak']." km</div>
					</div>
					<div class='row'>
						<!-- Menampilkan Total Tagihan. -->
						<div class='col-lg-2'>Total:</div>
						<div class='col-lg-2'>Rp".number_format($tagihan, 0, ".", ".").",-</div>
					</div>
					
			</div>
			";
		}
	?>
	</body>
</html>