<?php
session_start();
include "koneksi.php";
$nisn 					= $_POST['nisn'];
$nama_siswa 		= $_POST['nama_siswa'];
$alamat 				= $_POST['alamat'];
$no_telepon 		= $_POST['no_telepon'];
$jenis_kelamin 	= $_POST['jenis_kelamin'];
$photo 		      = $_FILES['photo']['name'];

$sql = "UPDATE siswa SET 
  nama_siswa    = '$nama_siswa', 
  alamat        = '$alamat', 
  no_telepon    = '$no_telepon', 
  jenis_kelamin = '$jenis_kelamin' 
WHERE nisn = '$nisn'";
$query = mysqli_query($koneksi, $sql);
if($query==1){
  if($photo !=""){
    $sql   = "SELECT * FROM siswa WHERE nisn = '$nisn'";
    $query  = mysqli_query($koneksi, $sql);
    $data   = mysqli_fetch_array($query);
    $photo  = $data['photo'];
    if($photo!=""){unlink("photo/".$photo);}

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
  $_SESSION['info'] = 'Diupdate';
}else{
  $_SESSION['info'] = 'Gagal Diupdate';
}
header("location:siswa.php");
?>
