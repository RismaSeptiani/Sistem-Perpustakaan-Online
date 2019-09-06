<?php session_start();
if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;

if (isset($_GET['status']));
}
include_once("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Perpustakaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

    th {
      background-color: MediumSeaGreen;
      color: white;
      height: 25px;
    }

    body {
      padding: 10px;
      font-size: 16px;
      font-family: Calibri;

    }
    table{
      border-collapse: collapse;
    }
    td {
      padding :3pt;
    }
    tr:nth-child(even){
      background-color: #f2f2f2;
    }
    button {
     background-color: Orange;
     color: white;
     padding: 12px 18px;
     margin: 8px 0;
     border: none;
     cursor: pointer;
    }
    </style>
<body>
<?php 
include_once "header.php"; ?>
  <br>
  <center>
  <h3>DAFTAR ANGGOTA</h3>
  <div>
  <a href="form_anggota.php"><button type="button" class="btn btn-warning"> <i class="fa fa-plus">Tambah Anggota Baru</i></button></a> &nbsp;
  <a href="daftar_anggota.php"><button type="button" class="btn btn-warning"> <i class="fa fa-refresh">Perbaharui Data</i></button></a> &nbsp;<br><br>
  <form action="" method="post">
          <input type="text" name="kata_kunci" size="50" autofocus placeholder="Masukkan Kata Kunci Pencarian.." autocomplete="off" id="keyword">
          <button type="submit" name="submit" class="btn btn-warning"> <i class="fa fa-search"></i></button>
          <br> 
        </form><br>
  <table class="table table-hover" >
      <thead>
        <tr class="table-info">
              <th width="35px">No</th>
              <th width="140px">Nomor Anggota</th>
              <th>Nama Anggota</th>
              <th>Alamat</th>
              <th>Email</th>
              <th width="120px">No Telepon</th>
              <th width="140px">Opsi</th>
          </tr>
      </thead>
      <tbody>

  

<?php
     //koneksi
     include "koneksi.php";

     //cetak semua var 
     //print_r ($_POST);
     // return 0;
 
     //tangkap kriteria
     if (isset($_POST['submit'])) {
 
       //tangkap judul dari form
       $kata_kunci = '%'.$_POST['kata_kunci'].'%';
     
      //buat query untuk mengambil data koleksi Buku
      $sql = "select * from t_anggota where nama like '$kata_kunci' or alamat like '$kata_kunci'";
     
     }else{
       $sql="select *from t_anggota order by tanggal_entry desc limit 5";
     }
      //eksekusi
      $hasil = mysqli_query ($conn, $sql);
     
      //jika tidak ditemukan berikan Perpustakaan
      if (mysqli_num_rows($hasil)==0) {
        echo "Data Anggota tidak ada...";
        return 0;
      }
          //nilai awal penomoran
      $nomor=1;

      //klo ada, tampilkan deh semua data anggota
     while ($data = mysqli_fetch_array($hasil))
     {
      //tampilkan hasil eksekusi
      $id = $data['id'];

	  echo "<tr>";
      echo "<td>".$nomor . "</td>";
      echo "<td>".$data['nomor_anggota'] ."</td>";
      echo "<td>".$data['nama'] ."</td>";
      echo "<td>".$data['alamat'] ."</td>";
      echo "<td>".$data['email'] ."</td>";
      echo "<td>".$data['no_telp'] ."</td>";
       //nomor bertambah 1
       $nomor++;

       echo '<td><a href="form_anggota_edit.php?id='.$data['id'].'"><i class="fa fa-edit"></i>Edit</a> | <a href="hapus_anggota.php?id='.$data['id'].'" onclick="return confirm(\'Apakah Anda Yakin ingin menghapus data anggota?\')"><i class="fa fa-trash"></i>Hapus</a></td>';
       echo "</tr>";
    }
  
 ?>
</tbody>
</table>
<?php include_once "footer.php";
?>
</body>
 </html>

