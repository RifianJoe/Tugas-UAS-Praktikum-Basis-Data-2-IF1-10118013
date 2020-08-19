<?php
	include "koneksi.php";
	$kode_mk = $_POST['kode_mk'];
	$nama_mk = $_POST['nama_mk'];
	$sks = $_POST['sks'];
	$semester = $_POST['semester'];
	$id_jurusan = $_POST['id_jurusan'];
	$sql = $pdo->prepare("INSERT INTO matkul(kode_mk, nama_mk, sks, semester, id_jurusan) VALUES(:kode_mk,:nama_mk,:sks,:semester,:id_jurusan)");
	$sql->bindParam(':kode_mk', $kode_mk);
	$sql->bindParam(':nama_mk', $nama_mk);
	$sql->bindParam(':sks', $sks);
	$sql->bindParam(':semester', $semester);
	$sql->bindParam(':id_jurusan', $id_jurusan);
	$sql->execute(); 
	if($sql){ 
  echo "<script>
  alert('Simpan Data Sukses');
  document.location='index4.php';
  </script>";
}else{
  echo "<script>
  alert('Simpan Data Gagal');
  document.location='index4.php';
  </script>";
}
?>