<?php
session_start();
include "koneksi.php";
$kelas        = $_POST['kelas'];
$nama_kelas   = $_POST['nama_kelas'];
$id_kompetensi= $_POST['id_kompetensi'];

$sql = "SELECT * FROM kelas WHERE kelas = '$kelas' AND nama_kelas = '$nama_kelas' AND id_kompetensi = '$id_kompetensi'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO kelas(kelas, nama_kelas, id_kompetensi) VALUES('$kelas', '$nama_kelas', '$id_kompetensi')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:kelas.php");
?>
