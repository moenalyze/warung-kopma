<?php
include "../../../koneksi.php";

$id_menu = $_POST['id_menu'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_POST['gambar'];

$query = mysqli_query($konek, "update menu set nama = '$nama', harga = '$harga', tipe = '$kategori', deskripsi = '$deskripsi', gambar = '$gambar' where id = '$id_menu'");
header("location:../front/dashboard.php");
