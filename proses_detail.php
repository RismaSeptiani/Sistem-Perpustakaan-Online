<?php
include 'koneksi.php';
$nomor_registrasi = $_GET['nomor_registrasi'];
$query = mysqli_query($conn, "SELECT
t_buku_detail.nomor_registrasi,
t_buku.judul,
t_buku.pengarang
FROM
t_buku
INNER JOIN t_buku_detail ON t_buku_detail.id_buku = t_buku.id where nomor_registrasi='$nomor_registrasi';
");
$hasil = mysqli_fetch_array($query);
$data = array(
            'nomor_registrasi'      =>  $hasil['nomor_registrasi'],
            'judul'                 =>  $hasil['judul'],
            'pengarang'             =>  $hasil['pengarang']);
 echo json_encode($data);
?>