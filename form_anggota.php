<?php 

session_start();
if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;

if (isset($_GET['status']));
}
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
<body>

<?php include_once "header.php"
 ?>
<div class="container">
<form class="content" action="anggota_insert.php" method="post">
  <h2><center>Pendaftaran Anggota Baru</center></h2>
  <div class="row">
      <div class="col-25">
  <label>Tanggal Entry : </label>
  </div>
  <div class="col-75">
  <input type="date" value="<?php echo date('Y-m-d'); ?>" name="tanggal_entry">
</div>
</div>
    <div class="row">
      <div class="col-25">
        <label>Nomor Anggota : </label>
      </div>
      <div class="col-75">
        <input type="text" name="nomor_anggota" placeholder="Masukkan Nomor Anggota...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Nama Anggota :</label>
      </div>
      <div class="col-75">
        <input type="text" name="nama" placeholder="Masukkan Nama Anggota...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Alamat :</label>
      </div>
      <div class="col-75">
        <input type="text" name="alamat" placeholder="Masukkan Alamat Rumah Anda...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Email :</label>
      </div>
      <div class="col-75">
        <input type="email" name="email" placeholder="Masukkan Email Anda...">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>No. Telepon :</label>
      </div>
      <div class="col-75">
        <input type="text" name="no_telp" placeholder="Masukkan No Telepon Anda...">
      </div>
    </div>
      <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
      <button class="btn btn-danger" type="submit" name="batal">Batal</button>
  </form>
</div>
<?php include_once "footer.php" ?>


</body>
</html>

