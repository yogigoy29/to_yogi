<?php
session_start();
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$nisn 								= $_POST['nisn'];
$nis									= $_POST['nis'];
$nama_siswa 					= $_POST['nama_siswa'];
$jenis_kelamin 				= $_POST['jenis_kelamin'];
$alamat 							= $_POST['alamat'];
$no_telepon 					= $_POST['no_telepon'];

$sql = "SELECT * FROM siswa WHERE nisn = '$nisn'";
$query = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)==0){
  $sql = "INSERT INTO siswa(nisn, nis, nama_siswa, jenis_kelamin, alamat, no_telepon) VALUES('$nisn','$nis', '$nama_siswa', '$jenis_kelamin', '$alamat', '$no_telepon')";
  $query 	= mysqli_query($koneksi, $sql);
  if($query==1){
    if ($_FILES["photo"]["name"]!=""){
      $namaBaru 	= date('dmYHis');
      $images     = $_FILES["photo"]["tmp_name"];
      $new_images = $namaBaru.$_FILES["photo"]["name"];
      
      copy($_FILES,"photo/".$_FILES["photo"]["name"]);
  
      $width=40;
      $size=GetimageSize($images);
      $height=round($width*$size[1]/$size[0]);
      $images_orig = ImageCreateFromJPEG($images);
      $photoX = ImagesX($images_orig);
      $photoY = ImagesY($images_orig);
      $images_fin = ImageCreateTrueColor($width, $height);
      ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
      ImageJPEG($images_fin,"photo/".$new_images);
      ImageDestroy($images_orig);
      ImageDestroy($images_fin);
  
      $sql = "UPDATE siswa SET photo = '$new_images' WHERE nisn='$nisn'";
      $query 	= mysqli_query($koneksi, $sql);
    }

    $_SESSION['info'] = 'Disimpan';
  }else{
    $_SESSION['info'] = 'Gagal Disimpan';
  }
}else{
  $_SESSION['info'] = 'Gagal Disimpan';
}
header("location:siswa.php");
?>
