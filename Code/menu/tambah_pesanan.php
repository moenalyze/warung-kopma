<?php
session_start();
include "../koneksi.php";

$id_menu = $_POST['id_menu'];
$kuantitas = $_POST['kuantitas'];
$harga = $_POST['harga'];
$id_user = $_SESSION['id_user'];

$query = mysqli_query($konek, "select * from pesanan p join menu m on p.id_menu = m.id where id_user = '$id_user'");

while ($data = mysqli_fetch_array($query)) {
  if ($data['id_menu'] == $id_menu) {
    $kuantitas += $data['kuantitas'];
    $subtotal = $kuantitas * $harga;
    $update = "update pesanan set kuantitas = '$kuantitas', subtotal = '$subtotal' where id_user = '$id_user' and id_menu = '$id_menu'";
    $query = mysqli_query($konek, $update);
    header("location:menu.php");
  }
}

$subtotal = $kuantitas * $harga;
$query = mysqli_query($konek, "insert into pesanan (id_user, id_menu, kuantitas, subtotal) value ('$id_user', '$id_menu', '$kuantitas', '$subtotal')");
header("location:menu.php");
