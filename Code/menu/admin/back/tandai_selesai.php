<?php
include "../../../koneksi.php";

$id_pesanan = $_GET['id_pesanan'];

$query = mysqli_query($konek, "select tanggal_dibayar from pesanan where id_pesanan = '$id_pesanan'");
header("location:../front/dashboard.php?#pesanan");

$data = mysqli_fetch_array($query);

if ($data['tanggal_dibayar'] == NULL) {
  $query = mysqli_query($konek, "select * from pesanan where id_pesanan = '$id_pesanan'");
  $data = mysqli_fetch_array($query);
  $id_user = $data['id_user'];
  $id_menu = $data['id_menu'];
  $kuantitas = $data['kuantitas'];
  // $note = $data['notes'];
  $subtotal = $data['subtotal'];

  $pindah = mysqli_query($konek, "insert into riwayat_pesanan (id_user,id_menu,kuantitas,subtotal,tanggal_dibayar) values ('$id_user', '$id_menu', '$kuantitas' ,'$subtotal', NOW())");
  $query = mysqli_query($konek, "delete from pesanan where id_pesanan = '$id_pesanan'");
  header("location:../front/dashboard.php?#pesanan");
} else {
  $query = mysqli_query($konek, "update pesanan set tanggal_dibayar = NULL where id_pesanan = '$id_pesanan'");
  header("location:../front/dashboard.php?#pesanan");
}
