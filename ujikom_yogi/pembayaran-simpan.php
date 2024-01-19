<?php
session_start();
include "koneksi.php";
$tgl_bayar 		= $_POST['tgl_bayar'];
$nisn					= $_POST['nisn'];
$id_petugas		= $_SESSION['id_petugas'];
$id_detail_pembayaran	= $_POST['id_detail_pembayaran'];

$sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa=c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn WHERE d.nisn='$nisn' AND a.tgl_bayar='0000-00-00' ORDER BY a.id_detail_pembayaran";
$query = mysqli_query($koneksi, $sql);
$data  = mysqli_fetch_assoc($query);
$id_pembayaran        = $data['id_pembayaran'];
$nominal              = $data['nominal'];
$nisn                 = $data['nisn'];

$sql1 = "UPDATE detail_pembayaran SET 
  tgl_bayar  = '$tgl_bayar', 
  id_petugas = '$id_petugas' 
WHERE id_detail_pembayaran = '$id_detail_pembayaran'";
mysqli_query($koneksi, $sql1);

$sql2 = "UPDATE pembayaran SET 
  total_bayar = total_bayar + '$nominal' 
WHERE id_pembayaran = '$id_pembayaran'";
mysqli_query($koneksi, $sql2);

$sql3 = "UPDATE siswa SET 
  total_bayar = total_bayar + '$nominal' 
WHERE nisn = '$nisn'";
mysqli_query($koneksi, $sql3);

$_SESSION['info'] = 'Disimpan';
header("location:pembayaran.php");
?>
