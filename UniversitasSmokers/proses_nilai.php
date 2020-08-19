<?php
	include "koneksi.php";
	$nim = $_POST['nim'];
	$nip = $_POST['nip'];
	$kode_mk = $_POST['kode_mk'];
	$nilai = $_POST['nilai'];
	$sql = $pdo->prepare("INSERT INTO nilai(nim, nip, kode_mk, nilai) VALUES(:nim,:nip,:kode_mk,:nilai)");
	$sql->bindParam(':nim', $nim);
	$sql->bindParam(':nip', $nip);
	$sql->bindParam(':kode_mk', $kode_mk);
	$sql->bindParam(':nilai', $nilai);
	$sql->execute(); 
	if($sql){ 
  echo "<script>
  alert('Simpan Data Sukses');
  document.location='index3.php';
  </script>";
}else{
  echo "<script>
  alert('Simpan Data Gagal');
  document.location='index3.php';
  </script>";
	}
?>