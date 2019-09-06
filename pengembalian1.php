<?php
include_once("koneksi.php");
$id = $_GET['id'];

	$sql = "SELECT t_sirkulasi.id ,
									t_anggota.nomor_anggota,
									t_anggota.nama,
									t_sirkulasi.kode_sirkulasi,
									t_buku.judul,
									t_sirkulasi.tanggal_pinjam,
									t_sirkulasi.tanggal_kembali,
									t_sirkulasi.denda,
									t_sirkulasi.id_buku_detail

                                      from t_sirkulasi, t_anggota, t_buku_detail, t_buku
                                      where t_sirkulasi.id='$id' and t_sirkulasi.id_anggota= t_anggota.id and
															    		t_sirkulasi.id_buku_detail= t_buku_detail.id and
															    		t_buku_detail.id_buku= t_buku.id";
	$eksekusi = mysqli_query ($conn,$sql);
	$data = mysqli_fetch_array($eksekusi);

/*
	echo $data['nomor_anggota']."<br>";
	echo $data['nama']."<br>";
	echo $data['nomor_sirkulasi']."<br>";
	echo $data['judul_buku']."<br>";
	echo $data['tanggal_pinjam']."<br>";

*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>peminjaman</title>
</head>
<center><h1> Form Peminjaman </h1>
    <form action="simpan_deui.php" method="post">
    	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
    	<input type="hidden" name="id_buku_detail" value="<?php echo $data['id_buku_detail'] ?>">
    <table>
        <tr><td>Nomor Anggota</td><td><input type="text" name="nomor_anggota" value="<?php echo $data['nomor_anggota']; ?>" disabled></td></tr>
        <tr><td>Nama Anggota</td><td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" disabled></td></tr>
    	<tr><td>Nomor Sirkulasi</td><td><input type="text" name="kode_sirkulasi" value="<?php echo $data['kode_sirkulasi'] ?>"disabled></td></tr>
    	<tr><td>Judul Buku</td><td><input type="text" name="judul" value="<?php echo $data['judul']; ?>" disabled></td></tr>
    	<tr><td>Tanggal Pinjam</td><td><input type="text" name="tanggal_pinjam" value="<?php echo $data['tanggal_pinjam']; ?>"disabled></td></tr>
			<tr><td>Tanggal Kembali</td><td><input type="date" name="tanggal_kembali" value="<?php echo date('Y-m-d'); ?>"></td></tr>
			<tr><td>Denda</td><td><input type="text" name="denda" value="<?php echo $data['denda']; ?>"></td></tr>
        <tr><td><input type="submit" name="simpan" value="submit">
    </table>
    </form></center>
</body>
</html>
