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
  <h1>Tambah Data Mahasiswa</h1>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"><center>Selamat Datang !</center></p>
  </div>
  <div class="card-header"><center>Data Mahasiswa</center>
  </div>
</div>
  <form method="post" action="proses_simpan.php">
    <table cellpadding="8">
	<div class="form-group">
      <tr>
        <td><label class = "form-group">NIM </label></td>
        <td><input type="text" class="form-control" placeholder="Masukkan NIM Mahasiswa" required name="nim"></td>
      </tr>
      <tr>
        <td>Nama Mahasiswa</td>
        <td><input type="text" class="form-control" placeholder="Masukkan Nama Mahasiswa" required name="nama_mahasiswa"></td>
      </tr>
	  <tr>
        <td>Tanggal Lahir</td>
        <td><input type="text" class="form-control" placeholder="Masukkan Tanggal Lahir Mahasiswa" required name="ttl"></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>
        <input type="radio" class="form-check-label" name="jenis_kelamin" value="L"> Laki-laki
        <input type="radio" class="form-check-label" name="jenis_kelamin" value="P"> Perempuan
        </td>
      </tr>
	  <tr>
        <td>Alamat</td>
        <td><textarea class="form-control" placeholder="Masukkan Alamat Mahasiswa" required name="alamat"></textarea></td>
      </tr>
      <tr>
        <td>Id Fakultas</td>
		<td>
		<select class="form-control" name="id_fakultas">
		<?php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM fakultas ");
			$sql->execute();
			while($data = $sql->fetch()){ 
            echo "<option value='".$data['id_fakultas']."'>".$data['nama_fakultas']."</option>";
			}
			?>
		</select>
		</td>
      </tr>
	  <tr>
        <td>Id Jurusan</td>
        <td>
		<select class="form-control" name="id_jurusan">
		<?php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM jurusan ");
			$sql->execute();
			while($data = $sql->fetch()){ 
            echo "<option value='".$data['id_jurusan']."'>".$data['nama_jurusan']."</option>";
			}
			?>
		</select>
		</td>
      </tr>
	  </div>
    </table>
    <hr>
    <input type="submit" class="btn btn-primary" value="Simpan" >
    <a href="index1.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>