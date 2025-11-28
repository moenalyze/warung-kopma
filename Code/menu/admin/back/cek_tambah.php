<?php
include "../../../koneksi.php";

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_POST['gambar'];

$query = mysqli_query($konek, "insert into menu (nama, harga, tipe, deskripsi, gambar) value ('$nama', '$harga', '$kategori', '$deskripsi', '$gambar')");
header("location:../front/dashboard.php");
