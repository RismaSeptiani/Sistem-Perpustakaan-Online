<?php
//buka koneksi
include_once "koneksi.php";
//siapkan query
$id=$_GET["id"];

//cari id buku berdasarkan id buku detail
$sql = "SELECT id_buku FROM t_buku_detail where id='$id'";
$cari_id_buku = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($cari_id_buku);
$id_buku = $data['id_buku'];

//siapkan query untuk menghapus buku detail
$sql = "DELETE FROM t_buku_detail where id=$id";

//eksekusi query
$hapus = mysqli_query($conn,$sql);

if($hapus){
	//update jumlah copy pada tabel buku
	$sql = "update t_buku set jml_copy=jml_copy-1 where id='$id_buku'";
        $koneksi = mysqli_query ($conn, $sql);
if ($hapus){
	//jika Berhasil Dihapus
   //maka larikan ke daftar buku detail
    header("location: daftar_buku_detail.php");
} else {
  echo mysqli_error($conn);
  return 0;
}
}
?>