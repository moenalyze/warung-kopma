<?php 
  session_start();

  include "../../koneksi.php";

  $username = "";
  $password = "";
  $jumlah = 0;
  $wakwow = 0;

  $_SESSION["error_log"] = "";
  $_SESSION["error_reg"] = "";

  function InputData($username,$password,$nomor,$konek){
    $query = "insert into user(username,password,status,telepon) VALUES('$username','$password','user','$nomor')";
    $berhasil = mysqli_query($konek,$query);

    if($berhasil){
      $_SESSION["error_reg"] = "";
      header("location:../index.php?pesan=berhasil");
    }else{
      $_SESSION["error_reg"] = "Tidak Berhasil";
      header("location:../index.php");
    }
  }
  
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nomor = $_POST['nomor'];
    if($username && $password){
      $query = "select * from user where username='$username'";
      $data = mysqli_query($konek,$query)or die (mysqli_error($konek));

      $cek = mysqli_num_rows($data);

      if($cek>0){
        $_SESSION["error_reg"] = "Username sudah ada";
        header("location:../index.php");
      }else{
        for($x = 0;$x<strlen($username);$x++){
          if($username[$x]>='A' && $username[$x]<='Z'){
            $jumlah++;
          }
        }

        for($y = 0; $y<strlen($nomor);$y++){
          if($nomor[$y]<'0' || $nomor[$y]>'9'){
            $wakwow++;
          }
        }
        //salah satu input berhasil
        if(($wakwow > 0) || ($jumlah>=1)){
          if($wakwow > 0){
            $_SESSION["error_reg"] = "nomor telepon tidak memenuhi";
            header("location:../index.php");
          }else if($jumlah==0){
            $_SESSION["error_reg"] = "username minimal 1 karakter besar";
            header("location:../index.php");
          }else{
            InputData($username,$password,$nomor, $konek);
          }
        }else{
          $_SESSION["error_reg"] = "nomor telepon tidak memenuhi dan username minimal 1 karakter besar";
          header("location:../index.php");
        }
      }
    }else{
      $_SESSION["error_reg"] = "Lengkapi data dibawah terlebih dahulu";
      header("location:../index.php");
    }
  }else{
    header("location:../index.php");
  }
?>