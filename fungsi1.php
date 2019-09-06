<?php 
	function get_nomor_sirkulasi(){

	$server = "localhost";
		$user = "root";
		$password = "";
		$nama_database = "perpus";

		$conn = mysqli_connect($server, $user, $password, $nama_database);
		$sql = 'SELECT max(kode_sirkulasi) as terbesar FROM t_sirkulasi';

		$eksekusi = mysqli_query ($conn, $sql);

		if (mysqli_num_rows($eksekusi)){
			$data = mysqli_fetch_array ($eksekusi);
			$nomor_urut = $data ['terbesar'];
			$nomor_urut_baru = (int) $nomor_urut + 1;
			$nomor_urut_baru = '00000000' . $nomor_urut_baru;
			$nomor_urut_baru = substr($nomor_urut_baru, strlen($nomor_urut_baru)-6,6);
			

		} else {
			$nomor_urut_baru = '000001';

		}

		return $nomor_urut_baru;
}
 ?>