<?php
    session_start();

    //buka koneksi
    include"koneksi.php";

    if ( isset($_POST["Login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM t_admin WHERE username = '$username'");


    //cek username
    if(mysqli_num_rows($result) == 1){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if(isset($_POST["remember"]) ){
                // buat cookie
                setcookie('Login', 'true', time() +160);
            }
            header("Location: index.php");
            exit;
        }
    }


    $error = true;
}
    
    ?>