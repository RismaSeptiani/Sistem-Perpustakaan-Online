<?php
session_start();
if (isset($_SESSION['username'])){
    header ('location:index.php');
}
?>
<title>Form Pendaftaran User</title>
<link rel="stylesheet" href="style.css" type="text/css">
<div align='center'>
    <form action="prosdaf.php" method="post">
    	<h1>Registrasi</h1>
<div class="imgcontainer">
    <img src="img/logo.png" alt="Avatar"  width="100px" height="100px">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Masukkan Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="password" required>
        
    <button type="submit" name="register">Daftar</button>
  </div>

  <div class="container">
    <button type="button" class="cancelbtn">Batal</button>
  </div>
</form>
</div>