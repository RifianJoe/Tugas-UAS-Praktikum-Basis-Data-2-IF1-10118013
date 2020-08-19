<?php
	include "koneksi.php";
	$nip = $_POST['nip'];
	$nama_dosen = $_POST['nama_dosen'];
	$ttl = $_POST['ttl'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$kode_mk = $_POST['kode_mk'];
	$sql = $pdo->prepare("INSERT INTO dosen(nip, nama_dosen, ttl, jk, alamat, kode_mk) VALUES(:nip,:nama_dosen,:ttl,:jenis_kelamin,:alamat,:kode_mk)");
	$sql->bindParam(':nip', $nip);
	$sql->bindParam(':nama_dosen', $nama_dosen);
	$sql->bindParam(':ttl', $ttl);
	$sql->bindParam(':jenis_kelamin', $jenis_kelamin);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':kode_mk', $kode_mk);
	$sql->execute(); 
	if($sql){ 
  echo "<script>
  alert('Simpan Data Sukses');
  document.location='index2.php';
  </script>";
}else{
  echo "<script>
  alert('Simpan Data Gagal');
  document.location='index2.php';
  </script>";
}
?>