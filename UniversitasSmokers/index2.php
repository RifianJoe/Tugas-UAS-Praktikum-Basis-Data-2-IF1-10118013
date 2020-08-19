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
  <div class="card-header"><center><h4>Data Dosen</center>
  <a href="form_simpan2.php" class="btn btn-primary">Tambah Data</a>
    <a href="logout.php" class="btn btn-secondary float-right">Logout</a>
  </div>
</div>
  
  <table border="2" width="100%">
  <tr>
    <th>NIM</th>
    <th>Nama Dosen</th>
	<th>Tanggal Lahir</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
	<th>Mata Kuliah</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  include "koneksi.php";
  $sql = $pdo->prepare("SELECT * FROM dosen JOIN matkul on dosen.kode_mk = matkul.kode_mk ORDER BY nip");
  $sql->execute();
  while($data = $sql->fetch()){
    echo "<tr>";
    echo "<td>".$data['nip']."</td>";
    echo "<td>".$data['nama_dosen']."</td>";
    echo "<td>".$data['ttl']."</td>";
    echo "<td>".$data['jk']."</td>";
    echo "<td>".$data['alamat']."</td>";
	echo "<td>".$data['nama_mk']."</td>";
    echo "<td><a href='form_ubah2.php?nip=".$data['nip']."'button class='btn btn-dark btn-sm'>Ubah</a></td>";
    echo "<td><a href='proses_hapus2.php?nip=".$data['nip']."'button class='btn btn-warning btn-sm'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>