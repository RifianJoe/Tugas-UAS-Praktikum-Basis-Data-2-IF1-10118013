<?php
include "koneksi.php";
	$kode_mk = $_GET['kode_mk'];
	$kode_mk = $_POST['kode_mk'];
	$nama_mk = $_POST['nama_mk'];
	$sks = $_POST['sks'];
	$semester = $_POST['semester'];
	$id_jurusan = $_POST['id_jurusan'];
$sql = $pdo->prepare("UPDATE matkul SET kode_mk=:kode_mk, nama_mk=:nama_mk, sks=:sks, semester=:semester, id_jurusan=:id_jurusan WHERE kode_mk=:kode_mk");
	$sql->bindParam(':kode_mk', $kode_mk);
	$sql->bindParam(':nama_mk', $nama_mk);
	$sql->bindParam(':sks', $sks);
	$sql->bindParam(':semester', $semester);
	$sql->bindParam(':id_jurusan', $id_jurusan);
$execute = $sql->execute(); 
if($execute){ 
  echo "<script>
  alert('Ubah Data Sukses');
  document.location='index4.php';
  </script>";
}else{
  echo "<script>
  alert('Ubah Data Gagal');
  document.location='index4.php';
  </script>";
}
?>