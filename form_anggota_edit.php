<?php
  //buka koneksi
  include "koneksi.php";

  //masukkan id data yang akan diedit
  $id = $_GET['id'];

  //buat query untuk mencari data sesuai kriteria
  $sql="select * from t_anggota where id='$id'";

  //dapat hasil
  $hasil = mysqli_query($conn, $sql);

  //jika data tidak ada maka tampilkan pesan
  if (mysqli_num_rows($hasil)==0) {
      echo "Data tidak ada!";
      return 0;
  }

  //ambil data
  $data = mysqli_fetch_array($hasil);

  //masukkan data ke variabel
  $nomor_anggota = $data['nomor_anggota'];
  $nama = $data['nama'];
  $alamat = $data['alamat'];
  $email = $data['email'];
  $no_telp= $data['no_telp'];
?>

 <!DOCTYPE html>
<html>
<head>
<style>
* {
    box-sizing: border-box;
}
body{
  height: 30px;

}
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

button[name=simpan] {
    
    color: white;
    padding: 10px 18px;
    margin:2px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 900px;
}
button[name=batal] {
    
    color: white;
    padding: 10px 18px;
    margin:2px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 30px;
}

button[type=submit]:hover {
    background-color: grey;
}

.container {
    border-radius: 5px;
    padding: 20px;
    margin:10px;

}

.col-25 {
    float: left;
    width: 15%;
    margin-top: 6px;
    margin-left:50px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, button[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
</style>
<body>
  <?php include_once "header.php" ?>&nbsp;&nbsp;
  <div class="container">
<form class="content" action="anggota_edit.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <h2><center>Form Anggota Edit</center></h2>
    <div class="row">
      <div class="col-25">
        <label>Nomor Anggota : </label>
      </div>
      <div class="col-75">
        <input type="text" name="nomor_anggota" value="<?php echo $nomor_anggota; ?>"><br>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Nama Anggota :</label>
      </div>
      <div class="col-75">
        <input type="text" name="nama" value="<?php echo $nama; ?>"> <br>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Alamat :</label>
      </div>
      <div class="col-75">
        <input type="text" name="alamat" value="<?php echo $alamat; ?>"> <br>      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Email :</label>
      </div>
      <div class="col-75">
         <input type="text" name="email" value="<?php echo $email; ?>"> <br>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>No. Telpon :</label>
      </div>
      <div class="col-75">
       <input type="text" name="no_telp" value="<?php echo $no_telp; ?>"> <br>
      </div>
    </div>
      <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
      <button class="btn btn-danger" type="submit" name="batal">Batal</button>
  </form>
</div>
  <?php include_once "footer.php" ?>
  </body>
  </html>
