<?php
//buka koneksi
include "koneksi.php";
//siapkan query
$id=$_GET["id"];
$sql = "DELETE FROM t_buku where id=$id";

//eksekusi query
$hapus = mysqli_query($conn,$sql);

//jika Berhasil Dihapus
//maka larikan ke daftar_buku2

if ($hapus) {
    header("location: daftar_buku2.php");
} else {
  echo mysqli_error($conn);
  return 0;
}


?>