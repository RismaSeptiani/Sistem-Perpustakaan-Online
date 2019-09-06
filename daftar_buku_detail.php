<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Perpustakaan</title>
    <style>
    table{
      border-collapse: collapse;
    }
    body{
      font-family: calibri;
    }
    th {
      background-color: MediumSeaGreen;
      color:white;
      height: 25px;
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
//tangkap kriteria
     if (isset($_GET['id'])) {
 
       //tangkap judul dari form
       $id = $_GET['id'];
       //echo $id;
       //exit;
    }
 ?>
 <?php include_once "header.php"; ?>
   </div><br>
  <table class="table table-hover" >
      <thead>
        <tr class="table-info">
              <th>No.</th>
              <th>Nomor Registrasi</th>
              <th>Status Tersedia</th>
              <th>Dipinjam Oleh</th>
              <th>Opsi</th>
          </tr>
      </thead>
      <tbody>
  <center>
  <h3> DAFTAR BUKU DETAIL </h3>
  <a href="form_buku_detail.php?id=<?php echo $id; ?>"><button type="button" class="btn btn-warning"> <i class="fa fa-plus">Tambah Buku Detail</i></button></a> &nbsp;
  <a href="daftar_buku2.php"><button type="button" class="btn btn-warning">Daftar Buku</button></a> <br><br>

  

<?php
     //koneksi
     include "koneksi.php";

     //cetak semua var 
     //print_r ($_POST);
     // return 0;
 
     //tangkap kriteria
     if (isset($id)) {
     
      //buat query untuk mengambil data koleksi Buku
      $sql = "select * from t_buku_detail where id_buku='$id' order by nomor_registrasi";
     
     }else{
       header ("location: daftar_buku2.php");
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

      //klo ada, tampilkan deh semua data buku
     while ($data = mysqli_fetch_array($hasil))
     {
      //tampilkan hasil eksekusi
      $id_buku_detail = $data['id'];

	  echo "<tr>";
      echo "<td>".$nomor . "</td>";
      echo "<td>".$data['nomor_registrasi'] ."</td>";
      
      //tersedia=1,kosong=0
        if ($data['status_tersedia']==1){
        $tersedia="Buku Tersedia";
      } else{
        $tersedia="Kosong";
      }
      
      echo "<td>".$tersedia ."</td>";
      echo "<td>".$data['dipinjam_oleh'] ."</td>";
       //nomor bertambah 1
       $nomor++;

        echo '<td><a href="form_detail_edit.php?id='.$id.'&id_buku_detail='.$id_buku_detail.'">Edit</a> ';
        echo '| <a href="hapus_detail.php?id='.$data['id'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';
       echo "</tr>";
       echo "</tr>";
    }
  
 ?>
</tbody>
</table>
</body>
</html>
<?php include_once "footer.php"; ?>