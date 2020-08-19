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
  $id = $_GET['id'];
  $sql = $pdo->prepare("SELECT * FROM nilai JOIN mahasiswa on nilai.nim = mahasiswa.nim JOIN matkul on nilai.kode_mk = matkul.kode_mk JOIN dosen on nilai.nip = dosen.nip WHERE id_nilai=:id");
  $sql->bindParam(':id', $id);
  $sql->execute();
  $data = $sql->fetch();
  ?>
  <form method="post" action="proses_ubah3.php?id=<?php echo $id; ?>">
    <table cellpadding="8">
      <tr>
        <td>NIM</td>
        <td><input class="form-control" type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly></td>
      </tr>
      <tr>
        <td>Nama Mahasiswa</td>
        <td><input class="form-control" type="text" name="nama_mahasiswa" value="<?php echo $data['nama_mahasiswa']; ?>" readonly>
		</td>
      </tr>
	  <tr>
        <td>Nama Dosen</td>
        <td><input class="form-control" type="text" name="nama_dosen" value="<?php echo $data['nama_dosen']; ?>" readonly>
		</td>
      </tr>
      <tr>
        <td>Nama Mata Kuliah</td>
        <td>
        <input class="form-control" type="text" name="nama_mk" value="<?php echo $data['nama_mk']; ?>" readonly>
        </td>
      </tr>
	  <tr>
        <td>Semester</td>
        <td>
		<input class="form-control" type="text" name="semester" value="<?php echo $data['semester']; ?>" readonly>
		</td>
      </tr>
      <tr>
        <td>Nilai</td>
		<td>
		<input class="form-control" type="text" name="nilai" value="<?php echo $data['nilai']; ?>">
		</td>
      </tr>
    </table>
    <hr>
    <input type="submit" class="btn btn-primary" value="Ubah">
    <a href="index3.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>