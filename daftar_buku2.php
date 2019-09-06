<?php session_start();
if(!isset($_SESSION["login"])){
  header("location: login1.php");
  exit;
 
if (isset($_GET['status']));
}
include_once ("koneksi.php") ?>
<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Perpustakaan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    table{
      border-collapse: collapse;
      margin:auto;
    }
    th {
      background-color: MediumSeaGreen;
      color:white;
      height: 25px;
    }
    .content{
      height: 500px;
    }
    body{
      font-family: calibri;
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
</head>

<body>
  <?php 
include_once "header.php";
 ?>  
  <br>
 <center>
  <h3> DAFTAR BUKU</h3>
  <a href="form_buku.php"><button type="button" class="btn btn-warning"> <i class="fa fa-plus">Tambah Buku</i></button></a>&nbsp;
  <a href="daftar_buku2.php"><button type="button" class="btn btn-warning"><i class=" fa fa-refresh">Refresh Data</i></button></a> &nbsp;
  <a href="cari_buku2.php"><button type="button" class="btn btn-warning"><i class="fa fa-search">Cari Buku</i></button></a> &nbsp;<br><br>
  <form action="" method="post">
          <input type="text" name="kata_kunci" size="50" autofocus placeholder="masukan keyword pencarian.." autocomplete="off" id="keyword">
          <button type="submit" name="submit" class="btn btn-warning"> <i class="fa fa-search"></i></button>
          <br> 
        </form><br>
  
  
    <table class="table table-hover" >
      <thead>
        <tr class="table-info">
              <th width="35px">No.</th>
              <th>Nomor Buku</th>
              <th>Judul Buku</th>
              <th>Pengarang</th>
              <th>Penerbit</th>
              <th>Tahun Terbit</th>
              <th width="110px">Jumlah Copy</th>
              <th width="200px">Opsi</th>
          </tr>
      </thead>
      <tbody>
  

<?php
     //koneksi
     include "koneksi.php";

     //cetak semua var 
     //print_r ($_POST);
     // return 0;
      if (isset($_POST['batal'])){
        header ("location: daftar_buku2.php");
      }
     //tangkap kriteria
     if (isset($_POST['submit'])) {
 
       //tangkap judul dari form
       $kata_kunci = '%' . $_POST['kata_kunci'] . '%';
     
      //buat query untuk mengambil data koleksi Buku
      $sql = "select * from t_buku where judul like '$kata_kunci' or
                        pengarang like '$kata_kunci' or
                        penerbit like '$kata_kunci'";
     
     }else{
       $sql="select *from t_buku order by judul asc limit 20";
     }
      //eksekusi
      $hasil = mysqli_query ($conn, $sql);
     
      //jika tidak ditemukan berikan Perpustakaan
      if (mysqli_num_rows($hasil)==0) {
        echo "Data buku tidak ada...";
        return 0;
      }
          //nilai awal penomoran
      $nomor=1;

      //mencatat total copy
      $total_copy=0;

      //klo ada, tampilkan deh semua data buku
     while ($data = mysqli_fetch_array($hasil))
     {
      //tampilkan hasil eksekusi
      $id = $data['id'];

	  echo "<tr class='table-default'>";
      echo "<td>".$nomor . "</td>";
      echo "<td>".$data['kode_buku'] ."</td>";
      echo "<td>".$data['judul'] ."</td>";
      echo "<td>".$data['pengarang'] ."</td>";
      echo "<td>".$data['penerbit'] ."</td>";
      echo "<td>".$data['tahun'] ."</td>";
      echo "<td>".$data['jml_copy'] ."</td>";
      
      //menambahkan total copy buku
      $total_copy=$total_copy+$data['jml_copy']; 

       //nomor bertambah 1
       $nomor++;

       echo '<td>
       <a href="daftar_buku_detail.php?id='.$data['id'].'">Detail</a> |
       <a href="form_buku_edit.php?id='.$data['id'].'"><i class="fa fa-edit"></i>Edit</a> | <a href="hapus_buku.php?id='.$data['id'].'" onclick="return confirm(\'Yakin?\')"><i class="fa fa-trash"></i>Hapus</a></td>';
       echo "</tr>";
    }
  
 ?>
</tbody>
      <tr>
        <td colspan='8'>Total Copy : <?php echo $total_copy; ?></td>
      </tr>
 </table>
 <?php include_once "footer.php" ?>
 </body>
 </html>
