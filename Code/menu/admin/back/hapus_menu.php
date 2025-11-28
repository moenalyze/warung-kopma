<?php
include "../../../koneksi.php";

$id_menu = $_GET['id_menu'];

$query = mysqli_query($konek, "delete from menu where id = '$id_menu'");
header("location:../front/dashboard.php");
