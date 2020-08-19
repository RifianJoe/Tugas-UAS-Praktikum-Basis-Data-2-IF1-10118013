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
  <h1>Tambah Data Dosen</h1>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"><center>Selamat Datang !</center></p>
  </div>
  <div class="card-header"><center><h3>Data Dosen</center>
  </div>
</div>
  <form method="post" action="proses_simpan2.php">
    <table cellpadding="8">
	<div class="form-group">
      <tr>
        <td><label class = "form-group">NIP </label></td>
        <td><input type="text" class="form-control" placeholder="Masukkan NIM Dosen" required name="nip"></td>
      </tr>
      <tr>
        <td>Nama Dosen</td>
        <td><input type="text" class="form-control" placeholder="Masukkan Nama Dosen" required name="nama_dosen"></td>
      </tr>
	  <tr>
        <td>Tanggal Lahir</td>
        <td><input type="text" class="form-control" placeholder="Masukkan Tanggal Lahir Dosen" required name="ttl"></td>
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
        <td><textarea class="form-control" placeholder="Masukkan Alamat Dosen" required name="alamat"></textarea></td>
      </tr>
	  <tr>
        <td>Mata Kuliah</td>
        <td>
		<select class="form-control" name="kode_mk">
		<?php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM matkul ");
			$sql->execute();
			while($data = $sql->fetch()){ 
            echo "<option value='".$data['kode_mk']."'>".$data['nama_mk']."</option>";
			}
			?>
		</select>
		</textarea></td>
      </tr>
	  </div>
    </table>
    <hr>
    <input type="submit" class="btn btn-primary" value="Simpan" >
    <a href="index2.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>