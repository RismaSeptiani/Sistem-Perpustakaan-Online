<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title> Perpustakaan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    h2{
      font-family: calibri;
    }
    th {
      background-color: MediumSeaGreen;
    }
    table{
      border-collapse: collapse;
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
    </style></head>
    

<body>
  <?php include_once "header.php" ?>
<br><div align="center">
    <h3>DAFTAR SIRKULASI </h3>
  <a href="form_sirkulasi_baru.php"><button type="button" class="btn btn-warning"> <i class="fa fa-plus">Tambah Sirkulasi Baru</i></button></a> &nbsp;
   <a href="daftar_peminjaman.php"><button type="button" class="btn btn-warning"> <i class="fa fa-refresh">Refresh Data</i></button></a> &nbsp;
<br><br>
 <form action="" method="post">
          <input type="text" name="kata_kunci" size="50" autofocus placeholder="masukan keyword pencarian.." autocomplete="off" id="keyword">
          <button type="submit" name="submit" class="btn btn-warning"> <i class="fa fa-search"></i></button>
          <br> 
        </form>
        <br></div>
   <table class="table table-hover" >
      <thead>
        <tr class="table-info">
              <th width="35px">No</th>
              <th>Nomor Sirkulasi</th>
              <th>Nomor Anggota</th>
              <th>Nama Anggota</th>
              <th>Nomor Registrasi Buku</th>
              <th>Judul Buku</th>
              <th>Tanggal Pinjam</th>
              <th>Batas Kembali</th>
              <th>Tanggal kembali</th>
              <th>Denda</th>
              <th>Opsi</th>
          </tr>
      </thead>
      <tbody>
<?php
    //buat koneksi ke db
    include_once "koneksi.php";

    // tangkap kriteria
    if (isset($_POST['submit'])){

        //tangkap judul dari form
      $kata_kunci = '%' . $_POST['kata_kunci'] . '%'; 

      //buat query untuk mengambil data koleksi buku
          $sql = "SELECT t_sirkulasi.id,t_sirkulasi.kode_sirkulasi,t_anggota.nomor_anggota,t_anggota.nama,t_buku_detail.nomor_registrasi,t_buku.judul,t_sirkulasi.tanggal_pinjam,t_sirkulasi.tanggal_batas_kembali,t_sirkulasi.tanggal_kembali,t_sirkulasi.denda 
                FROM t_sirkulasi,t_anggota,t_buku_detail,t_buku WHERE t_sirkulasi.id_anggota=t_anggota.id and t_sirkulasi.id_buku_detail=t_buku_detail.id and t_buku_detail.id_buku=t_buku.id and (t_anggota.nama like '$kata_kunci' or t_buku.judul like '$kata_kunci')";
    }else{
      //buat query untuk mengambil data koleksi buku
      $sql = "SELECT t_sirkulasi.id,
              t_sirkulasi.kode_sirkulasi,
              t_anggota.nomor_anggota,
              t_anggota.nama,
              t_buku_detail.nomor_registrasi,
              t_buku.judul,
              t_sirkulasi.tanggal_pinjam,
              t_sirkulasi.tanggal_batas_kembali,
              t_sirkulasi.tanggal_kembali,
              t_sirkulasi.denda
                from t_sirkulasi, t_anggota, t_buku_detail, t_buku
                where t_sirkulasi.id_anggota= t_anggota.id and
                t_sirkulasi.id_buku_detail= t_buku_detail.id and
                    t_buku_detail.id_buku=t_buku.id";

    }
    //eksekusi
    $hasil = mysqli_query ($conn, $sql);
    

      //nilai awal penomoran
        $nomor=1;

    //eksekusi query dengan pengulangan
    while ($data = mysqli_fetch_array($hasil))
    {


      //tampilkan hasil eksekusi
      $id = $data['id'];

      echo "<tr>";
      echo "<td>".$nomor . "</td>";
      echo "<td>".$data['kode_sirkulasi'] ."</td>";
      echo "<td>".$data['nomor_anggota'] ."</td>";
      echo "<td>".$data['nama'] ."</td>";
      echo "<td>".$data['nomor_registrasi'] ."</td>";
      echo "<td>".$data['judul'] ."</td>";
      echo "<td>".$data['tanggal_pinjam'] ."</td>";
      echo "<td>".$data['tanggal_batas_kembali'] ."</td>";
      echo "<td>".$data['tanggal_kembali'] ."</td>";
      echo "<td>".$data['denda'] ."</td>";
  
      //nomor bertambah 1
      $nomor++;

    echo '<td><a href="pengembalian1.php?id='.$id.'">Pengembalian Buku</a>';
    echo "</tr>";
    }

 ?>
</tbody>
</table>
</body>
<?php include_once "footer.php" ?>
