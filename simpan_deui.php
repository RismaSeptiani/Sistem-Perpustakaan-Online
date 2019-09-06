<?php
//buka koneksi
include 'koneksi.php';
//print_r ($_POST);
//
// exit;
//jika tombol simpan ditekan
if (isset($_POST['simpan'])) {

		//catat semua var
		$id= $_POST['id'];
		$id_buku_detail=$_POST['id_buku_detail'];
		$tanggal_batas_kembali=$_POST['tanggal_batas_kembali'];
		$tanggal_kembali=$_POST['tanggal_kembali'];
		$denda=$_POST['denda'];

		//buat query untuk menyimpan Data
		$sql = "UPDATE t_sirkulasi
						set tanggal_kembali = '$tanggal_kembali',
								denda = '$denda'
						where id = '$id'";

//tambahkan data sirkulasi
//eksekusi query
$eksekusi = mysqli_query($conn,$sql);

//jika eksekusi sukses
if ($eksekusi) {
    header("location: daftar_peminjaman.php");
} else {
  echo mysqli_error($conn);
  return 0;
}
//eksekusi query
$eksekusi=mysqli_query($conn,$sql);
//mengupdate data
$sql = "update t_buku_detail 
        set status_tersedia=1,
            dipinjam_oleh=null
         where id='$id_buku_detail'";
//eksekusi query
$eksekusi = mysqli_query($conn,$sql);

//jika eksekusi sukses
if ($eksekusi) {
    echo "Berhasil";
} else {
  echo mysqli_error($conn);
  return 0;
}
}
?>
