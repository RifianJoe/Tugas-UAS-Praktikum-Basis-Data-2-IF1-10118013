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
<center>
  <h1>Isi Nilai Mahasiswa</h1>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"><center>Selamat Datang !</center></p>
  </div>
  <div class="card-header"><center>Data Mahasiswa</center>
  </div>
</div>
  <form method="post" action="proses_nilai.php">
    <table cellpadding="8">
	<div class="form-group">
      <tr>
        <td>Nama Mahasiswa</td>
        <td>
		<select class="custom-select" name="nim">
		<?php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM nilai JOIN mahasiswa on nilai.nim = mahasiswa.nim JOIN matkul on nilai.kode_mk = matkul.kode_mk JOIN dosen on nilai.nip = dosen.nip");
			$sql->execute();
			while($data = $sql->fetch()){ 
            echo "<option value='".$data['nim']."'>".$data['nama_mahasiswa']."</option>";
			}
			?>
		</td>
      </tr>
	  <tr>
        <td>Nama Dosen</td>
        <td>
		<select class="custom-select" name="nip">
		<?php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM nilai JOIN mahasiswa on nilai.nim = mahasiswa.nim JOIN matkul on nilai.kode_mk = matkul.kode_mk JOIN dosen on nilai.nip = dosen.nip");
			$sql->execute();
			while($data = $sql->fetch()){ 
            echo "<option value='".$data['nip']."'>".$data['nama_dosen']."</option>";
			}
			?>
		</td>
      </tr>
	  <tr>
        <td>Nama Mata Kuliah</td>
        <td>
		<select class="custom-select" name="kode_mk">
		<?php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM nilai JOIN mahasiswa on nilai.nim = mahasiswa.nim JOIN matkul on nilai.kode_mk = matkul.kode_mk JOIN dosen on nilai.nip = dosen.nip");
			$sql->execute();
			while($data = $sql->fetch()){ 
            echo "<option value='".$data['kode_mk']."'>".$data['nama_mk']."</option>";
			}
			?>
		</td>
      </tr>
	  <tr>
        <td>Nilai</td>
        <td>
		<input type="text" class="form-control" placeholder="Masukkan Nilai Mahasiswa" required name="nilai">
		</td>
      </tr>
	  </div>
    </table>
    <hr>
    <input type="submit" class="btn btn-primary" value="Simpan" >
    <a href="index3.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>