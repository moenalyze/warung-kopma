<?php

session_start();

include "../../koneksi.php";

$username = "";
$password = "";

$_SESSION["error_log"] = "";
$_SESSION["error_reg"] = "";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username && $password) {
    $data = mysqli_query($konek, "select id_user as id, status from user where username='$username' and password='$password'") or die(mysqli_error($konek));

    $cek = mysqli_num_rows($data);
    $row = mysqli_fetch_assoc($data);

    if ($cek > 0) {
      $_SESSION["status"] = "berhasil";
      $_SESSION["error_log"] = "";
      $_SESSION['id_user'] = $row['id'];
      $_SESSION['status_user'] = $row['status'];
      if ($_SESSION['status_user'] == "admin") {
        header("location:../../menu/admin/front/dashboard.php");
      } else {
        header("location:../../menu/menu.php");
      }
    } else {
      $_SESSION["error_log"] = "Username atau Password salah";
      $_SESSION["status"] = "gagal";
      header("location:../index.php");
    }
  } else {
    $_SESSION["error_log"] = "Lengkapi data dibawah terlebih dahulu";
    header("location:../index.php");
  }
} else {
  $_SESSION["status"] = "gagal";
}
