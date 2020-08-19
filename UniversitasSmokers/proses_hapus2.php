<?php
include "koneksi.php";
$nip = $_GET['nip'];
$sql = $pdo->prepare("DELETE FROM dosen WHERE nip=:nip");
$sql->bindParam(':nip', $nip);
$execute = $sql->execute(); 
if($execute){ 
  echo "<script>
  alert('Hapus Data Sukses');
  document.location='index2.php';
  </script>";
}else{
  echo "<script>
  alert('Hapus Data Gagal');
  document.location='index2.php';
  </script>";
}
?>