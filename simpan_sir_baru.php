<?php
//buka koneksi
include_once 'koneksi.php';
include_once 'fungsi1.php';

$nomor_anggota=$_POST['nomor_anggota'];
$nomor_registrasi=$_POST['nomor_registrasi'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];

//cari id anggota
$sql = mysqli_query ($conn,"select id from t_anggota where nomor_anggota='$nomor_anggota'");
$hasil = mysqli_fetch_array($sql);
$id_anggota = $hasil['id'];
echo $id_anggota . "<br>";

//cari id_buku_detail
$sql = mysqli_query ($conn, "select id from t_buku_detail where nomor_registrasi='$nomor_registrasi'");
$hasil = mysqli_fetch_array($sql);
$id_buku_detail = $hasil['id'];
echo $id_buku_detail. "<br>";

//nomor registrasi
$kode_sirkulasi=get_nomor_sirkulasi();
echo $kode_sirkulasi . "<br>";

//batas pinjam
$tanggal_batas_kembali = date('Y-m-d', strtotime('+7 days', strtotime($tanggal_pinjam)));
echo $tanggal_batas_kembali;

//tambahkan data sirkulasi
$sql = "insert into t_sirkulasi (kode_sirkulasi,id_anggota,id_buku_detail,tanggal_pinjam,tanggal_batas_kembali) values ('$kode_sirkulasi','$id_anggota','$id_buku_detail',
'$tanggal_pinjam','$tanggal_batas_kembali')";
//eksekusi query
$eksekusi = mysqli_query($conn,$sql);

//jika eksekusi sukses
if ($eksekusi) {
     header("location: daftar_peminjaman.php");
} else {
  echo mysqli_error($conn);
}
//mengupdate data
$sql = "update t_buku_detail set status_tersedia=0 ,
								dipinjam_oleh='$id_anggota'
								where id='$id_buku_detail'";
//eksekusi query
$eksekusi = mysqli_query($conn,$sql);

//jika eksekusi sukses
if ($eksekusi) {
    echo "Berhasil";
} else {
  echo mysqli_error($conn);
  return 0;
}
?>  

