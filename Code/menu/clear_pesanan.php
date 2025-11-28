<?php 

  include "../koneksi.php";
  $id = "";

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($konek,"delete from pesanan where id_user = '$id'");
  }
  header("location:menu.php");
?>