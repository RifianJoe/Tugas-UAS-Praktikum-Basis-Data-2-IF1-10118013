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
  <div class="card-header"><center><h4>Data Nilai</center>
  <a href="form_nilai.php" class="btn btn-primary">Tambah Nilai</a>
  <a href="logout.php" class="btn btn-secondary float-right">Logout</a>
  </div>
</div>
  <table border="2" width="100%">
  <center>
  <tr>
    <th>NIM</th>
    <th>Nama Mahasiswa</th>
	<th>Nama Dosen</th>
	<th>Nama Mata Kuliah</th>
	<th>Semester</th>
	<th>Nilai</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  include "koneksi.php";
  $sql = $pdo->prepare("SELECT * FROM nilai JOIN mahasiswa on nilai.nim = mahasiswa.nim JOIN matkul on nilai.kode_mk = matkul.kode_mk JOIN dosen on nilai.nip = dosen.nip");
  $sql->execute();
  while($data = $sql->fetch()){ 
    echo "<tr>";
    echo "<td>".$data['nim']."</td>";
    echo "<td>".$data['nama_mahasiswa']."</td>";
    echo "<td>".$data['nama_dosen']."</td>";
	echo "<td>".$data['nama_mk']."</td>";
	echo "<td>".$data['semester']."</td>";
	echo "<td>".$data['nilai']."</td>";
    echo "<td><a href='form_ubah3.php?id=".$data['id_nilai']."'button class='btn btn-dark btn-sm'>Ubah</a></td>";
    echo "<td><a href='proses_hapus3.php?id=".$data['id_nilai']."'button class='btn btn-warning btn-sm'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>