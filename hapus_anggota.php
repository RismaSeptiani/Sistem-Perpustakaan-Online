<?php
//buka koneksi
include_once "koneksi.php";
//siapkan query
$id=$_GET["id"];
$sql = "DELETE FROM t_anggota where id=$id";

//eksekusi query
$hapus = mysqli_query($conn,$sql);

//jika Berhasil Dihapus
//maka larikan ke daftar_anggota

if ($hapus) {
    header("location: daftar_anggota.php");
} else {
  echo mysqli_error($conn);
  return 0;
}


?>