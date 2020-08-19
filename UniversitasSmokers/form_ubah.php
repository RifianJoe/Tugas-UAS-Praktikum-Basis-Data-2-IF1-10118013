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
  $nim = $_GET['nim'];
  $sql = $pdo->prepare("SELECT * FROM mahasiswa WHERE nim=:nim");
  $sql->bindParam(':nim', $nim);
  $sql->execute();
  $data = $sql->fetch();
  ?>
  <form method="post" action="proses_ubah.php?nim=<?php echo $nim; ?>">
    <table cellpadding="8">
      <tr>
        <td>NIM</td>
        <td><input class="form-control" type="text" name="nim" value="<?php echo $data['nim']; ?>" readonly></td>
      </tr>
      <tr>
        <td>Nama Mahasiswa</td>
        <td><input class="form-control" type="text" name="nama_mahasiswa" value="<?php echo $data['nama_mahasiswa']; ?>"></td>
      </tr>
	  <tr>
        <td>Tanggal Lahir</td>
        <td><input class="form-control" type="text" name="ttl" value="<?php echo $data['ttl']; ?>"></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>
        <?php
        if($data['jk'] == "Laki-laki"){
          echo "<input type='radio' name='jk' value='Laki-laki' checked='checked'> Laki-laki  ";
          echo "<input type='radio' name='jk' value='Perempuan'> Perempuan";
        }else{
          echo "<input type='radio' name='jk' value='Laki-laki'> Laki-laki  ";
          echo "<input type='radio' name='jk' value='Perempuan' checked='checked'> Perempuan";
        }
        ?>
        </td>
      </tr>
	  <tr>
        <td>Alamat</td>
        <td><textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea></td>
      </tr>
      <tr>
        <td>Id Fakultas</td>
		<td>
		<select class="form-control" name="id_fakultas">
		<?php
		// Load file koneksi.php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM fakultas ");
			$sql->execute();
			while($data = $sql->fetch()){ 
            echo "<option value='".$data['id_fakultas']."'>".$data['nama_fakultas']."</option>";
			}
			?>
		</td>
      </tr>
	  <tr>
        <td>Id Jurusan</td>
        <td>
		<select class="form-control" name="id_jurusan">
		<?php
		// Load file koneksi.php
		include "koneksi.php";
			$sql = $pdo->prepare("SELECT * FROM jurusan ");
			$sql->execute();
			while($data = $sql->fetch()){ 
            echo "<option value='".$data['id_jurusan']."'>".$data['nama_jurusan']."</option>";
			}
			?>
		</td>
      </tr>
    </table>
    <hr>
    <input type="submit" class="btn btn-primary" value="Ubah">
    <a href="index1.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>