<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = $pdo->prepare("DELETE FROM nilai WHERE id_nilai=:id");
$sql->bindParam(':id', $id);
$execute = $sql->execute(); 
if($execute){ 
  echo "<script>
  alert('Hapus Data Sukses');
  document.location='index3.php';
  </script>";
}else{
  echo "<script>
  alert('Hapus Data Gagal');
  document.location='index3.php';
  </script>";
}
?>