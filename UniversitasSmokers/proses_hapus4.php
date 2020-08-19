<?php
include "koneksi.php";
$kode_mk = $_GET['kode_mk'];
$sql = $pdo->prepare("DELETE FROM matkul WHERE kode_mk=:kode_mk");
$sql->bindParam(':kode_mk', $kode_mk);
$execute = $sql->execute(); 
if($execute){ 
  echo "<script>
  alert('Hapus Data Sukses');
  document.location='index4.php';
  </script>";
}else{
  echo "<script>
  alert('Hapus Data Gagal');
  document.location='index4.php';
  </script>";
}
?>