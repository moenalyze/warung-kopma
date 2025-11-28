<?php
session_start();
include "../koneksi.php";

$id_pesanan = $_POST['id_pesanan'];
$id_menu = $_POST['id_menu'];
$kuantitas = $_POST['kuantitas'];
$harga = $_POST['harga'];
$subtotal = $kuantitas * $harga;
$id_user = $_SESSION['id_user'];

$query = mysqli_query($konek, "select * from pesanan where id_user = '$id_user'");

while ($data = mysqli_fetch_array($query)) {
  if ($data['id_pesanan'] == $id_pesanan) {
    if ($kuantitas > 0) {
      $update = "update pesanan set kuantitas = '$kuantitas', subtotal = $subtotal where id_pesanan = '$id_pesanan'";
      $query = mysqli_query($konek, $update);
    } else {
      $delete = "delete from pesanan where id_pesanan = '$id_pesanan'";
      $query = mysqli_query($konek, $delete);
    }
    header("location:menu.php");
  }
}
