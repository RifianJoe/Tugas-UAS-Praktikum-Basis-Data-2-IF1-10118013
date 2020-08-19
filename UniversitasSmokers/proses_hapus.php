<?php
include "koneksi.php";
$nim = $_GET['nim'];
$sql = $pdo->prepare("DELETE FROM mahasiswa WHERE nim=:nim");
$sql->bindParam(':nim', $nim);
$execute = $sql->execute(); 
if($execute){ 
  echo "<script>
  alert('Hapus Data Sukses');
  document.location='index1.php';
  </script>";
}else{
  echo "<script>
  alert('Hapus Data Gagal');
  document.location='index1.php';
  </script>";
}
?>