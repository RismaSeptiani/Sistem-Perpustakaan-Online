<?php
  //buka koneksi
  include "koneksi.php";

  //masukkan id data yang akan diedit
  $id = $_GET['id'];
  $id_buku_detail=$_GET['id_buku_detail'];

  //buat query untuk mencari data sesuai kriteria
  $sql="select * from t_buku_detail where id='$id_buku_detail'";

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
  $nomor_registrasi = $data['nomor_registrasi'];
  $status_tersedia = $data['status_tersedia'];
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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
<form class="content" action="detail_edit.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="hidden" name="id_buku_detail" value="<?php echo $id_buku_detail; ?>">
  <h2><center>Form Buku Detail Edit</center></h2>
    <div class="row">
      <div class="col-25">
        <label>Nomor Registrasi : </label>
      </div>
      <div class="col-75">
        <input type="text" name="nomor_registrasi" value="<?php echo $nomor_registrasi; ?>"><br>
      </div>
    </div>
      <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
      <button class="btn btn-danger" type="submit" name="batal">Batal</button>
  </form>
</div>

 
 <!--
  <br><br><form class="content" action="detail_edit.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="id_buku_detail" value="<?php echo $id_buku_detail; ?>">

      Nomor Registrasi :
      <input type="text" name="nomor_registrasi" value="<?php echo $nomor_registrasi; ?>"><br>
     
      <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
      <button class="btn btn-danger" type="submit" name="batal">Batal</button>
      
  </form> -->
  <?php include_once "footer.php" ?>
</body>
</html>
