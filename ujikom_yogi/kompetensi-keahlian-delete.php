<?php
session_start();
include "koneksi.php";
$id_kompetensi = $_GET['id_kompetensi'];

$sql = "DELETE FROM kompetensi_keahlian WHERE id_kompetensi ='$id_kompetensi'";
mysqli_query($koneksi, $sql);
$_SESSION['info'] = 'Dihapus';
header("location:kompetensi-keahlian.php");
?>