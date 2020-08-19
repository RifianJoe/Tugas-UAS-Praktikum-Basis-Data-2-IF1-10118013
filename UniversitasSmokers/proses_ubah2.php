<?php
include "koneksi.php";
	$nip = $_GET['nip'];
	$nip = $_POST['nip'];
	$nama_dosen = $_POST['nama_dosen'];
	$ttl = $_POST['ttl'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$kode_mk = $_POST['kode_mk'];
$sql = $pdo->prepare("UPDATE dosen SET nip=:nip, nama_dosen=:nama_dosen, ttl=:ttl, jk=:jk, alamat=:alamat, kode_mk=:kode_mk WHERE nip=:nip");
	$sql->bindParam(':nip', $nip);
	$sql->bindParam(':nama_dosen', $nama_dosen);
	$sql->bindParam(':ttl', $ttl);
	$sql->bindParam(':jk', $jk);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':kode_mk', $kode_mk);
$execute = $sql->execute(); 
if($execute){ 
  echo "<script>
  alert('Ubah Data Sukses');
  document.location='index2.php';
  </script>";
}else{
  echo "<script>
  alert('Ubah Data Gagal');
  document.location='index2.php';
  </script>";
}
?>