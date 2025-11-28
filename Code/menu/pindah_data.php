<?php

include "../koneksi.php";
$id = "";

if (isset($_POST['lanjut'])) {
  $id = $_GET['id'];
  $query = "select * from pesanan where id_user = '$id'";
  $result = mysqli_query($konek, $query);

  while ($data = mysqli_fetch_array($result)) {
    $id_user = $data['id_user'];
    $id_menu = $data['id_menu'];
    $kuantitas = $data['kuantitas'];
    // $note = $data['notes'];
    $subtotal = $data['subtotal'];

    echo $id_user . "</br>";
    echo $id_menu . "</br>";
    echo $kuantitas . "</br>";
    echo $subtotal . "</br>";
    $pindah = mysqli_query($konek, "insert into riwayat_pesanan (id_user,id_menu,kuantitas,subtotal,tanggal_dibayar) values ('$id_user', '$id_menu', '$kuantitas' ,'$subtotal', NOW())");
  }
  header("location:clear_pesanan.php?id=$id");
} else {
  header("location:menu.php");
}
