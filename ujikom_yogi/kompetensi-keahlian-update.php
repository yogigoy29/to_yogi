<?php
session_start();
include "koneksi.php";
$id_kompetensi 	      = $_POST['id_kompetensi'];
$nama_kompetensi_keahlian_lama = $_POST['nama_kompetensi_keahlian_lama'];
$nama_kompetensi_keahlian_baru = $_POST['nama_kompetensi_keahlian_baru'];

if($nama_kompetensi_keahlian_baru==$nama_kompetensi_keahlian_lama){
  $_SESSION['info'] = 'Gagal Diupdate';
}else{
  $sql = "SELECT * FROM kompetensi_keahlian WHERE nama_kompetensi_keahlian = '$nama_kompetensi_keahlian_baru'";
  $query 	= mysqli_query($koneksi, $sql);
  // Ketika ditemukan
  if(mysqli_num_rows($query)>0){
    $_SESSION['info'] = 'Gagal Diupdate';
  }else{
    $sql = "UPDATE kompetensi_keahlian SET nama_kompetensi_keahlian ='$nama_kompetensi_keahlian_baru' WHERE id_kompetensi = '$id_kompetensi'";
    mysqli_query($koneksi, $sql);
    $_SESSION['info'] = 'Diupdate';
  }
}
header("location:kompetensi-keahlian.php");
?>
