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
  <div class="card-header"><center><h4>Data Mahasiswa</center>
  <a href="form_simpan.php" class="btn btn-primary">Tambah Data</a>
  <a href="logout.php" class="btn btn-secondary float-right">Logout</a>
  </div>
</div>
  <table border="2" width="100%">
  <center>
  <tr>
    <th>NIM</th>
    <th>Nama Mahasiswa</th>
	<th>Tanggal Lahir</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
	<th>Nama Fakultas</th>
	<th>Nama Jurusan</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  include "koneksi.php";
  $sql = $pdo->prepare("SELECT * FROM mahasiswa JOIN jurusan on mahasiswa.id_jurusan = jurusan.id_jurusan JOIN fakultas on jurusan.id_jurusan = fakultas.id_jurusan ORDER BY nim");
  $sql->execute(); 
  while($data = $sql->fetch()){ 
    echo "<tr>";
    echo "<td>".$data['nim']."</td>";
    echo "<td>".$data['nama_mahasiswa']."</td>";
    echo "<td>".$data['ttl']."</td>";
    echo "<td>".$data['jk']."</td>";
    echo "<td>".$data['alamat']."</td>";
	echo "<td>".$data['nama_fakultas']."</td>";
	echo "<td>".$data['nama_jurusan']."</td>";
    echo "<td><a href='form_ubah.php?nim=".$data['nim']."'button class='btn btn-dark btn-sm'>Ubah</a></td>";
    echo "<td><a href='proses_hapus.php?nim=".$data['nim']."'button class='btn btn-warning btn-sm'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>