<?php
    //buka koneksi
    include"koneksi.php";

    $username=$_POST['username'];
    $pass=$_POST['password'];
    $pass=password_hash($pass, PASSWORD_DEFAULT);
     //cek username
    $cekuser=mysqli_query($conn, "SELECT*FROM t_admin WHERE username='$username'");
    if (mysqli_num_rows($cekuser)>0){
        echo "<script> alert ('username sudah terdaftar')</script>";
        echo "<div align='center'>Username Sudah Terdaftar!<a href='register.php'>Back</a></div>";
    }else{
        if(!$username || !$pass){
            echo "<div align='center'>Masih ada data yang kosong!<a href='register.php'>Back</a>";
        }else{
            $simpan=mysqli_query($conn, "INSERT INTO t_admin(username, password) VALUES ('$username','$pass')");
            if($simpan){
                header("location: login.php");
            }else{
                echo "<div align='center'>Proses Gagal!</div>";
            }
        }
    }
    ?>