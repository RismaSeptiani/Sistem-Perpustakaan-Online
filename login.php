<?php 
session_start();

//cek cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];
	
	//ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM t_admin WHERE id = $id");
	$row = mysqli_fetch_assoc(result);
	
	//cek cookie dan username
	if($key === hash('sha256', $row['username'])){
		$_SESSION['login'] = true;
	}

}

if(isset($_SESSION["login"])){
	header("location: index.php");
	exit;
}

include "koneksi.php";

if(isset($_POST["login"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM t_admin WHERE username= '$username'");

	//cek username
	if(mysqli_num_rows($result) == 1) {

		//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			//set session
			$_SESSION["login"] = true;

			//check remember me
			if(isset ($_POST['remember'])){
				//buat cookie
			
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("location: index.php");
			exit;
		}   
	}

	$error = true;

}
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login </title>
	<link rel="stylesheet" href="style.css" type="text/css" href="">
</head>
<body>

<form action="" method="post">
	
		<h1><center> Login </h1><br>

	<div class="imgcontainer">
    <img src="img/logo.png" alt="Avatar"  width="100px" height="100px">
  </div>

  <div class="container">

  	<?php if(isset($error)) : ?>
	<p style="color : red; font-style: italic;"> Username / Password Salah </p> 
	<?php endif; ?>

    <label><b>Username</b></label>
    <input type="text" placeholder="Masukkan Username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="password" required>
        
    <button type="submit" name="login">Masuk</button>
    <input type="checkbox" checked="checked"><span>Ingat Saya</span>
  </div>

  <!--<div class="container" style="background-color:#f1f1f1">-->
  	<div class="container">
    <button type="button" class="cancelbtn">Batal</button>
    <span class="daftar">Belum Punya Akun? <a href="register.php">Daftar</a></span>
  </div>

</form>

</body>
</html> 
