<?php
  //buka koneksi
  include "koneksi.php";
  //print_r ($_POST);

  //ambil semua data
  //dari form
  $nomor_anggota      = $_POST['nomor_anggota'];
  $nama               = $_POST['nama'];
  $alamat             = $_POST['alamat'];
  $email              = $_POST['email'];
  $no_telp            = $_POST['no_telp'];
  $tanggal_entry      = $_POST['tanggal_entry'];


  if (isset($_POST['batal'])){
    header ("location: daftar_anggota.php");
  }
  //jika nomor anggota kosong
  //maka isi kembali formnya
  if (empty($nomor_anggota)) {
    echo "Data yang dimasukkan tidak sesuai! <br>";
    echo "<a href='form_anggota.php'>Isi Data Kembali </a>";

    //agar keluar (berhenti)
    return 0;
  }

  //jika tombol simpan ditekan
  if (isset($_POST['simpan'])) {

    //siapkan query
    $sql = "insert into t_anggota (nomor_anggota,nama,alamat,email,no_telp,tanggal_entry) values ('$nomor_anggota','$nama','$alamat','$email','$no_telp','$tanggal_entry')";

    //eksekusi query
    $eksekusi = mysqli_query($conn,$sql);

    //jika eksekusi sukses
    //maka larikan ke daftar_anggota
    if ($eksekusi) {
        header("location: daftar_anggota.php");
    } else {
      echo mysqli_error($conn);
      return 0;
    }

  }

 ?>
