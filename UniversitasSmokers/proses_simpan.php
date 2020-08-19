<?php
	// Load file koneksi.php
	include "koneksi.php";
	$nim = $_POST['nim'];
	$nama_mahasiswa = $_POST['nama_mahasiswa'];
	$ttl = $_POST['ttl'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$id_fakultas = $_POST['id_fakultas'];
	$id_jurusan = $_POST['id_jurusan'];
	$sql = $pdo->prepare("INSERT INTO mahasiswa(nim, nama_mahasiswa, ttl, jk, alamat, id_fakultas, id_jurusan) VALUES(:nim,:nama_mahasiswa,:ttl,:jenis_kelamin,:alamat,:id_fakultas,:id_jurusan)");
	$sql->bindParam(':nim', $nim);
	$sql->bindParam(':nama_mahasiswa', $nama_mahasiswa);
	$sql->bindParam(':ttl', $ttl);
	$sql->bindParam(':jenis_kelamin', $jenis_kelamin);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':id_fakultas', $id_fakultas);
	$sql->bindParam(':id_jurusan', $id_jurusan);
	$sql->execute(); 
	if($sql){ 
  echo "<script>
  alert('Simpan Data Sukses');
  document.location='index1.php';
  </script>";
}else{
  echo "<script>
  alert('Simpan Data Gagal');
  document.location='index1.php';
  </script>";
}
?>