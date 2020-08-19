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
  <div class="card-header"><center><h4>Data Jurusan</center>
  <a href="logout.php" class="btn btn-secondary float-right">Logout</a>
  </div>
</div>
  <table border="2" width="100%">
  <center>
  <tr>
    <th>Kode Jurusan</th>
    <th>Nama Jurusan</th>
  </tr>
  <?php
  include "koneksi.php";
  $sql = $pdo->prepare("SELECT * FROM jurusan");
  $sql->execute();
  while($data = $sql->fetch()){ 
    echo "<tr>";
    echo "<td>".$data['id_jurusan']."</td>";
    echo "<td>".$data['nama_jurusan']."</td>";
    echo "</tr>";
  }
  ?>
  </table>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>