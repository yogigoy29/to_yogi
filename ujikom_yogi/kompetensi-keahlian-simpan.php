<?php
session_start();
include "koneksi.php";
$nama_kompetensi_keahlian= $_POST['nama_kompetensi_keahlian'];

$sql 		= "SELECT * FROM kompetensi_keahlian WHERE nama_kompetensi_keahlian = '$nama_kompetensi_keahlian'";
$query 	= mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $_SESSION['info'] = 'Gagal Disimpan';
}else{
  $sql = "INSERT INTO kompetensi_keahlian(nama_kompetensi_keahlian) VALUES('$nama_kompetensi_keahlian')";
  mysqli_query($koneksi, $sql);
  $_SESSION['info'] = 'Disimpan';
}
header("location:kompetensi-keahlian.php");
?>
