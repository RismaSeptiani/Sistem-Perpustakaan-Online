<?php
session_start();
if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;

if (isset($_GET['status']));
}
?>
<DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Cobaan</title>
<style>
	input[type="submit"],input[type="reset"]{
        color:white;
        background-color: orange;
        border:1px solid orange;
        padding-top: 6px;
        padding-bottom: 6px;
      }
      body{
      	margin:10px;
      	 
      }
      .content{
        height: 450px;
      }
</style>
</head>
<body>
  <?php include_once "header.php" ?><br><br>
 
   <form class="content" action="simpan_sir_baru.php" method="post">
    <table align="center">
    <h1 align="center"> Form Sirkulasi Baru </h1>
        <tr><td>Nomor Anggota</td><td><input type="text" name="nomor_anggota" onchange="isi_otomatis()" id="nomor_anggota"></td></tr>
        <tr><td>Nama</td><td><input type="text" name="nama" id="nama" disabled></td></tr>
        <tr><td>Nomor Registrasi</td><td><input type="text" name="nomor_registrasi" onchange="autofill()" id="nomor_registrasi"></td></tr>
        <tr><td>Judul</td><td><input type="text" name="judul" id="judul" disabled></td></tr>
        <tr><td>Pengarang</td><td><input type="text" name="pengarang" id="pengarang" disabled></td></tr>
        <tr><td>Tanggal Pinjam</td><td><input type="date" value="<?php echo date('Y-m-d'); ?>" name="tanggal_pinjam"></td></tr>
        <tr><td><input type="submit" name="simpan" value="Submit">
    </table>
    </form>
     <script src="js/jquery.min.js"></script>
  <script type="text/javascript">
      function isi_otomatis(){
                var nomor_anggota = $("#nomor_anggota").val();
                $.ajax({
                    url: 'proses_anggota.php',
                    data:"nomor_anggota="+nomor_anggota ,
                }).done(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nomor_anggota').val(obj.nomor_anggota);
                    $('#nama').val(obj.nama);
                    $('#alamat').val(obj.alamat);
                });
            }
            function autofill(){
                var nomor_registrasi = $("#nomor_registrasi").val();
                $.ajax({
                    url: 'proses_detail.php',
                    data:"nomor_registrasi="+nomor_registrasi ,
                }).done(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nomor_registrasi').val(obj.nomor_registrasi);
                    $('#judul').val(obj.judul);
                    $('#pengarang').val(obj.pengarang);
                });
            }
        </script>
    <?php include_once "footer.php" ?>
</body>
</html>