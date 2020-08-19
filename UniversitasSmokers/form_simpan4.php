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
  <h1>Tambah Data Mata Kuliah</h1>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p class="card-text"><center>Selamat Datang !</center></p>
  </div>
  <div class="card-header"><center><h3>Data Mata Kuliah</center>
  </div>
</div>
  <form method="post" action="proses_simpan4.php">
    <table cellpadding="8">
	<div class="form-group">
      <tr>
        <td><label class = "form-group">Kode Mata Kuliah</label></td>
        <td><input type="text" class="form-control" placeholder="Masukkan Kode Mata Kuliah" required name="kode_mk"></td>
      </tr>
      <tr>
        <td><label class = "form-group">Nama Mata Kuliah</td>
        <td><input type="text" class="form-control" placeholder="Masukkan Nama Mata Kuliah" required name="nama_mk"></td>
      </tr>
	  <tr>
        <td><label class = "form-group">Sistem Kredit per Semester (SKS)</td>
        <td><input type="text" class="form-control" placeholder="Masukkan SKS" required name="sks"></td>
      </tr>
      <tr>
        <td><label class = "form-group">Semester</td>
        <td>
		<select class="form-control" name="semester">
        <option value="1"> 1
		<option value="2"> 2
		<option value="3"> 3
		<option value="4"> 4
		<option value="5"> 5
		<option value="6"> 6
		<option value="7"> 7
		<option value="8"> 8
		</select>
        </td>
      </tr>
	  <tr>
        <td><label class = "form-group">Nama Jurusan</td>
        <td>
		<select class="form-control" name="id_jurusan">
		<?php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM jurusan");
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
    <a href="index4.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>