<!DOCTYPE html>
<html>
<head>
    <title>Perpus</title>
</head>
<style>
.header{
	width: 100%;
	height: 50%;
    margin:0;
    padding: 20px;
    color:white;
    background-color: MediumSeaGreen;
    font-size: 40px;
    font-family: calibri;

}
.navigation{
	width:100%;
	height:35px;
	background-color:orange;
	padding:5px;
	border:0;
	}
.navigation ul{
}
.navigation ul li{
	width:120px;
	height:35px;
	float:left;
	list-style:none;
	text-align:center;
	line-height:35px;
	font-family:calibri;
	padding:5px;
	background-color:mediumseagreen;
	color:white;
	margin:0;
}
.navigation ul a{
	color:white;
	text-decoration:none;
}
.navigation ul li:hover{
	background-color:dodgerblue;
}
.navigation ul li ul{
	display:none;
}
.navigation ul li:hover ul{
	display:block;
}
.navigation ul li ul li{
	background-color:grey;
}
.navigation ul li ul li:hover{
	background-color:black;
}
	
</style>
<body>
        <div class="header">            
            <p align="center">Perpustakaan SMKN 1 Katapang</p>
            
        </div>
        <div class="navigation">
            <ul>
                <li><a href="daftar_anggota.php">Anggota</a></li>
                <li><a href="daftar_buku2.php">Buku</a></li>
                <li><a href="register.php">Registrasi</a></li>
                <li><a href="login1.php">Login</a></li>
                <li><a href="logout.php">Logout</a></li>              
            </ul>
        </div>
</body>
</html>
