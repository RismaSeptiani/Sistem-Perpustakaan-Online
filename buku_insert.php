<?php
  //buka koneksi
  include "koneksi.php";
  //print_r ($_POST);

  //ambil semua data
  //dari form
  $kode_buku   = $_POST['kode_buku'];
  $judul        = $_POST['judul'];
  $pengarang    = $_POST['pengarang'];
  $penerbit     = $_POST['penerbit'];
  $tahun        = $_POST['tahun'];
  $jumlah_copy  = $_POST['jml_copy'];

if (isset($_POST['batal'])){
    header ("location: daftar_buku2.php");
  }
  
  //jika kode_buku kosong
  //maka isi kembali formnya
  if (empty($kode_buku)) {
    echo "Data yang dimasukkan tidak valid! <br>";
    echo "<a href='form_buku.php'>Isi Buku Kembali </a>";

    //agar keluar (berhenti)
    return 0;
  }


  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

    //siapkan query
    $sql = "insert into t_buku (kode_buku,judul,pengarang,
    penerbit,tahun,jml_copy) values ('$kode_buku','$judul','$pengarang',
    '$penerbit','$tahun','$jumlah_copy')";

    //eksekusi query
    $eksekusi = mysqli_query($conn,$sql);

    //jika eksekusi sukses
    //maka larikan ke daftar_buku2
    if ($eksekusi) {
        header("location: daftar_buku2.php");
    } else {
      echo mysqli_error($conn);
     echo "<br><a herf='daftar_buku2.php'>Kembali</a>";
      return 0;
    }

  }

 ?>
