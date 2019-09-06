<?php
include 'koneksi.php';
$nomor_anggota = $_GET['nomor_anggota'];
$query = mysqli_query($conn, "select * from t_anggota where nomor_anggota='$nomor_anggota'");
$hasil = mysqli_fetch_array($query);
$data = array(
            'nomor_anggota'      =>  $hasil['nomor_anggota'],
            'nama'   =>  $hasil['nama'],
            'alamat'    =>  $hasil['alamat']);
 echo json_encode($data);
?>