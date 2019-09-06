<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pencarian Anggota</title>
    <style>
      input[type="submit"],input[type="reset"]{
        color:white;
        background-color: orange;
        border: 1px solid orange;
        padding-top: 5px;
        padding-bottom: 5px;
      }
    </style>
  </head>
  <body>
    <form class="" action="daftar_anggota.php" method="post">
      <h1>Pencarian Data Anggota</h1>
        <label>Masukkan Kata Kunci : <br></label>
        <input type="text" name="kata_kunci" value=""><br><br>
        <input type="submit" name="submit" value="Cari">
        <input type="reset" name="reset" value="Reset">
    </form>
  </body>
</html>
