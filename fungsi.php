<?php 
	include 'koneksi.php';

	$sql = 'SELECT * FROM `t_sirkulasi` WHERE year (tanggal_entry) = 2019 and month (tanggal_entry) = 1 order by kode_sirkulasi desc limit 1';

	$eksekusi = mysqli_query ($conn, $sql);

	if (mysqli_num_rows($eksekusi)){
		$data = mysqli_fetch_array ($eksekusi);
		$kode_sirkulasi = $data ['kode_sirkulasi'];
		echo $kode_sirkulasi. "<br>";
		$tahun = substr($nomor_sirkulasi, 0,4);
		$bulan = substr($nomor_sirkulasi, 4,2);
		$nomor_urut = substr($nomor_sirkulasi, 7,3);
		$nomor_urut_baru = (int) $nomor_urut + 1;
		$nomor_urut_baru = '000000000000000000000000' . $nomor_urut_baru;
		$nomor_urut_baru = substr($nomor_urut_baru, strlen($nomor_urut_baru)-3,3);
		$nomor_urut_baru = $tahun . $bulan . '-' . $nomor_urut_baru;

		echo $tahun . "<br>";
		echo $bulan . "<br>";
		echo $nomor_urut . "<br>";
		echo $nomor_urut_baru . "<br>";

	} else {
		$tahun = date('Y');
		$bulan = date('m');
		$nomor_urut_baru = '001';
		$nomor_urut_baru = $tahun . $bulan . '-' . $nomor_urut_baru;
		
		echo $tahun . "<br>";
		echo $bulan . "<br>";
		echo $nomor_urut_baru . "<br>";

	}
 ?>