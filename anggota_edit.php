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
  //print_r ($_POST);
    if (isset($_POST['batal'])){
    header ("location: daftar_anggota.php");
  }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

      //catat semua var
      $id= $_POST['id'];
      $nomor_anggota= $_POST['nomor_anggota'];
      $nama= $_POST['nama'];
      $alamat= $_POST['alamat'];
      $email= $_POST['email'];
      $no_telp= $_POST['no_telp'];

      //buat query untuk menyimpan Data
      $sql = "update t_anggota
              set nomor_anggota = '$nomor_anggota',
                  nama= '$nama',
                  alamat = '$alamat',
                  email='$email',
                  no_telp='$no_telp'
              where id = '$id'";
      //eksekusi
      $hasil = mysqli_query ($conn, $sql);

      if ($hasil) {
         //echo "Mantap djiwa .....<br>";
         //echo "<a href='daftar_anggota.php'> Lihat Data </a>";
        header ("location: daftar_anggota.php");
      } else {
        echo mysqli_error($conn);

      }
  }
 ?>
