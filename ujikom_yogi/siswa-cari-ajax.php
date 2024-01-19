<?php
include "koneksi.php";
$nisn = $_POST['nisn'];

$sql = "SELECT * FROM detail_pembayaran a INNER JOIN pembayaran b ON a.id_pembayaran=b.id_pembayaran INNER JOIN detail_siswa c ON b.id_detail_siswa=c.id_detail_siswa INNER JOIN siswa d ON c.nisn=d.nisn WHERE d.nisn='$nisn' AND a.tgl_bayar='0000-00-00' ORDER BY a.id_detail_pembayaran";
$query = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
  $data   = mysqli_fetch_assoc($query);
  $result = [];
  $result = $data;
  echo json_encode($result);
}


?>