<?php
session_start(); 

if( ! isset($_SESSION['username'])){ 
  header("location: index.php"); 
}
?>
<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
  <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
  
</head>
<body>
<h1 class="card-title"><center>Universitas Smokers</h1>
  <div class="card">
  <div class="card-body">
    <p class="card-text"><center><h2>Selamat Datang !</center></p>
	<a href="welcome.php" class="btn btn-dark">Kembali</a>
  </div>
  <div class="card-header"><center><h4>Data Mata Kuliah</center>
  <a href="form_simpan4.php" class="btn btn-primary">Tambah Mata Kuliah</a>
  <a href="logout.php" class="btn btn-secondary float-right">Logout</a>
  </div>
</div>
  <table border="2" width="100%">
  <center>
  <tr>
    <th>Kode Mata Kuliah</th>
    <th>Nama Mata Kuliah</th>
	<th>SKS</th>
	<th>Semester</th>
	<th>Nama Jurusan</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  include "koneksi.php";
  $sql = $pdo->prepare("SELECT * FROM matkul JOIN jurusan ON matkul.id_jurusan = jurusan.id_jurusan");
  $sql->execute();
  while($data = $sql->fetch()){ 
    echo "<tr>";
    echo "<td>".$data['kode_mk']."</td>";
    echo "<td>".$data['nama_mk']."</td>";
    echo "<td>".$data['sks']."</td>";
	echo "<td>".$data['semester']."</td>";
	echo "<td>".$data['nama_jurusan']."</td>";
    echo "<td><a href='form_ubah4.php?kode_mk=".$data['kode_mk']."'button class='btn btn-dark btn-sm'>Ubah</a></td>";
    echo "<td><a href='proses_hapus4.php?kode_mk=".$data['kode_mk']."'button class='btn btn-warning btn-sm'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>