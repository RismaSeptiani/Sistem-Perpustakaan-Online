<?php session_start();
if(!isset($_SESSION["login"])){
  header("location: login1.php");
  exit;

if (isset($_GET['status']));
}?>
<?php
  //buka koneksi
  include "koneksi.php";

  //cetak semua data hihihi
  //jgn lupa ditutup loh klo dah beres
  print_r ($_POST);
  if (isset($_POST['batal'])){
    header ("location: daftar_buku2.php");
  }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

      //catat semua var
      $id= $_POST['id'];
      $kode_buku= $_POST['kode_buku'];
      $judul= $_POST['judul'];
      $pengarang= $_POST['pengarang'];
      $penerbit= $_POST['penerbit'];
      $tahun= $_POST['tahun'];
      $jml_copy= $_POST['jml_copy'];


      //buat query untuk menyimpan Data
      $sql = "update t_buku
              set kode_buku = '$kode_buku',
                  judul = '$judul',
                  pengarang = '$pengarang',
                  penerbit='$penerbit',
                  tahun='$tahun',
                  jml_copy='$jml_copy'
              where id = '$id'";

      //eksekusi
      $hasil = mysqli_query ($conn, $sql);

      if ($hasil) {
         header ("Location: daftar_buku2.php");
      } else {
        echo mysqli_error($conn);

      }
  }
 ?>
