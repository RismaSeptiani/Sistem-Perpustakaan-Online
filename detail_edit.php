<?php
  //buka koneksi
  include "koneksi.php";

      
  //cetak semua data hihihi
  //jgn lupa ditutup loh klo dah beres
  //print_r ($_POST);
  //exit;
      
    $id=$_POST['id'];
    $id_buku_detail=$_POST['id_buku_detail'];
    $nomor_registrasi=$_POST['nomor_registrasi'];

   if(isset($_POST['batal'])){
       header("location: daftar_buku_detail.php?id=$id");
      }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])){



      //buat query untuk menyimpan Data
      $sql = "update t_buku_detail
              set nomor_registrasi = '$nomor_registrasi' 
                           where id = '$id_buku_detail'";

      //eksekusi
      $hasil = mysqli_query ($conn, $sql);

      if ($hasil) {
         header ("Location: daftar_buku_detail.php?id=$id");
         //echo "<a href='daftar_buku_detail.php?id='$id_buku_detail'>lihat hasil</a>";
      } else {
        echo mysqli_error($conn);

      }
  }
 ?>
