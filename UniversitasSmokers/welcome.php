<?php
session_start(); 

if( ! isset($_SESSION['username'])){ 
  header("location: index.php"); 
}
?>
<html>
<head>
  <title>Halaman Setelah Login</title>
  <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
</head>
<body>
<center>
  <br>
  <br>
<div class="jumbotron">
  <h1 class="display-4">Selamat datang <?php echo $_SESSION['nama']; ?></h5>
  <p class="lead">Silahkan Memilih Pilihan Menu</p>
  <hr class="my-4">
  <p> CRUD </p>
  <p class="lead">
  <a href="index1.php"class="btn btn-primary">Mahasiswa</a>
  <a href="index2.php"class="btn btn-primary">Dosen</a>
    <a href="index3.php" class="btn btn-primary">Nilai Mahasiswa</a>
	<a href="index4.php" class="btn btn-primary">Mata Kuliah</a>
	<a href="index5.php" class="btn btn-primary">Jurusan</a>
	<a href="index6.php" class="btn btn-primary">Fakultas</a>
  </p>
  <a href="logout.php" button type="button" class="btn btn-secondary">Logout</a>
  </div>
  <br>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html