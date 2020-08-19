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
  <h1>Ubah Data Mahasiswa</h1>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">Universitas Smokers</h5>
    <p class="card-text">Selamat Datang !</p>
  </div>
  <div class="card-header"><h3>Data Mahasiswa
  </div>
</div>
  <?php
  include "koneksi.php";
  $kode_mk = $_GET['kode_mk'];
  $sql = $pdo->prepare("SELECT * FROM matkul WHERE kode_mk=:kode_mk");
  $sql->bindParam(':kode_mk', $kode_mk);
  $sql->execute();
  $data = $sql->fetch();
  ?>
  <form method="post" action="proses_ubah4.php?kode_mk=<?php echo $kode_mk; ?>">
    <table cellpadding="8">
      <tr>
        <td>Kode Mata Kuliah</td>
        <td><input class="form-control" type="text" name="kode_mk" value="<?php echo $data['kode_mk']; ?>" readonly></td>
      </tr>
      <tr>
        <td>Nama Mata Kuliah</td>
        <td><input class="form-control" type="text" name="nama_mk" value="<?php echo $data['nama_mk']; ?>">
		</td>
      </tr>
	  <tr>
        <td>SKS</td>
        <td><input class="form-control" type="text" name="sks" value="<?php echo $data['sks']; ?>">
		</td>
      </tr>
      <tr>
        <td>Semester</td>
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
        </td>
      </tr>
	  <tr>
        <td>Nama Jurusan</td>
        <td>
		<input class="form-control" type="text" name="id_jurusan" value="<?php echo $data['id_jurusan']; ?>">
		</td>
      </tr>
    </table>
    <hr>
    <input type="submit" class="btn btn-primary" value="Ubah">
    <a href="index4.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>