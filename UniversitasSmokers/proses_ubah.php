<?php
include "koneksi.php";
	$nim = $_GET['nim'];
	$nim = $_POST['nim'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$ttl = $_POST['ttl'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$id_fakultas = $_POST['id_fakultas'];
	$id_jurusan = $_POST['id_jurusan'];
$sql = $pdo->prepare("UPDATE mahasiswa SET nim=:nim, nama_mahasiswa=:nama_mahasiswa, ttl=:ttl, jk=:jk, alamat=:alamat, id_fakultas=:id_fakultas, id_jurusan=:id_jurusan WHERE nim=:nim");
	$sql->bindParam(':nim', $nim);
	$sql->bindParam(':nama_mahasiswa', $nama_mahasiswa);
	$sql->bindParam(':ttl', $ttl);
	$sql->bindParam(':jk', $jk);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':id_fakultas', $id_fakultas);
	$sql->bindParam(':id_jurusan', $id_jurusan);
$execute = $sql->execute(); 
if($execute){ 
  echo "<script>
  alert('Ubah Data Sukses');
  document.location='index1.php';
  </script>";
}else{
  echo "<script>
  alert('Ubah Data Gagal');
  document.location='index1.php';
  </script>";
}
?>