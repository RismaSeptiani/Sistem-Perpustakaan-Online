<?php session_start();
if(!isset($_SESSION["login"])){
  header("location: login.php");
  exit;

if (isset($_GET['status']));
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Perpus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

</head>
<body>

<?php 
include_once "header.php"
 ?>


<!--<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="about">
    <h3>PERPUSTAKAAN CEURI</h3>
     <center> <img src="img/perpus.JPG" width="75%" height="380px"></center>
    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
  </div><br>
  <div class="tab-pane fade active in" id="contact">
     <p>Contact us and we'll get back to you with in 24 hours.</p>
      <p><span class="fa fa-map-marker"></span> Jl.Terusan Kopo KM 13.5 Katapang,Bandung</p>
      <p><span class="fa fa-phone"></span> 0895332287294</p>
      <p><span class="glyphicon glyphicon-envelope"></span> rismasptni09@gmail.com</p>
  </div>
</div>-->
<div class="jumbotron" href="index2.php" id="#about">
  <center><img src="img/logo.PNG" >
  <h1>PERPUSTAKAAN CEURI</h1></center>
  <p class="lead">Perpustakaan Ceuri merupakan portal web yang difungsikan sebagai layanan informasi perpustakaan. Pengguna portal ini hanya Pustakawan saja. Aplikasi ini dibuat agar memudahkan pekerjaan Pustakawan dalam mengelola Perpustakaan Ceuri. Aplikasi ini bisa diakses dengan cara melakukan registrasi terlebih dahulu. Kemudian Login sehingga anda dapat mengakses portal ini.</p>
   <center><img src="img/perpus.JPG" ></center>
  <hr class="my-4" id="contact">
  <center>
  <h5><b>Contact us and we'll get back to you with in 24 hours.</b></h5>
      <p><span class="fa fa-map-marker"></span> Jl.Terusan Kopo KM 13.5 Katapang,Bandung</p>
      <p><span class="fa fa-phone"></span> 0895332287294</p>
      <p><span class="fa fa-envelope"></span> kelompok6@gmail.com</p>
    </div> 


<?php include_once "footer.php" ?>
</body>
</html>
