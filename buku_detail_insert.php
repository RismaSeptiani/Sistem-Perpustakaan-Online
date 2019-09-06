<?php
  //buka koneksi
  include "koneksi.php";
  //print_r ($_POST);
  //exit;

  //ambil semua data
  //dari form
  $id         =$_POST['id'];
  $nomor_registrasi  = $_POST['nomor_registrasi'];
  $status_tersedia   = $_POST['status_tersedia'];

if (isset($_POST['batal'])){
    header ("location: daftar_buku_detail.php");
  }
  //jika kode_buku kosong
  //maka isi kembali formnya
  if (empty($nomor_registrasi)) {
    echo "Data yang dimasukkan tidak valid! <br>";
    echo "<a href='form_buku_detail.php'>Isi Buku Kembali </a>";

    //agar keluar (berhenti)
    return 0;
  }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

    //siapkan query
    $sql = "insert into t_buku_detail (id_buku,nomor_registrasi,status_tersedia) values ('$id','$nomor_registrasi','$status_tersedia')";

    //eksekusi query
    $eksekusi = mysqli_query($conn,$sql);

    //jika eksekusi sukses
    //maka larikan ke daftar_buku_detail
    
    //tambahkan jumlah copy pada tabel buku
    if ($eksekusi) {

        //tambahkan jumlah copy pada tabel buku
        $sql = "update t_buku set jml_copy= jml_copy+1 where id='$id'";
        $eksekusi = mysqli_query ($conn, $sql);
    if ($eksekusi) {
        header("location: daftar_buku_detail.php?id=$id");
    } else {
      echo mysqli_error($conn);
      return 0;
    }

  }
}
 ?>
