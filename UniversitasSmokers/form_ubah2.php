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
  <h1>Ubah Data Dosen</h1>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title">Universitas Smokers</h5>
    <p class="card-text">Selamat Datang !</p>
  </div>
  <div class="card-header"><h3>Data Dosen
  </div>
</div>
  <?php
  include "koneksi.php";
  $nip = $_GET['nip'];
  $sql = $pdo->prepare("SELECT * FROM dosen WHERE nip=:nip");
  $sql->bindParam(':nip', $nip);
  $sql->execute();
  $data = $sql->fetch();
  ?>
  <form method="post" action="proses_ubah2.php?nip=<?php echo $nip; ?>">
    <table cellpadding="8">
      <tr>
	  <fieldset disabled>
	  <div class="form-group">
        <td><label for="disabledTextInput">NIP</td>
        <td><input type="text" id="disabledTextInput" class="form-control" name="nip" value="<?php echo $data['nip']; ?>"></td>
		</div>
		</fieldset>
      </tr>
      <tr>
        <td>Nama Dosen</td>
        <td><input type="text" class="form-control" name="nama_dosen" value="<?php echo $data['nama_dosen']; ?>"></td>
      </tr>
	  <tr>
        <td>Tanggal Lahir</td>
        <td><input type="text" class="form-control" name="ttl" value="<?php echo $data['ttl']; ?>"></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>
        <?php
        if($data['jk'] == "Laki-laki"){
          echo "<input type='radio' name='jk' value='Laki-laki' checked='checked'> Laki-laki  ";
          echo "<input type='radio' name='jk' value='Perempuan'> Perempuan ";
        }else{
          echo "<input type='radio' name='jk' value='Laki-laki'> Laki-laki  ";
          echo "<input type='radio' name='jk' value='Perempuan' checked='checked'> Perempuan ";
        }
        ?>
        </td>
      </tr>
	  <tr>
        <td>Alamat</td>
        <td><textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea></td>
      </tr>
      <tr>
        <td>Mata Kuliah</td>
		<td>
		<select class="custom-select" name="kode_mk">
		<option value="IFB2"> Basis Data 2
		<option value="IHP1"> PKN
		<option value="IKW1"> Pemrograman Web 2
		<option value="SJJ1"> Bahasa Jepang
		<option value="TII1"> Bahasa Inggris
		</td>
      </tr>
    </table>
    <hr>
    <input type="submit" class="btn btn-primary" value="Ubah">
    <a href="index2.php"><input type="button" class="btn btn-danger" value="Batal"></a>
  </form>
  
  <script type = "text/javasript" src = "js/bootstrap.min.js"></script>
</body>
</html>