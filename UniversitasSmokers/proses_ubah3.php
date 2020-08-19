<?php
include "koneksi.php";
	$id = $_GET['id'];
	$id = $_POST['id'];
	$nilai = $_POST['nilai'];
$sql = $pdo->prepare("UPDATE nilai SET nilai=:nilai WHERE id_nilai=:id");
	$sql->bindParam(':id', $id);
	$sql->bindParam(':nilai', $nilai);
$execute = $sql->execute();
if($execute){ 
  echo "<script>
  alert('Ubah Data Sukses');
  document.location='index3.php';
  </script>";
}else{
  echo "<script>
  alert('Ubah Data Gagal');
  document.location='index3.php';
  </script>";
}
?>