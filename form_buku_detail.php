<?php
session_start();
if(!isset($_SESSION["login"])){
  header("location: login1.php");
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
<div class="container">
<form class="" action="buku_detail_insert.php" method="post">
  <h2 align="center">Form Buku Detail</h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="row">
      <div class="col-25">
        <label>Nomor Registrasi : </label>
      </div>
      <div class="col-75">
        <input type="text" name="nomor_registrasi" placeholder="Masukkan Nomor Registrasi..." autofocus>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Status Tersedia : </label>
      </div>
      <div class="col-75">
        <select name="status_tersedia">
           <option value="1">Tersedia</option>
           <option value="0">Kosong</option>
          </select>
      </div>
      
      <button class="btn btn-success" type="submit" name="simpan">Simpan</button>
      <button class="btn btn-danger" type="submit" name="batal">Batal</button>
  </form>
</div>

</body>
</html>
<?php include_once "footer.php"; ?>


